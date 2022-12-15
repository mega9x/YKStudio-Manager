<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(17);
    }
	
	public function index(){
	    $where['order']      = 'id desc'; 
		$where['isdel']      = 0; 
		$where['in|uid']     = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid')>0) {
            if ($this->session->userdata('manage')==true){
                $where['in|uid']  = $this->session->userdata('manage');
                $where['or|uid']  = $this->session->userdata('uid');
            }
            $where['uid']      = $this->session->userdata('uid');

        }
		$config['totalRows'] = $this->mysql_model->get_count('mail',$where);   
		$this->load->library('lib_page',$config); 
		$where['limit1']     = $this->lib_page->firstRow;
		$where['limit2']     = $this->lib_page->listRows;
		$data['list']        = $this->mysql_model->get_results('mail',$where); 
		$this->load->view('mail/index',$data);
	}
 
	public function add(){
	    $id   = intval($this->input->get_post('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL));
		if (is_array($data)&&count($data)>0) {
		    !str_check($data['receive'], 'email') && str_alert('邮箱格式不正确');	
		    $result = $this->mysql_model->insert('mail',$this->validform($data));
			if ($result) {
			    $this->load->library('lib_mail'); 
				if (isset($data['type'])) {
				    $customer = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
					!isset($customer['company']) && str_alert('任务不存在');	
				    $data['content'] = str_replace('[Mail_任务名称]',$customer['company'],$data['content']);
				}
				$this->lib_mail->send($data['title'],str_htmldecode($data['content']),$data['receive']);
				str_alert('添加成功');	
			} else {
			    str_alert('添加失败');	
			}
		} else {
			if ($id>0) {
			    $data = $this->mysql_model->get_rows('customer',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
				!isset($data['company']) && str_alert('任务不存在');	
				$data['template'] = $this->mysql_model->get_results('mail_template',array('order'=>'id desc')); 
				$this->load->view('mail/add',$data);
			} else {
			    $data['id'] = $id;
			    $this->load->view('mail/add',$data);
			}
		}
	}

	public function edit() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $result = $this->mysql_model->update('mail',$data,array('id'=>$id)); 
			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('修改失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('mail',array('id'=>$id)); 
			if (count($data)>0) {
			    $this->load->view('mail/edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}
	
    public function del(){
	    $id = intval($this->input->get('id',TRUE));
		$result = $this->mysql_model->update('mail',array('isdel'=>1),array('id'=>$id)); 
		if ($result) {
		    $this->load->view('close');
		} else {
			str_alert('删除失败！');
		}
	}
	
	private function validform($data) {
	    $data['cdate'] =  date('Y-m-d');   
		$data['ctime'] =  date('Y-m-d H:i:s');   
		$data['uid']   =  $this->session->userdata('uid');
		$data['user']  =  $this->session->userdata('name');     
		return $data;
	}
	
	
	public function template(){
	    $where['order']  = 'id desc'; 
		$where['isdel']  = 0; 
		$where['in|uid'] = $this->common_model->get_purview_uid();
		$config['totalRows'] = $this->mysql_model->get_count('mail_template',$where);   
		$this->load->library('lib_page',$config); 
		$where['limit1'] = $this->lib_page->firstRow;
		$where['limit2'] = $this->lib_page->listRows;
		$data['list']    = $this->mysql_model->get_results('mail_template',$where); 
		$this->load->view('mail/template',$data);
	}
	
	public function template_add(){
		$data = str_htmlencode($this->input->post(NULL));
		if (is_array($data)&&count($data)>0) {
		    $result = $this->mysql_model->insert('mail_template',$this->validform($data));
			if ($result) {
				redirect(site_url('mail/template'));
			} else {
			    str_alert('添加失败');	
			}
		} else {
			$this->load->view('mail/template_add',$data);
		}
	}
	
	
	public function template_edit() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL));
		if (is_array($data)&&count($data)>0&&$id>0) {
		    $result = $this->mysql_model->update('mail_template',$data,array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if ($result) {
				redirect(site_url('mail/template'));
			} else {
			    str_alert('修改失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('mail_template',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) {
			    $this->load->view('mail/template_edit',$data);
			} else {
			    str_alert('参数错误');
			}
		}
	}

    public function template_del(){
	    $id = intval($this->input->get('id',TRUE));
		$result = $this->mysql_model->update('mail_template',array('isdel'=>1),array('id'=>$id)); 
		if ($result) {
		    $this->load->view('close');
		} else {
			str_alert('删除失败！');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */