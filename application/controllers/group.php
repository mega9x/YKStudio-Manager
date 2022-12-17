<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview(2);
    }

    public function index()
    {
        $data['list'] = $this->mysql_model->get_results('set_group', array('order' => 'id desc', 'isdel' => 0));
        $this->load->view('group/index', $data);
    }


    public function add()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $result = $this->mysql_model->insert('set_group', elements(array('name'), $data));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('操作失败');
            }
        } else {
            $this->load->view('group/add', $data);
        }
    }

    public function edit()
    {
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $result = $this->mysql_model->update('set_group', elements(array('name'), $data), array('id' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('操作失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('set_group', array('id' => $id, 'isdel' => 0));
            if (count($data) > 0) {
                $this->load->view('group/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }
    }

    public function del()
    {
        $id = intval($this->input->get('id', TRUE));
        //$result = $this->mysql_model->update('set_group',array('isdel'=>1),array('id'=>$id,'type'=>'group'));
        $result = $this->mysql_model->update('set_group', array('isdel' => 1), array('id' => $id));
        if ($result) {
            str_alert('操作成功');
        }
        str_alert('操作失败');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */