<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(68);
    }
	
	public function index(){
	    $post = array('keyword');
		foreach($post as $key=>$val) {
		    $data[$val] = str_htmlencode($this->input->get_post($val,TRUE));
		} 
		$where['order']      = 'id desc';
		$where['isdel']      = 0;
		$where['like|title'] = $data['keyword']; 
		$config['totalRows'] = $this->mysql_model->get_count('product',$where);  
		$this->load->library('lib_page',$config); 
		$where['limit1']     = $this->lib_page->firstRow;
		$where['limit2']     = $this->lib_page->listRows;
		$data['list'] = $this->mysql_model->get_results('product',$where); 
		$this->load->view('product/index',$data);
	}

	public function add() {
	    $data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    $data['uid']      =  $this->session->userdata('uid');
			$data['adduser']  =  $this->session->userdata('name');     
			$data['adddate']  =  date('Y-m-d');  
			$data['addtime']  =  date('Y-m-d H:i:s');  
			$result = $this->mysql_model->insert('product',$data);
			if ($result) {
				$this->load->view('close');
			} else {
				str_alert('操作失败'); 
			}
		} else {
		    $data['classlist'] = $this->mysql_model->get_results('product_class',array('isdel'=>0,'parentid'=>0));
			$this->load->view('product/add',$data);
		}   
	}
	
	public function edit(){
	    $id   = intval($this->input->get('id',TRUE));
	    $data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    //$data['update']   =  date('Y-m-d');
		    $data['updtime']  =  date('Y-m-d H:i:s');
		    $result = $this->mysql_model->update('product',$data,array('id'=>$id));
			if ($result) {
				$this->load->view('close');
			} else {	
			    str_alert('操作失败');
			}
		} else {
		    $data = $this->mysql_model->get_rows('product',array('id'=>$id,'isdel'=>0)); 
			if (count($data)>0) {
			    $data['classlist'] = $this->mysql_model->get_results('product_class',array('isdel'=>0));
				$this->load->view('product/edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}   
	}
	
	public function reason() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $data['isdel'] = 1;
		    $result = $this->mysql_model->update('product',$data,array('id'=>$id)); 
			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('删除失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('product',array('id'=>$id)); 
			if (count($data)>0) {
			    $this->load->view('product/reason',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
	public function del(){
	    if (DELREASON>0) {
			$this->reason();
		} else {	
			$id = intval($this->input->get('id',TRUE));
			$result = $this->mysql_model->update('product',array('isdel'=>1),array('id'=>$id)); 
			if ($result) {
				$this->load->view('close');
			} else {
				str_alert('删除失败！');
			}
		}
	}
	
	
	
	public function classlist(){
	    $this->load->library('lib_tree');
		$data['list'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('product_class',array('isdel'=>0))); 
		$this->load->view('product/classlist',$data);
	}
	
	
	public function class_add(){
	    $data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    $data   = $this->class_validform($data);
			$result = $this->mysql_model->insert('product_class',$data);
			if ($result) {
			    $this->load->view('close');
			} else {
			    str_alert('添加失败');
			}
		} else {
		    $data['parentid'] = intval($this->input->get('parentid',TRUE));
			$this->load->view('product/class_add',$data);
		}  
	}
	
	 
	public function class_edit(){
	    $id   = intval($this->input->get('id',TRUE));
	    $data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) { 
		    $data   = $this->class_validform($data);
			$result = $this->mysql_model->update('product_class',$data,array('id'=>$id)); 
			if ($result) {
				$this->load->view('close');
			} else {
				str_alert('添加失败');
			}
		} else {
			$data = $this->mysql_model->get_rows('product_class',array('id'=>$id)); 
			if (count($data)>0) {
			    $data['classlist'] = $this->mysql_model->get_results('product_class',array('isdel'=>0,'parentid'=>0)); 
				$this->load->view('product/class_edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}  
	}
	
	public function class_del() {
	    $id     = intval($this->input->get('id',TRUE));
		$this->mysql_model->get_count('product_class',array('isdel'=>0,'parentid'=>$id))>0 && str_alert('已发生业务不可删除'); 
		$result = $this->mysql_model->update('product_class',array('isdel'=>1),array('id'=>$id));
		if ($result) {
			$this->load->view('close');
		}
	}
	
	private function class_validform($data) {
	    $data['parentid'] = isset($data['parentid']) ? intval($data['parentid']) : 0;
		strlen($data['name']) < 1  && str_alert('名称不能为空！'); 
		return $data;
	}
	
	 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */