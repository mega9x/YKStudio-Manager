<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Userlog extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(71);
    }
	
	public function index() {
	    $post = array('action','adduser','sttdate','enddate');
		foreach($post as $key=>$val) {
		    $data[$val] = str_htmlencode($this->input->get_post($val,TRUE));
		}	
		$where['isdel']        = 0; 
		$where['order']        = 'id desc'; 
		$where['adduser']      = $data['adduser'];
		$where['action']       = $data['action'];
		$where['adddate >=']   = $data['sttdate'];
		$where['adddate <=']   = $data['enddate'];
		$config['totalRows'] = $this->mysql_model->get_count('userlog',$where);  
		$config['parameter'] = http_build_query(array_filter($data));   
		$this->load->library('lib_page',$config); 
		$where['limit1']     = $this->lib_page->firstRow;
		$where['limit2']     = $this->lib_page->listRows;
		$data['user']        = $this->mysql_model->get_results('user',array('isdel'=>0)); 
		$data['list']        = $this->mysql_model->get_results('userlog',$where); 
		$this->load->view('userlog/index',$data);
	}
	

    public function del(){
	    $id = intval($this->input->get('id',TRUE));
		$result = $this->mysql_model->update('userlog',array('isdel'=>1),array('id'=>$id)); 
		if ($result) {
			$this->load->view('close');
		} else {
			str_alert('删除失败！');
		}
	}
	
	public function clear(){
	    $result = $this->mysql_model->update('userlog',array('isdel'=>1)); 
		if ($result) {
			str_alert('');
		} else {
			str_alert('清理失败！');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */