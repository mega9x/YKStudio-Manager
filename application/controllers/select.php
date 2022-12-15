<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Select extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(7);
		$this->selecttype = array(
							'type'=>'任务要求',
							'source'=>'所属联盟',
							'star'=>'流量状况',
							'trade'=>'任务类型',
							'job'=>'任务链接',
							'records'=>'跟单类型',
							'hetong'=>'合同分类',
							'service'=>'售后类型',
							'expensein'=>'收入类型',
							'expenseout'=>'支出类型',
							'soft'=>'文件分类');
		 
    }
	
	public function index(){
		$this->load->view('select/index');
	}
	
	public function main() {
	    $data['selecttype'] = $this->selecttype;
		$data['id']         = intval($this->input->get('id',TRUE));
		$data['action']     = str_htmlencode($this->input->get('action',TRUE));
		$data['type']       = str_htmlencode($this->input->get('type',TRUE));
		$data['name']       = str_htmlencode($this->input->get_post('name',TRUE));
		switch ($data['action']) {
			case 'save':
			    $this->save($data);break;  
			case 'delete':
			    $this->del($data);break;  	
		}
		$data['list'] = $this->mysql_model->get_results('set_select',array('type'=>$data['type'],'isdel'=>0)); 
		$this->load->view('select/main',$data);
	}
	
	private function save($data) {
	    if ($data['id']>0) {
		    $result = $this->mysql_model->update('set_select',elements(array('name'),$data),array('id'=>$data['id']));
		} else {
		    $result = $this->mysql_model->insert('set_select',elements(array('type','name'),$data));
		}
		if ($result) {
			str_alert('');
		}
		str_alert('操作失败');
	}
	
	private function del($data) {
		$result = $this->mysql_model->update('set_select',array('isdel'=>1),array('id'=>$data['id']));
		if ($result) {
			str_alert('操作成功');
		}
		str_alert('操作失败');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */