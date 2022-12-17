<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->common_model->checkpurview(44);
        $post = array('sTitle', 'adduser', 'sLinkman', 'timetype', 'Company', 'type', 'TimeBegin', 'TimeEnd', 'ETimeBegin', 'ETimeEnd', 'issolve', 'sttdate', 'enddate', 'keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['type'];
        $where['issolve'] = $data['issolve'];
        $where['adduser'] = $data['adduser'];
        $where['like|customername'] = $data['keyword'];
        $where['in|uid'] = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            if ($this->session->userdata('manage') == true) {
                $where['in|uid'] = $this->session->userdata('manage');
                $where['or|uid'] = $this->session->userdata('uid');
            }
            $where['uid'] = $this->session->userdata('uid');

        }
        $config['totalRows'] = $this->mysql_model->get_count('service', $where);
        $config['parameter'] = $data['parameter'] = http_build_query(array_filter($data));
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0));
        $data['select_service'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'service'));
        $data['list'] = $this->mysql_model->get_results('service', $where);
        $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'service'), 'value'));
        $this->load->view('service/index', $data);
    }

    public function excel()
    {
        $this->common_model->checkpurview(44);
        sys_csv('售后列表-' . date('YmdHis') . '.xls');
        $post = array('sTitle', 'adduser', 'sLinkman', 'timetype', 'Company', 'type', 'TimeBegin', 'TimeEnd', 'ETimeBegin', 'ETimeEnd', 'issolve', 'sttdate', 'enddate', 'keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['type'];
        $where['issolve'] = $data['issolve'];
        $where['adduser'] = $data['adduser'];
        $where['like|customername'] = $data['keyword'];
        $where['in|uid'] = $this->common_model->get_purview_uid();
        $data['list'] = $this->mysql_model->get_results('service', $where);
        $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'service'), 'value'));
        $this->load->view('service/excel', $data);
    }


    public function add()
    {
        $this->common_model->checkpurview(45);
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $data['uid'] = $this->session->userdata('uid');
            $data['adduser'] = $this->session->userdata('name');
            $data['adddate'] = date('Y-m-d');
            $data['addtime'] = date('Y-m-d H:i:s');
            $result = $this->mysql_model->insert('service', $data);
            if ($result) {
                $info['service_num'] = $this->mysql_model->get_count('service', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->mysql_model->update('customer', $info, array('id' => $data['customerid']));
                $this->load->view('close');
            } else {
                str_alert('添加失败');
            }
        } else {
            $id = intval($this->input->get_post('id', TRUE));
            $data = $this->mysql_model->get_rows('customer', array('isdel' => 0, 'id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'service'), 'value'));
                $data['select_service'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'service'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $id));
                $this->load->view('service/add', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function edit()
    {
        $this->common_model->checkpurview(46);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            //$data['update'] =  date('Y-m-d');
            $data['updtime'] = date('Y-m-d H:i:s');
            $result = $this->mysql_model->update('service', $data, array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('修改失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('service', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'service'), 'value'));
                $data['select_service'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'service'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->load->view('service/edit', $data);
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
            $result = $this->mysql_model->update('service', $data, array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('修改失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('service', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'service'), 'value'));
                $data['select_service'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'service'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->load->view('service/audit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $this->common_model->checkpurview(47);
        if (DELREASON > 0) {
            $this->reason();
        } else {
            $id = intval($this->input->get('id', TRUE));
            $data = $this->mysql_model->get_rows('service', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $result = $this->mysql_model->update('service', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['service_num'] = $this->mysql_model->get_count('service', array('isdel' => 0, 'customerid' => $data['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $data['customerid']));
                    $this->load->view('close');
                } else {
                    str_alert('删除失败！');
                }
            }
        }
    }

    public function reason()
    {
        $this->common_model->checkpurview(47);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $service = $this->mysql_model->get_rows('service', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($service) > 0) {
                $data['isdel'] = 1;
                $result = $this->mysql_model->update('service', $data, array('id' => $id));
                if ($result) {
                    $info['service_num'] = $this->mysql_model->get_count('service', array('isdel' => 0, 'customerid' => $service['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $service['customerid']));
                    $this->load->view('close');
                } else {
                    str_alert('删除失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('service', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $this->load->view('service/reason', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */