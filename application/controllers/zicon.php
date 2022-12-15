<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Zicon extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(1);
    }
	
	public function index(){
		$where['uid <>'] = 0;
		$where['order']  = 'id desc'; 
		$data['list']    = $this->mysql_model->get_results('menu',$where); 
		$this->load->view('zicon/index',$data);
	}
	
 
	public function add(){
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    $result = $this->mysql_model->insert('menu',$this->validform($data));
			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('添加失败');	
			}
		} else {
			$this->load->view('zicon/add',$data);
		}
	}

	public function edit() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $result = $this->mysql_model->update('menu',$data,array('id'=>$id)); 
			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('修改失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('menu',array('id'=>$id,'uid >'=>0)); 
			if (count($data)>0) {
			    $this->load->view('zicon/edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
 
	
    public function del(){
	    $id = intval($this->input->get('id',TRUE));
		$result = $this->mysql_model->delete('menu',array('id'=>$id,'uid >'=>0)); 
		if ($result) {
			$this->load->view('close');
		} else {
			str_alert('删除成功！');
		}
	}
	
	private function validform($data) {
	    $data['apptype'] =  'app';
		$data['target']  =  'blank';
		$data['uid']     =  $this->session->userdata('uid');
		$data['user']    =  $this->session->userdata('name');     
		return $data;
	}

 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */