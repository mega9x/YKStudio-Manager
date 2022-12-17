<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Financier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->common_model->checkpurview(49);
        $post = array('outin', 'adduser', 'timetype', 'Company', 'TimeBegin', 'TimeEnd', 'timetype', 'keyword', 'sttdate', 'enddate', 'area1', 'area2');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = '0';
        $where['outin'] = $data['outin'];
        $where['adduser'] = $data['adduser'];
        $where['edate >='] = $data['sttdate'];
        $where['edate <='] = $data['enddate'];

        $where['like|customername'] = $data['keyword'];
        $where['or|like|content'] = $data['keyword'];
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
        $config['totalRows'] = $this->mysql_model->get_count('financier', $where);
        $config['parameter'] = $data['parameter'] = http_build_query(array_filter($data));
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['inmoney'] = $this->mysql_model->get_rows('financier', array('isdel' => 0, 'outin' => 1, 'select' => array('sum|money' => 'money')));
        $data['outmoney'] = $this->mysql_model->get_rows('financier', array('isdel' => 0, 'outin' => 2, 'select' => array('sum|money' => 'money')));
        $data['list'] = $this->mysql_model->get_results('financier', $where);
        $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'financier'), 'value'));
        $data['lever'] = $this->common_model->get_lever();
        $this->load->view('financier/index', $data);
    }


    public function excel()
    {
        $this->common_model->checkpurview(49);
        sys_csv('收支列表-' . date('YmdHis') . '.xls');
        $post = array('eOutIn', 'adduser', 'timetype', 'Company', 'TimeBegin', 'TimeEnd', 'timetype');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['outin'] = $data['eOutIn'];
        $where['adduser'] = $data['adduser'];
        $where['edate >='] = $data['TimeBegin'];
        $where['edate <='] = $data['TimeEnd'];
        $where['like|company'] = $data['Company'];
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
        $data['list'] = $this->mysql_model->get_results('financier', $where);
        $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'financier'), 'value'));

        $this->load->view('financier/excel', $data);
    }


    public function add()
    {
        $this->common_model->checkpurview(50);
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $result = $this->mysql_model->insert('financier', $this->validform($data));
            if ($result) {
                $data['action'] = '新增';
                $data['module'] = '收支记录';
                $data['reason'] = '';
                $data['cid'] = $data['cid'];
                $data['company'] = $data['company'];
                $this->common_model->userlog($data);
                $this->load->view('close');
            } else {
                str_alert('添加失败');
            }
        } else {
            $id = intval($this->input->get('id', TRUE));
            $data = $this->mysql_model->get_rows('customer', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            $data['id'] = isset($data['id']) ? $data['id'] : 0;
            $data['name'] = isset($data['name']) ? $data['name'] : '';
            $type = array(1 => 'expensein', 2 => 'expenseout');
            $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'financier'), 'value'));
            $data['outin'] = max(intval($this->input->get_post('outin', TRUE)), 1);
            $data['select_expense'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => $type[$data['outin']]));
            $this->load->view('financier/add', $data);
        }
    }

    private function validform($data)
    {
        $data['uid'] = $this->session->userdata('uid');
        $data['adduser'] = $this->session->userdata('name');
        $data['adddate'] = date('Y-m-d');
        $data['addtime'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function edit()
    {
        $this->common_model->checkpurview(51);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $financier = $this->mysql_model->get_rows('financier', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($financier) > 0) {
                $result = $this->mysql_model->update('financier', $data, array('id' => $id));
                if ($result) {
                    $data['action'] = '修改';
                    $data['module'] = '收支记录';
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
            $data = $this->mysql_model->get_rows('financier', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $type = array(1 => 'expensein', 2 => 'expenseout');
                $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'financier'), 'value'));
                $data['select_expense'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => $type[$data['outin']]));
                $this->load->view('financier/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $this->common_model->checkpurview(52);
        if (DELREASON > 0) {
            $this->reason();
        } else {
            $id = intval($this->input->get('id', TRUE));
            $financier = $this->mysql_model->get_rows('financier', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($financier) > 0) {
                $result = $this->mysql_model->update('financier', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $data['action'] = '删除';
                    $data['module'] = '收支记录';
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

    public function reason()
    {
        $this->common_model->checkpurview(52);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $financier = $this->mysql_model->get_rows('financier', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($financier) > 0) {
                $result = $this->mysql_model->update('financier', array('isdel' => 1), array('id' => $id));
                if ($result) {
                    $data['action'] = '删除';
                    $data['module'] = '收支记录';
                    $data['cid'] = $financier['cid'];
                    $data['company'] = $financier['company'];
                    $this->common_model->userlog($data);
                    $this->load->view('close');
                } else {
                    str_alert('修改失败');
                }
            }
        } else {
            $data = $this->mysql_model->get_rows('financier', array('id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
            if (count($data) > 0) {
                $this->load->view('financier/reason', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */