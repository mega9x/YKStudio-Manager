<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Area extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview(3);
    }

    public function index()
    {
        $this->load->library('lib_tree');
        $data['list'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('area', array('isdel' => 0)));
        $this->load->view('area/index', $data);
    }

    public function add()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            $data = $this->validform($data);
            $data['isdel'] = 0;
            $result = $this->mysql_model->insert('area', $data);
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('添加成功');
            }
        } else {
            $data['parentid'] = intval($this->input->get('parentid', TRUE));
            $data['select_area'] = $this->mysql_model->get_results('area', array('isdel' => 0));
            $this->load->view('area/add', $data);
        }


    }

    private function validform($data)
    {
        $data['parentid'] = isset($data['parentid']) ? intval($data['parentid']) : 0;
        strlen($data['name']) < 1 && str_alert('类别名称不能为空！');
        return $data;
    }

    public function edit()
    {
        $id = intval($this->input->get('id', TRUE));
        //$data = str_htmlencode($this->input->post('data',TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        //var_dump($data);


        if (is_array($data) && count($data) > 0) {
            $data = $this->validform($data);
            $result = $this->mysql_model->update('area', $data, array('id' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                str_alert('添加成功');
            }
        } else {
            $data = $this->mysql_model->get_rows('area', array('id' => $id));
            if (count($data) > 0) {
                $data['select_area'] = $this->mysql_model->get_results('area', array('isdel' => 0, 'parentid' => 0));
                $this->load->view('area/edit', $data);
            } else {
                str_alert('参数错误');
            }
        }


    }

    public function del()
    {
        $id = intval($this->input->get('id', TRUE));
        $this->mysql_model->get_count('area', array('isdel' => 0, 'parentid' => $id)) > 0 && str_alert('存在子类不可删除');
        //$result = $this->mysql_model->update('area',array('isdel'=>1),array('id'=>$id));
        $result = $this->mysql_model->delete('area', array('id' => $id));
        if ($result) {
            $this->load->view('close');
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */