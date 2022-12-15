<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Recycle extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(16); 
    }
	
	public function index() {
	    $post = array('mobile','Area','Square','type','start','adduser','linkman','State','Tel',
					'timetype','source','Trade','Strades','Group','SearchRange',
					'address','TimeBegin','TimeEnd','ETimeBegin','ETimeEnd','timetype','Gendan','keyword','sttdate','enddate','area1','area2');
		foreach($post as $key=>$val) {
		    $data[$val] = str_htmlencode($this->input->get_post($val,TRUE));
		}	
		$where['order']        = 'id desc';
		$where['isdel']        = 1;
		$where['type']         = $data['type'];
		$where['like|name']    = $data['keyword'];
		$where['adduser']      = $data['adduser'];
		$where['linkman']      = $data['linkman'];
		$where['start']        = $data['start'];
		$where['trade']        = $data['Trade'];
		 
		$where['source']       = $data['source'];
 
		$where['area1']        = $data['area1'];
		$where['area2']        = $data['area2'];
		$where['square']       = $data['Square'];
		$where['mobile']       = $data['mobile'];
		$where['address']      = $data['address'];
		$where['cdate >=']     = $data['TimeBegin'];
		$where['cdate <=']     = $data['TimeEnd'];
		$where['lasttime >=']  = $data['ETimeBegin'];
		$where['lasttime <=']  = $data['ETimeEnd'];
		$where['in|uid']       = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid')>0) {
            if ($this->session->userdata('manage')==true){
                $where['in|uid']  = $this->session->userdata('manage');
                $where['or|uid']  = $this->session->userdata('uid');
            }
            $where['uid']      = $this->session->userdata('uid');

        }
		switch ($data['timetype']) {
		    case 'd': $where['adddate'] = date('Y-m-d'); break;   
			case 'w': 
				$where['adddate >='] = date_query(1);
				$where['adddate <='] = date_query(2);
				break;   
			case 'm': 
			    $where['adddate >='] = date_query(5);
				$where['adddate <='] = date_query(6);
				break; 
		}  
		 
		 
		$config['totalRows'] = $this->data_model->get_customer_list($where,3);  
		$config['parameter'] = $data['parameter'] = http_build_query($data);   
		$this->load->library('lib_page',$config); 
		$where['limit1']        = $this->lib_page->firstRow;
		$where['limit2']        = $this->lib_page->listRows;
		$data['select_user']    = $this->mysql_model->get_results('user',array('isdel'=>0)); 
		$data['select_area']    = $this->mysql_model->get_results('area',array('isdel'=>0,'parentid'=>0)); 
		$data['select_type']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'type')); 
		$data['select_trade']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'trade')); 
		$data['select_job']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'job')); 
		$data['select_star']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'star'));
		$data['select_records'] = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'records')); 
		$data['select_hetong']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'hetong')); 
		$data['select_source']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'source'));
		$data['select_trade']   = $this->mysql_model->get_results('product_class',array('isdel'=>0,'parentid'=>0)); 
		$data['select_group']   = $this->mysql_model->get_results('set_group',array('isdel'=>0)); 
		$data['list']  = $this->data_model->get_customer_list($where); 
        $data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'customer'),'value'));
		$this->load->view('recycle/index',$data);
	}
	 
	
	public function restore(){
	    $id = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id)); 
		if (count($data)>0) {
		    $info['isdel'] = 0;
			$info['deldate'] = '';
			$info['deltime'] = '';
			$result = $this->mysql_model->update('customer',$info,array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if ($result) {
				$this->load->view('close');
			} else {
				str_alert('撤销失败');
			}
		} else {
			str_alert('参数错误');
		}
	}
		
	public function del() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if ($id>0) {
		    $result = $this->mysql_model->delete('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if ($result) {
			    $this->mysql_model->delete('customer_file',array('customerid'=>$id)); 
				$this->mysql_model->delete('contract',array('customerid'=>$id)); 
				$this->mysql_model->delete('financier',array('customerid'=>$id)); 
				$this->mysql_model->delete('linkman',array('customerid'=>$id)); 
				$this->mysql_model->delete('order',array('customerid'=>$id)); 
				$this->mysql_model->delete('service',array('customerid'=>$id)); 
				$this->mysql_model->delete('single',array('customerid'=>$id)); 
				$this->load->view('close');
			} else {
			    str_alert('删除失败');
			}
		} else {	
			str_alert('参数错误');
		}
	}
	
	
	public function other() {
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    !isset($data['cId']) && str_alert('请选择任务');	
		    $this->mysql_model->delete('customer',array('id'=>$data['cId'])); 
			$this->mysql_model->delete('customer_file',array('customerid'=>$data['cId'])); 
		    $this->mysql_model->delete('contract',array('customerid'=>$data['cId'])); 
			$this->mysql_model->delete('financier',array('customerid'=>$data['cId'])); 
			$this->mysql_model->delete('linkman',array('customerid'=>$data['cId'])); 
			$this->mysql_model->delete('order',array('customerid'=>$data['cId'])); 
			$this->mysql_model->delete('service',array('customerid'=>$data['cId'])); 
			$this->mysql_model->delete('single',array('customerid'=>$data['cId'])); 
			$this->load->view('close');
		} else {	
			str_alert('参数错误');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */