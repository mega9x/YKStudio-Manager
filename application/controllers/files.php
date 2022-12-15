<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview(4);
    }
	
	public function index(){
	    $post = array('isshare','adduser','class','keyword','sttdate','enddate');
		foreach($post as $key=>$val) {
			$data[$val] = str_htmlencode($this->input->get_post($val,TRUE));
		}
		$where['order']       = 'id desc';
		$where['isdel']       = 0;
		$where['like|title']  = $data['keyword'];
		$where['isshare']     = $data['isshare'];
		$where['adduser']     = $data['adduser'];
		$where['class']       = $data['class'];
		$where['adddate >=']  = $data['sttdate'];
		$where['adddate <=']  = $data['enddate'];
		$where['in|uid']      = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid')>0) {
            if ($this->session->userdata('manage')==true){
                $where['in|uid']  = $this->session->userdata('manage');
                $where['or|uid']  = $this->session->userdata('uid');
            }
            $where['uid']      = $this->session->userdata('uid');

        }
		$where['or|isshare']  = 1;
		$config['totalRows']  = $this->data_model->get_files_list($where,3);  
		$config['parameter']  = http_build_query(array_filter($data));    
		$this->load->library('lib_page',$config); 
		$where['limit1'] = $this->lib_page->firstRow;
		$where['limit2'] = $this->lib_page->listRows;
		$data['select_user']  = $this->mysql_model->get_results('user',array('isdel'=>0)); 
		$data['select_soft']  = $this->mysql_model->get_results('set_select',array('isdel'=>0,'type'=>'soft')); 
		$data['list']         = $this->data_model->get_files_list($where); 
		$this->load->view('files/index',$data);
	}
	
 
	public function add(){
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
			} else {
			    str_alert('请选择文件');		
			}
			$data['uid']     =  $this->session->userdata('uid');
			$data['adduser'] =  $this->session->userdata('name');     
			$data['adddate'] =  date('Y-m-d');     
			$data['addtime'] =  date('Y-m-d H:i:s');
		    $result = $this->mysql_model->insert('files',$data);

			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('添加失败');
        }
		} else {
		    $data['select_soft'] = $this->mysql_model->get_results('set_select',array('type'=>'soft','isdel'=>0)); 
			$this->load->view('files/add',$data);
		}

	}

	public function edit() {
	    $id   = intval($this->input->get('id',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data)&&count($data)>0&&$id>0) {
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
			}
		    $result = $this->mysql_model->update('files',$data,array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if ($result) {
				$this->load->view('close');
			} else {
			    str_alert('修改失败');
			}
		} else {	
		    $data = $this->mysql_model->get_rows('files',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
			if (count($data)>0) {
			    $data['select_soft'] = $this->mysql_model->get_results('set_select',array('type'=>'soft','isdel'=>0)); 
			    $this->load->view('files/edit',$data);
			}
		}
	}
	
	
	public function share() {
	    $id = intval($this->input->get('id',TRUE));
		$isshare = intval($this->input->get('isshare',TRUE));
		$result  = $this->mysql_model->update('files',array('isshare'=>$isshare),array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if ($result) {
			str_alert('',site_url('files')); 
		} else {
			str_alert('操作失败！');
		}
	}
	
	
    public function del(){
	    $id = intval($this->input->get('id',TRUE));
		$result = $this->mysql_model->delete('files',array('id'=>$id,'in|uid'=>$this->common_model->get_purview_uid()));

        if ($result) {
			$this->load->view('close');
		}
	}
	
	public function down() {
	    $id   = intval($this->input->get('id',TRUE));
		$file = $this->mysql_model->get_rows('files',array('isdel'=>0,'id'=>$id,'in|uid'=>$this->common_model->get_purview_uid())); 
		if (count($file)>0) {
			file_down($file['title'],$file['filepath']);
		}
	}

	 
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */