<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview();
    }

    public function index()
    {
        $post = array('keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['a.isdel'] = 0;
        $where['like|(a.username'] = $data['keyword'];
        $where['or|like|a.name'] = $data['keyword'];
        $where['or|like|a.mobile'] = $data['keyword'];
        $where['#)'] = $data['keyword'];
        //$where['in|a.uid']               = $this->common_model->get_purview_uid();
        $config['totalRows'] = $this->data_model->get_user_list($where, 3);
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['list'] = $this->data_model->get_user_list($where);
        $this->load->view('user/index', $data);
    }

    public function add()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            strlen($data['username']) < 1 && str_alert('用户名不能为空');
            strlen($data['userpwd']) < 1 && str_alert('密码不能为空');
            $data['userpwd'] != $data['confirmpwd'] && str_alert('密码与重复密码不一致');
            $data['userpwd'] = md5($data['userpwd']);
            unset($data['confirmpwd']);
            $this->mysql_model->get_count('user', array('username' => $data['username'])) > 0 && str_alert('用户名不能有重复');
            $this->mysql_model->get_count('user', array('name' => $data['name'])) > 0 && str_alert('姓名不能有重复');
            $result = $this->mysql_model->insert('user', $data);
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('添加失败');
            }
        } else {
            $data['role'] = $this->mysql_model->get_results('role', array('isdel' => 0));
            $data['select_group'] = $this->mysql_model->get_results('set_group', array('isdel' => 0, 'order' => 'id desc'));
            $this->load->view('user/add', $data);
        }
    }

    public function edit()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            if ($data['userpwd']) {
                strlen($data['userpwd']) < 1 && str_alert('密码不能为空');
                $data['userpwd'] != $data['confirmpwd'] && str_alert('密码与重复密码不一致');
                $data['userpwd'] = md5($data['userpwd']);
            } else {
                unset($data['userpwd']);
            }
            unset($data['confirmpwd']);
            $this->mysql_model->get_count('user', array('name' => $data['name'], 'uid <>' => $id)) > 0 && str_alert('姓名不能有重复');
            $result = $this->mysql_model->update('user', $data, array('uid' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('修改失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('user', array('uid' => $id));
            if (count($data) > 0) {
                $data['role'] = $this->mysql_model->get_results('role', array('isdel' => 0));
                $data['select_group'] = $this->mysql_model->get_results('set_group', array('isdel' => 0, 'order' => 'id desc'));
                $this->load->view('user/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function info()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            if ($data['userpwd']) {
                strlen($data['userpwd']) < 1 && str_alert('密码不能为空');
                $data['userpwd'] != $data['confirmpwd'] && str_alert('密码与重复密码不一致');
                $data['userpwd'] = md5($data['userpwd']);
            } else {
                unset($data['userpwd']);
            }
            unset($data['confirmpwd'], $data['file']);
            /*
            if ($_FILES['file']['name']) {
                $config['filepath']   = 'data/upfile/'.$this->session->userdata('uid').'/'.date('Ym').'/';
                $this->load->library('lib_upload',$config);
                $info = $this->lib_upload->upload('file');
                if (!isset($info['error'])) {
                    $data['avatar'] = $info['filepath'];
                } else {
                    str_alert($info['error']);
                }
            }
            */
            $result = $this->mysql_model->update('user', $data, array('uid' => $this->session->userdata('uid')));
            if ($result) {
                $this->session->set_userdata('icon', $data['icon']);
                str_alert('保存成功');
            } else {
                str_alert('修改失败');
            }
        } else {
            $where['a.uid'] = $this->session->userdata('uid');
            $where['a.isdel'] = 0;
            $where['order'] = 'a.uid desc';
            $where['select'][1] = 'a.*,b.name as groupname,c.name as role';
            $where['join']['set_group as b'] = 'a.groupid=b.id';
            $where['join']['role as c'] = 'a.roleid=c.id';
            $data = $this->mysql_model->get_rows('user as a', $where);
            if (count($data) > 0) {
                $this->load->view('user/info', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }


    public function lever()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $lever = isset($data['lever']) ? join(',', $data['lever']) : '';
            $result = $this->mysql_model->update('user', array('lever' => $lever), array('uid' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('修改失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('user', array('uid' => $id));
            if (count($data) > 0) {
                $this->load->library('lib_tree');
                $data['lever'] = explode(',', $data['lever']);
                $data['system'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu', array('isdel' => 0, 'type' => 'system')));
                $data['customer'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu', array('isdel' => 0, 'type' => 'customer')));
                $data['other'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu', array('isdel' => 0, 'type' => 'other')));
                $this->load->view('user/lever', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function manage()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $manage = isset($data['manage']) ? join(',', $data['manage']) : '';
            $result = $this->mysql_model->update('user', array('manage' => $manage), array('uid' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('修改失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('user', array('uid' => $id));
            if (count($data) > 0) {
                $data['user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
                $data['select_group'] = $this->mysql_model->get_results('set_group', array('isdel' => 0, 'order' => 'id desc'));
                $data['manage'] = explode(',', $data['manage']);
                $this->load->view('user/manage', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $id = intval($this->input->get('id', TRUE));
        $id == 1 && str_alert('管理员不可操作！');
        $result = $this->mysql_model->update('user', array('isdel' => 1), array('uid' => $id));
        if ($result) {
            $this->load->view('close');
        } else {
            str_alert('删除失败！');
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */