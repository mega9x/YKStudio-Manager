<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview();
    }
	
	public function index(){
		$data['list'] = $this->mysql_model->get_results('role',array('isdel'=>0)); 
		$this->load->view('role/index',$data);
	}
	
	public function add(){
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
			strlen($data['name'])<1 && str_alert('角色名称不能为空');
			!isset($data['lever']) || !is_array($data['lever']) && str_alert('请选择权限');
			$data['lever']  = isset($data['lever']) ? join(',',$data['lever']) : '';
			$this->mysql_model->get_count('role',array('name'=>$data['name']))>0 && str_alert('角色名称有重复'); 
		    $result = $this->mysql_model->insert('role',elements(array('name','right','lever'),$data));
			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('添加失败');	
			}
		} else {
		    $this->load->library('lib_tree');
		    $data['system']   = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu',array('isdel'=>0,'type'=>'system'))); 
			$data['customer'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu',array('isdel'=>0,'type'=>'customer'))); 
			$data['other']    = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu',array('isdel'=>0,'type'=>'other'))); 
			$this->load->view('role/add',$data);
		}
	}

	public function edit() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    strlen($data['name'])<1 && str_alert('角色名称不能为空');
			!isset($data['lever']) || !is_array($data['lever']) && str_alert('请选择权限');
			$data['lever']  = isset($data['lever']) ? join(',',$data['lever']) : '';
			$this->mysql_model->get_count('role',array('name'=>$data['name'],'id <>'=>$id))>0 && str_alert('角色名称有重复'); 
		    $result = $this->mysql_model->update('role',elements(array('name','right','lever'),$data),array('id'=>$id)); 
			if ($result) {
			    if ($data['isupdate']>0) {
				    $this->mysql_model->update('user',elements(array('right','lever'),$data),array('roleid'=>$id)); 
				}
				$this->load->view('close');
			} else {
			    str_alert('修改失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('role',array('id'=>$id)); 
			if (count($data)>0) {
			    $this->load->library('lib_tree');
			    $data['lever']    = explode(',',$data['lever']);
			    $data['system']   = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu',array('isdel'=>0,'type'=>'system'))); 
			    $data['customer'] = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu',array('isdel'=>0,'type'=>'customer'))); 
			    $data['other']    = $this->lib_tree->array_2tree($this->mysql_model->get_results('menu',array('isdel'=>0,'type'=>'other'))); 
			    $this->load->view('role/edit',$data);
			} else {
			    alert('参数错误');
			}
		}
	}
 
	
    public function del(){
	    $id = intval($this->input->get('id',TRUE));
        $this->mysql_model->get_count('user',array('roleid'=>$id))>0 && str_alert('有关联数据，无法删除,');
		$result = $this->mysql_model->update('role',array('isdel'=>1),array('id'=>$id));
		if ($result) {
            str_alert('删除成功');
		} else {
            str_alert('删除失败');
		}
	}
	
	 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */