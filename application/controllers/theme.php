<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Theme extends CI_Controller {
    
    public function __construct(){
        parent::__construct(); 
		$this->common_model->checkpurview();
    }
	
	public function index() {
	    $where['isdel']   = 0;
		$where['uid']     = 0;
		$where['or|uid']  = $this->session->userdata('uid');
		$data['list'] = $this->mysql_model->get_results('theme',$where); 
		$this->load->view('theme/index',$data);
	}
	
	public function skin(){
		$id   = intval($this->input->get_post('id',TRUE));
		$data = $this->mysql_model->get_rows('theme',array('id'=>$id)); 
		if (count($data)>0) {
			set_cookie('themepic',$data['bigpic'],36000000);
			str_alert('设置成功'); 
		}
	}
	
	public function add(){
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    $result = $this->mysql_model->insert('theme',$this->validform($data));
			if ($result) {
				redirect(site_url('theme/add?act=success'));
			} else {
			    str_alert('添加失败');	
			}
		} else { 
			$this->load->view('theme/add',$data);
		}
	}
	
	public function edit() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $result = $this->mysql_model->update('theme',$data,array('id'=>$id)); 
			if ($result) {
				redirect(site_url('theme/edit?act=success&id='.$id));
			} else {
			    str_alert('修改失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('theme',array('id'=>$id)); 
			if (count($data)>0) {
			    $this->load->view('theme/edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
	public function del(){
	    $id     = intval($this->input->get('id',TRUE));
		$result = $this->mysql_model->delete('theme',array('in|uid'=>$this->session->userdata('uid'),'id'=>$id)); 
		if ($result) {
			//$this->load->view('close');
			str_alert('删除成功！');
		} else {
			str_alert('删除失败！');
		}
	}
	
 
	private function validform($data) {
	    $data['uid']    =  $this->session->userdata('uid');
		$data['user']   =  $this->session->userdata('username');         
		return $data;
	}
 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */