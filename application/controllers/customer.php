<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		 
    }
	
	public function index() {
	    $this->common_model->checkpurview(19);
		$post = array('mobile','type','start','adduser','linkman','state','tel',
					'timetype','source','trade','address','timetype','keyword','sttdate','enddate','area1','area2');
		foreach($post as $key=>$val) {
		    $data[$val] = str_htmlencode($this->input->get_post($val,TRUE));
		}
		
		
		
			
		$where['order']           = 'id desc';
		$where['isdel']           = 0;
		$where['type']            = $data['type'];
		$where['like|(name']      = $data['keyword'];
		$where['or|like|mobile']  = $data['keyword'];
		$where['or|like|address'] = $data['address'];
		$where['or|like|linkman'] = $data['keyword'];
        $where['or|like|record'] = $data['keyword'];
		$where['#)']              = $data['keyword'];
		$where['adduser']         = $data['adduser'];
		$where['start']           = $data['start'];
		$where['trade']           = $data['trade'];
		$where['source']          = $data['source'];
		$where['area1']           = $data['area1'];
		$where['area2']           = $data['area2'];
		$where['adddate >=']      = $data['sttdate'];
		$where['adddate <=']      = $data['enddate'];
		$where['in|uid']          = $this->common_model->get_purview_uid();
		
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
		
		
		 
		$config['totalRows']    = $this->data_model->get_customer_list($where,3);  
		$config['parameter']    = $data['parameter'] = http_build_query($data);   
		$this->load->library('lib_page',$config); 
		$where['limit1']        = $this->lib_page->firstRow;
		$where['limit2']        = $this->lib_page->listRows;
		$data['select_user']    = $this->mysql_model->get_results('user',array('isdel'=>0)); 
		$data['select_area']    = $this->mysql_model->get_results('area',array('isdel'=>0,'parentid'=>0)); 
		$data['select_type']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'type')); 
		$data['select_trade']   = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'trade')); 
		$data['select_job']     = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'job')); 
		$data['select_star']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'star'));
		$data['select_records'] = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'records')); 
		$data['select_hetong']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'hetong')); 
		$data['select_source']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'source'));
		$data['list']           = $this->data_model->get_customer_list($where); 
        $data['config']         = unserialize($this->mysql_model->get_rows('config',array('name'=>'customer'),'value')); 
		$this->load->view('customer/index',$data);

	}
	
	public function excel() {
	    $this->common_model->checkpurview(19);
		sys_csv('任务列表-'.date('YmdHis').'.xls');
	    $post = array('mobile','type','start','adduser','linkman','state','tel',
					'timetype','source','trade','address','timetype','keyword','sttdate','enddate','area1','area2');
		foreach($post as $key=>$val) {
		    $data[$val] = str_htmlencode($this->input->get_post($val,TRUE));
		}	
		$where['order']           = 'id desc';
		$where['isdel']           = 0;
		$where['type']            = $data['type'];
		$where['like|(name']      = $data['keyword'];
		$where['or|like|mobile']  = $data['keyword'];
		$where['or|like|address'] = $data['address'];
		$where['or|like|linkman'] = $data['keyword'];
		$where['#)']              = $data['keyword'];
		$where['adduser']         = $data['adduser'];
		$where['start']           = $data['start'];
		$where['trade']           = $data['trade'];
		$where['source']          = $data['source'];
		$where['area1']           = $data['area1'];
		$where['area2']           = $data['area2'];
		$where['adddate >=']      = $data['sttdate'];
		$where['adddate <=']      = $data['enddate'];
		$where['in|uid']          = $this->common_model->get_purview_uid();
		//非管理员
		if ($this->session->userdata('roleid')>0) {
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
		$data['list']           = $this->data_model->get_customer_list($where); 		
        $data['config']         = unserialize($this->mysql_model->get_rows('config',array('name'=>'customer'),'value')); 
		$this->load->view('customer/excel',$data);
		
	}
	
	//新增
	public function add(){
	    $this->common_model->checkpurview(20);
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    $data['uid']        = $this->session->userdata('uid');
			$data['adduser']    = $this->session->userdata('name');
			$data['adddate']    = date('Y-m-d');
			$data['addtime']    = date('Y-m-d H:i:s');
		    if (ONLYCOMPANY>0) $this->mysql_model->get_count('customer',array('name'=>$data['name']))>0 && str_alert('任务名称已经存在');
			if (ONLYLINKMAN>0) $this->mysql_model->get_count('customer',array('linkman'=>$data['linkman']))>0 && str_alert('任务链接已经存在');
            $result = $this->mysql_model->insert('customer',$data);


			if ($result) {
                $linkman['customerid']=$result;
                $linkman['customername']=$data['customername'];
                $linkman['name']=$data['linkman'];
                $linkman['job']=$data['job'];
                $linkman['mobile']=$data['mobile'];
                $linkman['qq']=$data['qq'];
                $linkman['email']=$data['email'];
                $linkman['uid']       =  $this->session->userdata('uid');
                $linkman['adduser']   =  $this->session->userdata('username');
                $linkman['adddate']   =  date('Y-m-d');
                //var_dump($linkman);


			    $data['action']   =  '新增';
				$data['module']   =  '任务列表';
				$data['reason']   =  '';
				$data['customerid'] =  $result;
				$this->common_model->userlog($data);
                $this->mysql_model->insert('linkman',$linkman);
				$this->load->view('close');


			} else {
			    str_alert('添加失败');
			}
		} else {
		    $data['config']         = unserialize($this->mysql_model->get_rows('config',array('name'=>'customer_addmust'),'value'));
		    $data['select_area']    = $this->mysql_model->get_results('area',array('isdel'=>0,'parentid'=>0));
			$data['select_type']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'type'));
			$data['select_trade']   = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'trade'));
			$data['select_job']     = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'job'));
			$data['select_star']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'star'));
			$data['select_records'] = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'records'));
			$data['select_hetong']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'hetong'));
			$data['select_source']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'source'));
			$this->load->view('customer/add',$data);
		}

	}
   
    //修改
	public function edit() {
	    $this->common_model->checkpurview(21);
	    $id   = intval($this->input->get('id',TRUE));
        //$linkmans = $this->mysql_model->get_rows('customer',array('id'=>$product['orderid']));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $customer = $this->mysql_model->get_rows('customer',array('id'=>$id));
            //$link[name]=$customer['linkman'];
			if (count($customer)>0) {
				$data['upddate']    = date('Y-m-d');  
				$data['updtime']    = date('Y-m-d H:i:s');
				if (ONLYCOMPANY>0) $this->mysql_model->get_count('customer',array('name'=>$data['name'],'id <>'=>$id))>0 && str_alert('任务名称已经存在'); 
				if (ONLYLINKMAN>0) $this->mysql_model->get_count('customer',array('linkman'=>$data['linkman'],'id <>'=>$id))>0 && str_alert('任务链接已经存在'); 
                $result = $this->mysql_model->update('customer',$data,array('id'=>$id));
				if ($result) {
                    $linkman['customerid']=$id;
                    $linkman['customername']=$data['customername'];
                    $linkman['name']=$data['linkman'];
                    $linkman['job']=$data['job'];
                    $linkman['mobile']=$data['mobile'];
                    $linkman['qq']=$data['qq'];
                    $linkman['email']=$data['email'];
                   // $linkman['uid']       =  $this->session->userdata('uid');
                   // $linkman['adduser']   =  $this->session->userdata('username');
                   // $linkman['adddate']   =  date('Y-m-d');

					$data['action']   =  '修改';
					$data['module']   =  '任务列表';
					$data['reason']   =  '';
					$data['customerid']    =  $id;
					$data['customername']  =  $customer['name'];
					$this->common_model->userlog($data);
                    $this->mysql_model->update('linkman',$linkman,array('customerid'=>$id,'name'=>$customer['linkman']) );
                    $this->load->view('close');
				} else {
					str_alert('修改失败');
				}
			}
		} else {	
		    $data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) {
				$data['config']         = unserialize($this->mysql_model->get_rows('config',array('name'=>'customer_addmust'),'value'));
				$data['select_type']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'type')); 
				$data['select_trade']   = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'trade')); 
				$data['select_job']     = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'job')); 
				$data['select_star']    = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'star'));
				$data['select_records'] = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'records')); 
				$data['select_hetong']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'hetong')); 
				$data['select_source']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'source'));
				$data['select_area']    = $this->mysql_model->get_results('area',array('isdel'=>0,'parentid'=>0));  
			    $this->load->view('customer/edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
	
	public function reason() {
	    $this->common_model->checkpurview(22);
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $customer = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($customer)>0) {
				$info['isdel'] = 1;
				$info['deldate'] = date('Y-m-d');
				$info['deltime'] = date('Y-m-d H:i:s');
				$result = $this->mysql_model->update('customer',$info,array('id'=>$id)); 
				if ($result) {
					$data['action']   =  '删除';
					$data['module']   =  '任务列表';
					$data['customerid']    =  $id;
					$data['customername']  =  $customer['customername'];
					$this->common_model->userlog($data);
					$this->load->view('close');
				} else {
					str_alert('修改失败');
				}
			}
		} else {	
		    $data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) {
			    $this->load->view('customer/reason',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
	//删除
    public function del(){
	    $this->common_model->checkpurview(22);
	    if (DELREASON>0) {
			$this->reason();
		} else {
			$id = intval($this->input->get('id',TRUE));
			$customer = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($customer)>0) {
				$data['isdel'] = 1;
				$data['deldate'] = date('Y-m-d');
				$data['deltime'] = date('Y-m-d H:i:s');
				$result = $this->mysql_model->update('customer',$data,array('id'=>$id)); 
				if ($result) {
					$data['action']   =  '删除';
					$data['module']   =  '任务列表';
					$data['reason']   =  '';
					$data['customerid']    =  $id;
					$data['customername']  =  $customer['customername'];
					$this->common_model->userlog($data);
					$this->load->view('close');
				} else {		
					str_alert('删除失败！');
				}
			}
		}
	}
	
	//批量转移
	public function transfer(){
		$id   = str_htmlencode($this->input->get_post('id',TRUE));
		$user = str_htmlencode($this->input->get_post('user',TRUE));
		$name  = $this->mysql_model->get_rows('user',array('name'=>$user));
		$uid=$name['uid'];
		//var_dump($uid);
		
		if (strlen($id)>0 && strlen($user)>0) {
			$id = explode(',',$id);	
			$result = $this->mysql_model->update('customer',array('adduser'=>$user,'uid'=>$uid),array('in|id'=>$id)); 
			//if ($result)str_alert('成功转移将'.count($id).'条记录转移给'.$user);	
			//str_alert('操作失败');
            if ($result) {
					$this->load->view('close');
				} else {		
					str_alert('操作失败');
				}			
		}
	
		
		
	}
	
	//批量删除
	public function dels(){
		$id   = str_htmlencode($this->input->get_post('id',TRUE));
		if (strlen($id)>0) {
			$id = explode(',',$id);	
			$info['isdel']   = 1;
			$info['deldate'] = date('Y-m-d');
			$info['deltime'] = date('Y-m-d H:i:s');
			$result = $this->mysql_model->update('customer',$info,array('in|id'=>$id)); 
			//if ($result) str_alert('操作成功');	
			//str_alert('操作失败');
             if ($result) {
					$this->load->view('close');
				} else {		
					str_alert('操作失败');
				}					
		}
	}
	
	public function infoview() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$this->load->view('customer/infoview',$data);
		} else {
			str_alert('参数错误');
		}
	}
	
	//任务共享
	public function share(){
	    $this->common_model->checkpurview(11);
	    $id   = intval($this->input->get_post('id',TRUE));
	    $data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    if ($data['isshare']==1) {
			    $data['sharerange'] = is_array($data['sharerange']) ? join(',',$data['sharerange']) : '';
			} else {
			    $data['sharerange'] = '';
			}
		    $result = $this->mysql_model->update('customer',$data,array('id'=>$id)); 
			if ($result) {
			    str_alert('操作成功');	
			} else {
			    str_alert('操作失败');	
			}
		} else {
			$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) { 
			    $data['sharerange']   = explode(',',$data['sharerange']);
				$data['select_user']  = $this->mysql_model->get_results('user',array('isdel'=>0));
				$data['select_group'] = $this->mysql_model->get_results('set_group',array('order'=>'id desc','isdel'=>0)); 
				$this->load->view('customer/share',$data);
			} else {
			    str_alert('参数错误');	
			}
		}
	}
	
	//订单
	public function order(){
	    $this->common_model->checkpurview(34);
	    $id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$data['audit'] = array(1=>'已完成',2=>'处理中',3=>'未处理');
			$data['list']  = $this->mysql_model->get_results('order',array('order'=>'id desc','isdel'=>0,'customerid'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			$data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'order'),'value')); 
			$this->load->view('customer/order',$data);
		} else {
		    str_alert('参数错误');
		}
	}
	
    //支出财务	
	public function expense(){
	    $this->common_model->checkpurview(49);
		$id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
		    $data['inmoney']     = $this->mysql_model->get_rows('financier',array('isdel'=>0,'outin'=>1,'select'=>array('sum|money'=>'money')));
		    $data['outmoney']    = $this->mysql_model->get_rows('financier',array('isdel'=>0,'outin'=>2,'select'=>array('sum|money'=>'money')));
			$data['list']  = $this->mysql_model->get_results('financier',array('order'=>'id desc','isdel'=>0,'customerid'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			$data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'financier'),'value')); 
			$this->load->view('customer/expense',$data);
		} else {
		    str_alert('参数错误');
		}
	}
    
	//售后服务
	public function service(){
	    $this->common_model->checkpurview(44);
		$id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$data['list']  = $this->mysql_model->get_results('service',array('order'=>'id desc','isdel'=>0,'customerid'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			$data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'service'),'value')); 
			$this->load->view('customer/service',$data);
		} else {
		    str_alert('参数错误');
		}
	}
	
	//合同
	public function hetong() {
	    $this->common_model->checkpurview(39);
	    $this->load->model('data_model'); 
		$id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
		    $where['order']  = 'id desc';
			$where['isdel']  = 0;
			$where['customerid']    = $id;
			$where['in|uid'] = $this->common_model->get_purview_uid();
			$data['list']    = $this->data_model->get_contract_list($where);
			$data['value']   = unserialize($this->mysql_model->get_rows('config',array('name'=>'contract'),'value')); 
			$this->load->view('customer/hetong',$data);
		} else {
		    str_alert('参数错误');
		}
	}
	
	//文件
	public function files(){
	    $this->common_model->checkpurview(54);
		$id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$data['list']  = $this->mysql_model->get_results('customer_file',array('order'=>'id desc','isdel'=>0,'customerid'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		    $this->load->view('customer/files',$data);
		} else {
		    str_alert('参数错误');
		}
	}
	
	//跟单
	public function records() {
	    $this->common_model->checkpurview(29);
	    $id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$data['list']  = $this->mysql_model->get_results('single',array('order'=>'id desc','isdel'=>0,'customerid'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			$data['value'] = unserialize($this->mysql_model->get_rows('config',array('name'=>'single'),'value')); 
			$this->load->view('customer/records',$data);
		} else {
		    str_alert('参数错误');
		}
	}
	
	//操作记录
	public function history(){
	    $this->common_model->checkpurview(71);
		$id   = intval($this->input->get('id',TRUE));
		$data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($data)>0) {
			$data['list']  = $this->mysql_model->get_results('userlog',array('order'=>'id desc','customerid'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			$this->load->view('customer/history',$data);
		} else {
		    str_alert('参数错误');
		}
	}
 
	
	//附件管理
	public function files_add() {
	    $this->common_model->checkpurview(55);
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0) {
		    if ($_FILES['file']['name']) { 
			    $config['filepath']   = 'data/upfile/'.$this->session->userdata('uid').'/'.date('Ym').'/';
				$this->load->library('lib_upload',$config);  
				$info = $this->lib_upload->upload('file');
				if (!isset($info['error'])) {
					$data['title']    = $info['oldname'];
					$data['filepath'] = $info['filepath'];
				} else {
				    str_alert($info['error']);			
				}
				$data['filesize'] = $info['filesize']; 
				$data['uid']      = $this->session->userdata('uid');
				$data['adduser']     = $this->session->userdata('name');     
				$data['adddate']    = date('Y-m-d');     
				$data['addtime']    = date('Y-m-d H:i:s'); 
			}
                        // var_dump($data);
                         
		     $result = $this->mysql_model->insert('customer_file',$data);
			
                         if ($result) {
                         
			    $info['file_num'] = $this->mysql_model->get_count('customer_file',array('isdel'=>0,'customerid'=>$data['customerid']));
				$this->mysql_model->update('customer_file',$info,array('id'=>$data['customerid']));
				$this->load->view('close');
			} else {
			    str_alert('添加失败');	
			}
                         
                 
		} else {
		    $id   = intval($this->input->get_post('id',TRUE));
			$data = $this->mysql_model->get_rows('customer',array('isdel'=>0,'id'=>$id)); 
			
                      
                         if (count($data)>0) {
                              //var_dump($data);
			$this->load->view('customer/files_add',$data);
			} else {
			    str_alert('参数错误');
			}
                       
                          
                          
                  
		}
	}
	
	//文件删除
	public function files_del() {
	    $this->common_model->checkpurview(57);
	    $id = intval($this->input->get('id',TRUE));
		$file = $this->mysql_model->get_rows('customer_file',array('isdel'=>0,'id'=>$id)); 
		if (count($file)>0) {
			$result = $this->mysql_model->update('customer_file',array('isdel'=>1),array('id'=>$id)); 
			if ($result) {
			    $info['file_num'] = $this->mysql_model->get_count('customer_file',array('isdel'=>0,'customerid'=>$file['customerid']));
				$this->mysql_model->update('customer',$info,array('id'=>$file['customerid']));
				$data['action']   =  '删除';
				$data['module']   =  '附件记录';
				$data['customerid']    =  $file['customerid'];
				$data['customername']  =  $file['customername'];
				$this->common_model->userlog($data);
				$this->load->view('close');
			} else {
				str_alert('删除失败！');
			}
		}
	}
	
	//文件下载
	public function files_down() {
	    $this->common_model->checkpurview(54);
	    $id = intval($this->input->get('id',TRUE));
		$file = $this->mysql_model->get_rows('customer_file',array('isdel'=>0,'id'=>$id)); 
		if (count($file)>0) {
			file_down($file['title'],$file['filepath']);
		}
	}
 
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */