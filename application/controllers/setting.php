<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
	
	public function index() {
	    $this->common_model->checkpurview(1);
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data) && count($data)>0) {
		    
		    $data['Onlycompany'] = isset($data['Onlycompany']) ? 1 : 0;
			$data['Onlylinkman'] = isset($data['Onlylinkman']) ? 1 : 0;
			$data['Onlytel']     = isset($data['Onlytel']) ? 1 : 0;
			if ($this->set_config($data,'./data/config/setting_config.php')) {
			    redirect(site_url('setting?act=success'));
			} else {
			    str_alert('设置失败'); 
			}
		} else {
		    $this->load->view('setting/index',$data);
		}
	}
	
	public function mail() {
	    $this->common_model->checkpurview(1);
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data) && count($data)>0) {
			if ($this->set_config($data,'./data/config/setting_mail.php')) {
			    redirect(site_url('setting/mail?act=success'));
			} else {
			    str_alert('设置失败'); 
			}
		} else {
		    $this->load->view('setting/mail',$data);
		}
	}
	
	public function config() {
	    $type = str_htmlencode($this->input->get('type',TRUE));
		$data = str_htmlencode($this->input->post(NULL,TRUE));
		if (is_array($data) && count($data)>0) {
			$result = $this->mysql_model->update('config',array('value'=>serialize($data)),array('name'=>$type)); 
			if ($result) {
			    $this->load->view('close');
			} else {
			    str_alert('设置失败'); 
			}
		} else {
		    $data = $this->mysql_model->get_rows('config',array('name'=>$type)); 
			if (count($data)>0) {
			    $data['value'] = unserialize($data['value']);
		        $this->load->view('setting/'.$type,$data);
			} else {
				str_alert('参数错误'); 
			}
		}
	}
	
	
	private function set_config($data,$dir){
		if (strlen($dir)>0) {
		    $str = "<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); \n";
			foreach ($data as $arr=>$vale) {
				$str .= 'define(\''.strtoupper($arr).'\',\''.$vale.'\');';
				$str .= "\n";
			}
			if (write_file($dir,$str,'w+')) {
			    return true;
			}
		}
		return false;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */