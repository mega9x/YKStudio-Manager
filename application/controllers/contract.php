<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contract extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->common_model->checkpurview(39);
        $this->load->model('data_model');
        $having = '';
        $post = array('hOwed', 'hNum', 'adduser', 'rLinkman', 'state', 'hState', 'timetype', 'Company', 'type', 'TimeBegin', 'TimeEnd', 'ETimeBegin', 'ETimeEnd', 'timetype', 'sttdate', 'enddate', 'keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        switch ($data['hOwed']) {
            case '0':
                $having = ' HAVING arrears=0';
            case '1':
                $having = ' HAVING arrears>0';
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['type'];
        $where['like|(customername'] = $data['keyword'];
        $where['or|like|number'] = $data['keyword'];
        $where['or|like|linkman'] = $data['keyword'];
        $where['#)'] = $data['keyword'];
        $where['state'] = $data['state'];
        $where['adduser'] = $data['adduser'];
        $where['edate >='] = $data['ETimeBegin'];
        $where['edate <='] = $data['ETimeEnd'];
        $where['sdate >='] = $data['sttdate'];
        $where['sdate <='] = $data['enddate'];
        $where['in|uid'] = $this->common_model->get_purview_uid();

        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            if ($this->session->userdata('manage') == true) {
                $where['in|uid'] = $this->session->userdata('manage');
                $where['or|uid'] = $this->session->userdata('uid');
            }
            $where['uid'] = $this->session->userdata('uid');

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
        $config['totalRows'] = $this->data_model->get_contract_list($where, 3);
        $config['parameter'] = $data['parameter'] = http_build_query(array_filter($data));
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['audit'] = array(1 => '合同有效', 2 => '合同无效', 3 => '待审');
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['select_hetong'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'hetong'));
        $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'contract'), 'value'));
        $data['list'] = $this->data_model->get_contract_list($where);
        $this->load->view('contract/index', $data);
    }

    public function excel()
    {
        $this->common_model->checkpurview(34);
        sys_csv('合同列表-' . date('YmdHis') . '.xls');
        $having = '';
        $post = array('hOwed', 'hNum', 'adduser', 'rLinkman', 'rState', 'hState', 'timetype', 'Company', 'hType', 'TimeBegin', 'TimeEnd', 'ETimeBegin', 'ETimeEnd', 'timetype');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        switch ($data['hOwed']) {
            case '0':
                $having = ' HAVING arrears=0';
            case '1':
                $having = ' HAVING arrears>0';
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['hType'];
        $where['like|company'] = $data['Company'];
        $where['linkman'] = $data['rLinkman'];
        $where['number'] = $data['hNum'];
        $where['state'] = $data['hState'];
        $where['adduser'] = $data['adduser'];
        $where['edate >='] = $data['ETimeBegin'];
        $where['edate <='] = $data['ETimeEnd'];
        $where['sdate >='] = $data['TimeBegin'];
        $where['sdate <='] = $data['TimeEnd'];
        $where['in|uid'] = $this->common_model->get_purview_uid();
        switch ($data['timetype']) {
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
        $data['audit'] = array(1 => '合同有效', 2 => '合同无效', 3 => '待审');
        $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'order'), 'value'));
        $data['list'] = $this->data_model->get_contract_list($where);
        $this->load->view('contract/excel', $data);
    }

    public function add()
    {
        $this->common_model->checkpurview(40);
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $this->mysql_model->get_count('contract', array('isdel' => 0, 'orderid' => $data['orderid'])) > 0 && str_alert('该订单已经进入合同');
            $data['uid'] = $this->session->userdata('uid');
            $data['adduser'] = $this->session->userdata('name');
            $data['adddate'] = date('Y-m-d');
            $data['addtime'] = date('Y-m-d H:i:s');
            $result = $this->mysql_model->insert('contract', $data);
            if ($result) {
                $info['contract_num'] = $this->mysql_model->get_count('contract', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->mysql_model->update('customer', $info, array('id' => $data['customerid']));
                $data['action'] = '新增';
                $data['module'] = '合同记录';
                $data['reason'] = '';
                $data['cid'] = $result;
                $this->common_model->userlog($data);
                $this->load->view('close');
            } else {
                str_alert('添加失败');
            }
        } else {
            $id = intval($this->input->get_post('id', TRUE));
            $data = $this->mysql_model->get_rows('customer', array('isdel' => 0, 'id' => $id));
            if (count($data) > 0) {
                $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'contract'), 'value'));
                $data['select_hetong'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'hetong'));
                $this->load->view('contract/add', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function edit()
    {
        $this->common_model->checkpurview(41);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $contract = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($contract) > 0) {
                $data['upddate'] = date('Y-m-d');
                $data['updtime'] = date('Y-m-d H:i:s');
                $result = $this->mysql_model->update('contract', $data, array('id' => $id));
                if ($result) {
                    $data['action'] = '修改';
                    $data['module'] = '跟单记录';
                    $data['reason'] = '';
                    $data['cid'] = $contract['customerid'];
                    $data['company'] = $contract['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $this->load->model('data_model');
            $data = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($data) > 0) {
                $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'contract'), 'value'));
                $data['select_hetong'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'hetong'));
                $this->load->view('contract/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function audit()
    {
        $this->common_model->checkpurview(15);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $data['auditname'] = $this->session->userdata('name');
            $data['auditdate'] = date('Y-m-d');
            $data['audittime'] = date('Y-m-d H:i:s');
            $result = $this->mysql_model->update('contract', $data, array('id' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('审核失败！');
            }
        } else {
            $data = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($data) > 0) {
                $this->load->view('contract/audit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $this->common_model->checkpurview(42);
        if (DELREASON > 0) {
            $this->reason();
        } else {
            $id = intval($this->input->get('id', TRUE));
            $contract = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($contract) > 0) {
                $result = $this->mysql_model->update('contract', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['contract_num'] = $this->mysql_model->get_count('contract', array('isdel' => 0, 'customerid' => $contract['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $contract['customerid']));
                    $data['action'] = '删除';
                    $data['module'] = '合同记录';
                    $data['reason'] = '';
                    $data['customerid'] = $contract['customerid'];
                    $data['customername'] = $contract['customername'];
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
        $this->common_model->checkpurview(42);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $contract = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($contract) > 0) {
                $result = $this->mysql_model->update('contract', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['contract_num'] = $this->mysql_model->get_count('contract', array('isdel' => 0, 'customerid' => $contract['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $contract['customerid']));
                    $data['action'] = '删除';
                    $data['module'] = '合同记录';
                    $data['customerid'] = $contract['customerid'];
                    $data['customername'] = $contract['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('删除失败！');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($data) > 0) {
                $this->load->view('contract/reason', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    //合同到款

    public function addrevenue()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $contract = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($contract) > 0) {

                $contract['qkmoney'] < $data['revenue'] && str_alert('付款大于欠款不可提交');


                //$contract['qkmoney'] = $data['revenue']&& str_alert('付款大于欠款不可提交');
                $info['contractid'] = $id;
                $info['orderid'] = $contract['orderid'];
                $info['outin'] = 1;
                $info['type'] = '合同款';
                $info['money'] = intval($data['revenue']);
                $info['edate'] = date('Y-m-d');
                $info['content'] = $data['content'];
                $info['customerid'] = $contract['customerid'];
                $info['customername'] = $contract['customername'];
                $info['uid'] = $this->session->userdata('uid');
                $info['adduser'] = $this->session->userdata('name');
                $info['adddate'] = date('Y-m-d');
                $info['addtime'] = date('Y-m-d H:i:s');
                $result = $this->mysql_model->insert('financier', $info);
                if ($result) {
                    $financier = $this->mysql_model->get_rows('financier', array('isdel' => 0, 'contractid' => $id, 'select' => array('sum|money' => 'money')));
                    $info2['yjmoney'] = $financier['money'];
                    $info2['qkmoney'] = $contract['money'] - $financier['money'];
                    $this->mysql_model->update('contract', $info2, array('id' => $id));

                    //写入日志
                    $data['action'] = '新增';
                    $data['module'] = '合同到款';
                    $data['reason'] = '';
                    $data['customerid'] = $contract['customerid'];
                    $data['customername'] = $contract['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($data) > 0) {
                $this->load->view('contract/addrevenue', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    //续费列表
    public function renewlist()
    {
        $data['id'] = intval($this->input->get('id', TRUE));
        $data['list1'] = $this->mysql_model->get_results('financier', array('hid' => $data['id'], 'type' => '合同款', 'isdel' => 0), 'id', 0, 1);
        $data['list2'] = $this->mysql_model->get_results('financier', array('hid' => $data['id'], 'type' => '产品续费', 'isdel' => 0));
        $this->load->view('contract/renewlist', $data);
    }

    //合同续费
    public function addrenew()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $contract = $this->mysql_model->get_rows('contract', array('id' => $id));
            if (count($contract) > 0) {
                $result = $this->mysql_model->update('contract', array('edate' => $data['edate']), array('id' => $id));
                if ($result) {
                    $info['hid'] = $id;
                    $info['outin'] = 1;
                    $info['type'] = '产品续费';
                    $info['money'] = intval($data['revenue']);
                    $info['xdate'] = date('Y-m-d');
                    $info['edate'] = $data['edate'];
                    $info['content'] = $data['content'];
                    $info['cid'] = $contract['customerid'];
                    $info['company'] = $contract['customername'];
                    $this->mysql_model->insert('financier', $this->validform($info));
                    //写入日志
                    $data['action'] = '新增';
                    $data['module'] = '产品续费';
                    $data['reason'] = '';
                    $data['cid'] = $contract['customerid'];
                    $data['company'] = $contract['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $this->load->model('data_model');
            $data = $this->data_model->get_contract_list('(id=' . $id . ')', 1);
            if (count($data) > 0) {
                $this->load->view('contract/addrenew', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function editrenew()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $financier = $this->mysql_model->get_rows('financier', array('id' => $id));
            if (count($financier) > 0) {
                $result = $this->mysql_model->update('contract', array('edate' => $data['edate']), array('id' => $financier['hid']));
                if ($result) {
                    $info['money'] = intval($data['money']);
                    $info['edate'] = date('Y-m-d');
                    $info['content'] = $data['content'];
                    $this->mysql_model->update('financier', $info, array('id' => $id));

                    //写入日志
                    $data['action'] = '修改';
                    $data['module'] = '产品续费';
                    $data['reason'] = '';
                    $data['cid'] = $financier['cid'];
                    $data['company'] = $financier['company'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('financier', array('id' => $id));
            if (count($data) > 0) {
                $this->load->model('data_model');
                $data['contract'] = $this->data_model->get_contract_list('(id=' . $data['hid'] . ')', 1);
                $this->load->view('contract/editrenew', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function delrenew()
    {
        $id = intval($this->input->get('id', TRUE));
        $financier = $this->mysql_model->get_rows('financier', array('id' => $id));
        if (count($financier) > 0) {
            $result = $this->mysql_model->update('financier', array('isdel' => 1), array('id' => $id));
            if ($result) {
                //写入日志
                $data['action'] = '删除';
                $data['module'] = '产品续费';
                $data['reason'] = '';
                $data['cid'] = $financier['cid'];
                $data['company'] = $financier['company'];
                $this->common_model->userlog($data);
                $this->load->view('close');
            } else {
                str_alert('删除失败！');
            }
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */