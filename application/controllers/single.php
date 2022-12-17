<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Single extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->common_model->checkpurview(29);
        $post = array('adduser', 'state', 'timetype', 'wheredate', 'type', 'sttdate', 'enddate', 'timetype', 'keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['type'];
        $where['state'] = $data['state'];
        $where['adduser'] = $data['adduser'];
        $where['like|customername'] = $data['keyword'];
        $where['adddate >='] = $data['sttdate'];
        $where['adddate <='] = $data['enddate'];
        $where['in|uid'] = $this->common_model->get_purview_uid();

        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            if ($this->session->userdata('manage') == true) {
                $where['in|uid'] = $this->session->userdata('manage');
                $where['or|uid'] = $this->session->userdata('uid');
            }
            $where['uid'] = $this->session->userdata('uid');

        }


        switch ($data['wheredate']) {
            case 1:
                $where['adddate >='] = $data['sttdate'];
                $where['adddate <='] = $data['enddate'];
                break;
            case 2:
                $where['nexttime >='] = $data['sttdate'];
                $where['nexttime <='] = $data['enddate'];
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
        $config['totalRows'] = $this->data_model->get_single_list($where, 3);
        $config['parameter'] = $data['parameter'] = http_build_query($data);
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['select_type'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'type'));
        $data['select_records'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'records'));
        $data['list'] = $this->data_model->get_single_list($where);
        $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'single'), 'value'));
        $this->load->view('single/index', $data);

    }

    public function excel()
    {
        $this->common_model->checkpurview(29);
        sys_csv('跟单列表-' . date('YmdHis') . '.xls');
        $post = array('adduser', 'state', 'timetype', 'wheredate', 'type', 'sttdate', 'enddate', 'timetype', 'keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['type'];
        $where['state'] = $data['state'];
        $where['adduser'] = $data['adduser'];
        $where['like|customername'] = $data['keyword'];
        $where['adddate >='] = $data['sttdate'];
        $where['adddate <='] = $data['enddate'];
        $where['in|uid'] = $this->common_model->get_purview_uid();

        switch ($data['wheredate']) {
            case 1:
                $where['adddate >='] = $data['sttdate'];
                $where['adddate <='] = $data['enddate'];
                break;
            case 2:
                $where['nexttime >='] = $data['sttdate'];
                $where['nexttime <='] = $data['enddate'];
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
        $data['list'] = $this->data_model->get_single_list($where);
        $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'single'), 'value'));
        $this->load->view('single/excel', $data);
    }


    public function add()
    {
        $this->common_model->checkpurview(30);
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $data['uid'] = $this->session->userdata('uid');
            $data['adduser'] = $this->session->userdata('name');
            $data['adddate'] = date('Y-m-d');
            $data['addtime'] = date('Y-m-d H:i:s');
            $result = $this->mysql_model->insert('single', $data);
            if ($result) {
                $info['nexttime'] = $data['nexttime'];
                $info['single_num'] = $this->mysql_model->get_count('single', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->mysql_model->update('customer', $info, array('id' => $data['customerid']));
                $data['action'] = '新增';
                $data['module'] = '跟单记录';
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
                $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'single'), 'value'));
                $data['select_type'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'type'));
                $data['select_records'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'records'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $id));
                $this->load->view('single/add', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function edit()
    {
        $this->common_model->checkpurview(31);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $single = $this->mysql_model->get_rows('single', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($single) > 0) {
                //$data['update']    =  date('Y-m-d');
                $data['updtime'] = date('Y-m-d H:i:s');
                $result = $this->mysql_model->update('single', $data, array('id' => $id));
                if ($result) {
                    $data['action'] = '修改';
                    $data['module'] = '跟单记录';
                    $data['reason'] = '';
                    $data['cid'] = $single['cid'];
                    $data['company'] = $single['company'];
                    $this->common_model->userlog($data);
                    $this->mysql_model->update('customer', array('nexttime' => $data['nexttime']), array('id' => $single['customerid']));
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('single', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $data['config'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'single'), 'value'));
                $data['select_type'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'type'));
                $data['select_records'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'records'));
                $data['select_linkman'] = $this->mysql_model->get_results('linkman', array('isdel' => 0, 'customerid' => $data['customerid']));
                $this->load->view('single/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $this->common_model->checkpurview(32);
        if (DELREASON > 0) {
            $this->reason();
        } else {
            $id = intval($this->input->get('id', TRUE));
            $single = $this->mysql_model->get_rows('single', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($single) > 0) {
                $result = $this->mysql_model->update('single', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['single_num'] = $this->mysql_model->get_count('single', array('isdel' => 0, 'customerid' => $single['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $single['customerid']));
                    $data['action'] = '删除';
                    $data['module'] = '跟单记录';
                    $data['reason'] = '';
                    $data['cid'] = $single['cid'];
                    $data['company'] = $single['company'];
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
        $this->common_model->checkpurview(32);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $single = $this->mysql_model->get_rows('single', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($single) > 0) {
                $result = $this->mysql_model->update('single', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $info['single_num'] = $this->mysql_model->get_count('single', array('isdel' => 0, 'customerid' => $single['customerid']));
                    $this->mysql_model->update('customer', $info, array('id' => $single['customerid']));
                    $data['action'] = '删除';
                    $data['module'] = '跟单记录';
                    $data['customerid'] = $single['customerid'];
                    $data['customername'] = $single['customername'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('删除失败！');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('single', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $this->load->view('single/reason', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */