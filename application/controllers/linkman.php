<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Linkman extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		 
    }
	
	public function index() {
	    $this->common_model->checkpurview(24);
	    $id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$where['order'] = 'id desc';
			$where['isdel'] = 0;
			$where['customerid']   = $id;
            $where['in|uid']        = $this->common_model->get_purview_uid();
            //非管理员
            if ($this->session->userdata('roleid')>0) {
                if ($this->session->userdata('manage')==true){
                    $where['in|uid']  = $this->session->userdata('manage');
                    $where['or|uid']  = $this->session->userdata('uid');
                }
                $where['uid']      = $this->session->userdata('uid');

            }
			$data['list']   = $this->mysql_model->get_results('linkman',$where); 
			$data['value']  = unserialize($this->mysql_model->get_rows('config',array('name'=>'linkmans'),'value'));
			$this->load->view('linkman/index',$data);
		} else {
		    str_alert('参数错误');
		}
	}
	
	
	public function add(){
	    $this->common_model->checkpurview(25);
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    $data['uid']       =  $this->session->userdata('uid');
			$data['adduser']   =  $this->session->userdata('username');     
			$data['adddate']   =  date('Y-m-d'); 
		    $result = $this->mysql_model->insert('linkman',$data);
			if ($result) {
			    $info['linkman_num'] = $this->mysql_model->get_count('linkman',array('isdel'=>0,'customerid'=>$data['customerid']));
				$this->mysql_model->update('customer',$info,array('id'=>$data['customerid'])); 
			    $data['action']   =  '新增';
				$data['module']   =  '任务链接';
				$data['reason']   =  '';
			    $this->common_model->userlog($data);
				$this->load->view('close');
			} else {
			    str_alert('添加失败');	
			}
		} else {
		    $id = intval($this->input->get_post('id',TRUE));
			$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) {
				$data['select_job'] = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'job')); 
				$data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'linkmans'),'value')); 
				$this->load->view('linkman/add',$data);
			} else {
			    str_alert('参数错误');	
			}
		}
	}
	
	

	public function edit() {
	    $this->common_model->checkpurview(26);
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    //$data['update'] =  date('Y-m-d');
		    $data['updtime'] =  date('Y-m-d H:i:s'); 
		    $linkman = $this->mysql_model->get_rows('linkman',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($linkman)>0) {
				$result = $this->mysql_model->update('linkman',$data,array('id'=>$id)); 
				if ($result) {
					$data['action']   =  '修改';
					$data['module']   =  '任务链接';
					$data['reason']   =  '';
					$data['customerid']    =  $linkman['customerid'];
					$data['customername']  =  $linkman['customername'];
					$this->common_model->userlog($data);
					$this->load->view('close');
				} else {
					str_alert('修改失败');
				}
			}
		} else {	
		    $data = $this->mysql_model->get_rows('linkman',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) {
			    $data['select_job'] = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'job')); 
				$data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'linkmans'),'value')); 
			    $this->load->view('linkman/edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
	
    public function del(){
	    $this->common_model->checkpurview(27);
	    $id = intval($this->input->get('id',TRUE));
		$linkman = $this->mysql_model->get_rows('linkman',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($linkman)>0) {
			$result = $this->mysql_model->update('linkman',array('isdel'=>1),array('id'=>$id)); 
			if ($result) {
			    $info['linkman_num'] = $this->mysql_model->get_count('linkman',array('isdel'=>0,'customerid'=>$linkman['customerid']));
				$this->mysql_model->update('customer',$info,array('id'=>$linkman['customerid'])); 
				$data['action']   =  '删除';
				$data['module']   =  '任务链接';
				$data['reason']   =  '';
				$data['customerid']    =  $linkman['customerid'];
				$data['customername']  =  $linkman['customername'];
				$this->common_model->userlog($data);
				$this->load->view('close');
			} else {
				str_alert('删除失败！');
			}
		}
	}
	
 
 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */