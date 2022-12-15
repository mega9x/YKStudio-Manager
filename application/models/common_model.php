<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model{

	public function __construct(){
  		parent::__construct();
		$this->uid      = $this->session->userdata('uid');
		$this->icon     = $this->session->userdata('icon');
		$this->name     = $this->session->userdata('name');
		$this->lever    = $this->session->userdata('lever');
		$this->manage   = $this->session->userdata('manage');
		$this->groupid  = $this->session->userdata('groupid');
		$this->right    = $this->session->userdata('right');
		$this->roleid   = $this->session->userdata('roleid');
		$this->username = $this->session->userdata('username');
	}

	//检测权限
	public function checkpurview($id=0) { 
	    !$this->uid && redirect(site_url('login'));
	}
	
	//权限验证
	public function check_lever($id) { 
		if ($this->roleid==0) {
			return true;
		} else {	
			if (in_array($id,explode(',',$this->lever))) return true; 	
		}
	    return false; 
	}
	
	//获取权限值
	public function get_lever() { 
		if ($this->roleid==0) {
			$lever = array_column($this->mysql_model->get_results('menu',array('isdel'=>0)),'id');
		} else {	
			$lever = explode(',',$this->lever);
		}
	    return $lever; 
	}
	
	//数据权限
	public function get_purview_uid() { 
	    $where = '';
		if ($this->roleid>0) {
			$data  = $this->mysql_model->get_results('user',array('groupid'=>$this->groupid,'"right" <='=>$this->right)); 
			if (count($data)>0) {
				$arr1  = array_column($data, 'uid');
				$arr2  = explode(',',$this->manage);
				$where = array_unique(array_merge($arr1,$arr2));
			}
		}
	    return $where; 
	}
 
	//用户日志
	public function userlog($info) {
	    if (ISLOG==1) {
			$data['uid']      =  $this->uid;
			$data['adduser']  =  $this->name;
			$data['ip']       =  $this->input->ip_address();
			$data['action']   =  $info['action'];
			$data['module']   =  $info['module'];
			$data['reason']   =  $info['reason'];
			$data['customerid']    =  isset($info['customerid']) ? $info['customerid'] : '';
			$data['customername']  =  isset($info['customername']) ? $info['customername'] : '';
			$data['adddate']       =  date('Y-m-d');
			$data['addtime']       =  date('Y-m-d H:i:s');
			$this->mysql_model->insert('userlog',$data);
		}		
	}
		
	//登陆日志
	public function userloginlog($info) {
	    if (ISLOG==1) {
			$data['uid']     =  $info['uid'];
			$data['ip']      =  $this->input->ip_address();
			$data['adduser'] =  $info['name'];     
			$data['adddate'] =  date('Y-m-d');
			$data['addtime'] =  date('Y-m-d H:i:s');
			$this->mysql_model->insert('userloginlog',$data);	
		}		
	}	
	
	
	
	


}