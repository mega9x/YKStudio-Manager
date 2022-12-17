<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->common_model->checkpurview(34);
        $post = array('adduser', 'linkman', 'state', 'timetype', 'Company', 'rType', 'TimeBegin', 'TimeEnd', 'sttdate', 'enddate', 'wheredate', 'keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['state'] = $data['state'];
        $where['user'] = $data['adduser'];
        $where['sdate >='] = $data['TimeBegin'];
        $where['sdate <='] = $data['TimeEnd'];
        $where['edate >='] = $data['sttdate'];
        $where['edate <='] = $data['enddate'];
        $where['like|(customername'] = $data['keyword'];
        $where['or|like|number'] = $data['keyword'];
        $where['or|like|linkman'] = $data['keyword'];
        $where['#)'] = $data['keyword'];
        $where['in|uid'] = $this->common_model->get_purview_uid();

        switch ($data['wheredate']) {

            case 1:
                $where['sdate >='] = $data['sttdate'];
                $where['sdate <='] = $data['enddate'];
                break;
            case 2:
                $where['edate >='] = $data['sttdate'];
                $where['edate <='] = $data['enddate'];
                break;
        }


        switch ($data['timetype']) {
            case 'd':
                $where['adddate'] = date('Y-m-d');
                break;
            case 'w':
                $where['adddate >='] = date_query(1);
                $where['adddate <='] = date_query(2);
                break;
            case 'm':
                $where['adddate >='] = date_query(5);
                $where['adddate <='] = date_query(6);
                break;
        }
        $config['totalRows'] = $this->data_model->get_order_list($where, 3);
        $config['parameter'] = $data['parameter'] = http_build_query($data);
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['audit'] = array(1 => '已完成', 2 => '处理中', 3 => '未处理');
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'order'), 'value'));
        $data['list'] = $this->data_model->get_order_list($where);
        $this->load->view('order/index', $data);
    }

    public function excel()
    {
        $this->common_model->checkpurview(34);
        sys_csv('订单列表-' . date('YmdHis') . '.xls');
        $this->load->model('data_model');
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        $data['TimeType'] = str_htmlencode($this->input->get_post('TimeType', TRUE));
        $data = elements(array(
            'adduser', 'Linkman', 'State', 'TimeType', 'customername',
            'number', 'TimeBegin', 'TimeEnd', 'ETimeBegin', 'ETimeEnd', 'keyword'), $data);
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['state'] = $data['State'];
        $where['user'] = $data['adduser'];
        $where['linkman'] = $data['Linkman'];
        $where['number'] = $data['number'];
        $where['sdate >='] = $data['TimeBegin'];
        $where['sdate <='] = $data['TimeEnd'];
        $where['edate >='] = $data['ETimeBegin'];
        $where['edate <='] = $data['ETimeEnd'];
        $where['like|company'] = $data['keyword'];
        $where['in|uid'] = $this->common_model->get_purview_uid();
        switch ($data['TimeType']) {
            case 'd':
                $where['cdate'] = date('Y-m-d');
                break;
            case 'w':
                $where['cdate >='] = date_query(1);
                $where['cdate <='] = date_query(2);
                break;
            case 'm':
                $where['cdate >='] = date_query(5);
                $where['cdate <='] = date_query(6);
                break;
        }
        $data['audit'] = array(1 => '已完成', 2 => '处理中', 3 => '未处理');
        $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'order'), 'value'));
        $data['list'] = $this->data_model->get_order_list($where);
        $this->load->view('order/excel', $data);
    }

    public function add()
    {
        $this->common_model->checkpurview(35);
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $data['uid'] = $this->session->userdata('uid');
            $data['adduser'] = $this->session->userdata('name');
            $data['adddate'] = date('Y-m-d');
            $data['addtime'] = date('Y-m-d H:i:s');
            $result = $this->mysql_model->insert('order', $data);
            if ($result) {
                $info['order_num'] = $this->mysql_model->get_count('order', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->mysql_model->update('customer', $info, array('id' => $data['customerid']));
                $data['action'] = '新增';
                $data['module'] = '订单记录';
                $data['reason'] = '';
                $this->common_model->userlog($data);
                $this->load->view('close');
            } else {
                str_alert('添加失败');
            }
        } else {
            $id = intval($this->input->get_post('id', TRUE));
            $data = $this->mysql_model->get_rows('customer', array('isdel' => 0, 'id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'order'), 'value'));
                $data['select_records'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'records'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $id));
                $this->load->view('order/add', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function edit()
    {
        $this->common_model->checkpurview(36);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $order = $this->mysql_model->get_rows('order', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($order) > 0) {
                // $data['update']  =  date('Y-m-d');
                $data['updtime'] = date('Y-m-d H:i:s');
                $result = $this->mysql_model->update('order', $data, array('id' => $id));
                if ($result) {
                    $data['action'] = '修改';
                    $data['module'] = '订单记录';
                    $data['reason'] = '';
                    $data['cid'] = $order['customerid'];
                    $data['company'] = $order['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('order', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'order'), 'value'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->load->view('order/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function audit()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $result = $this->mysql_model->update('order', $data, array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('审核失败！');
            }
        } else {
            $data = $this->mysql_model->get_rows('order', array('id' => $id));
            if (count($data) > 0) {
                $this->load->view('order/audit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $this->common_model->checkpurview(37);
        if (DELREASON > 0) {
            $this->reason();
        } else {
            $id = intval($this->input->get('id', TRUE));
            $order = $this->mysql_model->get_rows('order', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($order) > 0) {
                $result = $this->mysql_model->update('order', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['order_num'] = $this->mysql_model->get_count('order', array('isdel' => 0, 'customerid' => $order['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $order['customerid']));
                    $data['action'] = '删除';
                    $data['module'] = '订单记录';
                    $data['reason'] = '';
                    $data['customerid'] = $order['customerid'];
                    $data['customername'] = $order['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('删除失败！');
                }
            }
        }
    }

    public function reason()
    {
        $this->common_model->checkpurview(37);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $order = $this->mysql_model->get_rows('order', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($order) > 0) {
                $result = $this->mysql_model->update('order', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['order_num'] = $this->mysql_model->get_count('order', array('isdel' => 0, 'customerid' => $order['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $order['customerid']));
                    $data['action'] = '删除';
                    $data['module'] = '订单记录';
                    $data['customerid'] = $order['customerid'];
                    $data['customername'] = $order['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('删除失败！');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('order', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $this->load->view('order/reason', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function product()
    {
        $id = intval($this->input->get_post('id', TRUE));
        $data = $this->mysql_model->get_rows('order', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
        if (count($data) > 0) {
            $data['list'] = $this->mysql_model->get_results('order_product', array('isdel' => 0, 'orderid' => $id, 'order' => 'id desc'));
            $this->load->view('order/product', $data);
        } else {
            str_alert('参数错误');
        }
    }


    public function product_add()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $order = $this->mysql_model->get_rows('order', array('id' => $data['orderid']));
            if (count($order) > 0) {
                $data['uid'] = $this->session->userdata('uid');
                $data['adduser'] = $this->session->userdata('name');
                $data['adddate'] = date('Y-m-d');
                $data['addtime'] = date('Y-m-d H:i:s');
                $result = $this->mysql_model->insert('order_product', $data);
                if ($result) {
                    $info['money'] = $this->mysql_model->get_rows('order_product', array('isdel' => 0, 'select' => array('sum|money' => 'money'), 'orderid' => $order['id']), 'money');
                    $this->mysql_model->update('order', $info, array('id' => $order['id']));
                    $this->load->view('close');
                } else {
                    str_alert('添加失败');
                }
            }
        } else {
            $id = intval($this->input->get_post('orderid', TRUE));
            $data = $this->mysql_model->get_rows('order', array('isdel' => 0, 'id' => $id));
            if (count($data) > 0) {
                $this->load->view('order/product_add', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function product_edit()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $product = $this->mysql_model->get_rows('order_product', array('id' => $id));
            if (count($product) > 0) {
                $result = $this->mysql_model->update('order_product', $data, array('id' => $id));
                if ($result) {
                    $info['money'] = $this->mysql_model->get_rows('order_product', array('isdel' => 0, 'select' => array('sum|money' => 'money'), 'orderid' => $product['orderid']), 'money');
                    $this->mysql_model->update('order', $info, array('id' => $product['orderid']));
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('order_product', array('id' => $id));
            if (count($data) > 0) {
                $this->load->view('order/product_edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function product_del()
    {
        $id = intval($this->input->get('id', TRUE));
        $product = $this->mysql_model->get_rows('order_product', array('id' => $id));
        if (count($product) > 0) {
            $result = $this->mysql_model->update('order_product', array('isdel' => 1), array('id' => $id));
            if ($result) {
                $info['money'] = $this->mysql_model->get_rows('order_product', array('isdel' => 0, 'select' => array('sum|money' => 'money'), 'orderid' => $product['orderid']), 'money');
                $this->mysql_model->update('order', $info, array('id' => $product['orderid']));
                $this->load->view('close');
            } else {
                str_alert('删除失败！');
            }
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */