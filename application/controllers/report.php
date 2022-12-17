<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->common_model->checkpurview(64);
        $data['oclass'] = str_htmlencode($this->input->get_post('oclass', TRUE));
        $data['oIsread'] = str_htmlencode($this->input->get_post('oIsread', TRUE));
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['class'] = $data['oclass'];
        $where['isread'] = $data['oIsread'];
        $config['totalRows'] = $this->mysql_model->get_count('report', $where);
        $config['parameter'] = http_build_query(array_filter($data));
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['list'] = $this->mysql_model->get_results('report', $where);
        $this->load->view('report/index', $data);
    }


    public function add()
    {
        $this->common_model->checkpurview(65);
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            if ($_FILES['file']['name']) {
                $config['filepath'] = 'data/upfile/' . $this->session->userdata('uid') . '/' . date('Ym') . '/';
                $this->load->library('lib_upload', $config);
                $info = $this->lib_upload->upload('file');
                if (!isset($info['error'])) {
                    $data['title'] = $info['oldname'];
                    $data['fujian'] = $info['filepath'];
                } else {
                    str_alert($info['error']);
                }
            }
            unset($data['file']);
            $result = $this->mysql_model->insert('report', $this->validform($data));
            if ($result) {
                $this->load->view('close');
            } else {
                alert('添加失败');
            }
        } else {
            $this->load->view('report/add', $data);
        }
    }

    private function validform($data)
    {
        $data['uid'] = $this->session->userdata('uid');
        $data['user'] = $this->session->userdata('name');
        $data['cdate'] = date('Y-m-d');
        $data['ctime'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function edit()
    {
        //$this->common_model->checkpurview(66);
        $id = intval($this->input->get('id', TRUE));
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0 && $id > 0) {
            $data['isread'] = 2;
            if ($_FILES['file']['name']) {
                $config['filepath'] = 'data/upfile/' . $this->session->userdata('uid') . '/' . date('Ym') . '/';
                $this->load->library('lib_upload', $config);
                $info = $this->lib_upload->upload('file');
                if (!isset($info['error'])) {
                    $data['title'] = $info['oldname'];
                    $data['fujian'] = $info['filepath'];
                } else {
                    str_alert($info['error']);
                }
            }
            unset($data['file']);
            $result = $this->mysql_model->update('report', $data, array('id' => $id));
            if ($result) {
                $this->load->view('close');
            } else {
                alert('修改失败');
            }
        } else {
            $data = $this->mysql_model->get_rows('report', array('id' => $id));
            if (count($data) > 0) {
                $this->load->view('report/edit', $data);
            } else {
                alert('参数错误');
            }
        }
    }

    public function del()
    {
        $this->common_model->checkpurview(67);
        $id = intval($this->input->get('id', TRUE));
        $result = $this->mysql_model->update('report', array('isdel' => 1), array('id' => $id));
        if ($result) {
            $this->load->view('close');
        } else {
            alert('删除失败！');
        }
    }

    public function down()
    {
        $id = intval($this->input->get('id', TRUE));
        $file = $this->mysql_model->get_rows('report', array('isdel' => 0, 'id' => $id, 'in|uid' => $this->common_model->get_purview_uid()));
        if (count($file) > 0) {
            file_down($file['title'], $file['fujian']);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */