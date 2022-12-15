<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview();
    }
	
	public function friend_json(){
	    $uid       = $this->session->userdata('uid');
		$isdel     =1;
		$user      = $this->mysql_model->get_rows('user',array('uid'=>$uid));  
		$user_list = $this->mysql_model->get_results('user',array('uid <>'=>$uid,'isdel <>'=>$isdel,'order'=>'uid desc','select'=>'uid,name,avatar,groupid,sign'));  
		$set_group = $this->mysql_model->get_results('set_group',array('order'=>'id desc','select'=>'id,name'));  
		$json['code']                     = '0';
		$json['msg']                      = '0';
		$json['data']['mine']['id']       = $user['uid'];
		$json['data']['mine']['username'] = $user['name'];
		$json['data']['mine']['status']   = 'online';
		$json['data']['mine']['sign']     = $user['sign'];
		$json['data']['mine']['avatar']   = $user['avatar'] ? base_url($user['avatar']) : base_url('theme/default/images/avatar.jpg');
		foreach ($set_group as $k => $v) {
			$v['groupname'] = $v['name'];
			$v['online']    = '';
			unset($v['name']);
			$friend[$v['id']] = $v;
		}
		foreach ($user_list as $k => $v) {
			$group         = $v['groupid'];
			$v['id']       = $v['uid'];
			$v['username'] = $v['name'];
			$v['status']   = 'online';
			$v['sign']     = $v['sign'];
			$v['avatar']   = $v['avatar'] ? base_url($v['avatar']) : base_url('theme/default/images/avatar.jpg');
			unset($v['uid'],$v['name'],$v['groupid']);
			$friend[$group]['list'][] = $v;
		}
		$json['data']['friend']  = isset($friend) ? $friend : array();
        die(json_encode($json));
	}

	public function inc_upload() {
	    $dopost = $this->input->get('dopost',TRUE);
		switch ($dopost) {
		    case 'image': 
			    $config['filepath']   = 'data/upfile/'.$this->session->userdata('uid').'/'.date('Ym').'/';
				$this->load->library('lib_upload',$config);  
				$info = $this->lib_upload->upload('file');
				if (!isset($info['error'])) {
					$json['data']['src']  = $info['fullname'];
				    $json['data']['name'] = $info['oldname'];
				} else {
				    str_alert($info['error']);			
				}
				$json['code']         = '0';
				$json['msg']          = '上传成功';
                die(json_encode($json));
				break;   
			case 'file': 
			    $config['filepath']   = 'data/upfile/'.$this->session->userdata('uid').'/'.date('Ym').'/';
				$this->load->library('lib_upload',$config);  
				$info = $this->lib_upload->upload('file');
				if (!isset($info['error'])) {
					$json['data']['src']  = $info['fullname'];
				    $json['data']['name'] = $info['oldname'];
				} else {
				    str_alert($info['error']);			
				}
				$json['code']         = '0';
				$json['msg']          = '上传成功';
                die(json_encode($json));
				break;   
		}  
	}
	
	public function chatlog() {
		$uid     = $this->session->userdata('uid');
		$touid   = intval($this->input->get('id',TRUE));
		$type    = str_htmlencode($this->input->get('type',TRUE));
		$where['a.id_hash']         = $uid>$touid ? md5($uid.'_'.$touid) : md5($touid.'_'.$uid); 
		$where['order']             = 'id asc';
		$where['select'][1]         = 'a.id,a.touid,a.uid,a.sendtime,a.hasview,a.content ,a.type,b.name,b.avatar,b.sign';
		$where['join']['user as b'] = 'a.uid=b.uid ';
		$config['totalRows'] = $this->mysql_model->get_count('userchatlog as a',$where);  
		$this->load->library('lib_page',$config); 
		$where['limit1']     = $this->lib_page->firstRow;
		$where['limit2']     = $this->lib_page->listRows;
		$list        = $this->mysql_model->get_results('userchatlog as a',$where);
		foreach($list as $arr=>$row) {
		    $json[$arr]['avatar']    = $row['avatar'] ? base_url($row['avatar']) : base_url('theme/default/images/avatar.jpg');
		    $json[$arr]['username']  = $row['name'];
			$json[$arr]['id']        = $row['uid'];
			$json[$arr]['type']      = $row['type'];
			$json[$arr]['content']   = $row['content'];
			$json[$arr]['mine']      = false;
			$json[$arr]['timestamp'] = $row['sendtime'];
		}
		$data['list'] = isset($json) ? json_encode($json) : '[]';
		$this->load->view('chat/chatlog',$data);
	}
	

	public function pm() {
	    $dopost = $this->input->get('dopost',TRUE);
		switch ($dopost) {
		    case 'get': 
				$where['a.touid']           = $this->session->userdata('uid');
				$where['a.hasview']         = 0; 
				$where['order']             = 'id asc';
				$where['select'][1]         = 'a.id,a.touid,a.uid,a.sendtime,a.hasview,a.content ,a.type,b.name,b.avatar,b.sign';
				$where['join']['user as b'] = 'a.uid=b.uid ';
				$data = $this->mysql_model->get_rows('userchatlog as a',$where);
				if (count($data)>0) {
					$json[0]['avatar']    = $data['avatar'] ? base_url($data['avatar']) : base_url('theme/default/images/avatar.jpg');
					$json[0]['username']  = $data['name'];
					$json[0]['id']        = $data['uid'];
					$json[0]['type']      = $data['type'];
					$json[0]['content']   = $data['content'];
					$json[0]['mine']      = false;
					$json[0]['timestamp'] = time();
					$this->mysql_model->update('userchatlog',array('hasview'=>1,'writetime'=>date('Y-m-d H:i:s')),array('id'=>$data['id']));  
					die(json_encode($json));
                } else {
					die("<script>location.href='../';</script>");
				}
				break;   
			case 'send': 
				$data['content']   = str_htmlencode($this->input->post('content',TRUE));
				$data['touid']     = intval($this->input->post('toid',TRUE));
				$data['type']      = str_htmlencode($this->input->post('type',TRUE));
				$data['sendtime']  = date('Y-m-d H:i:s');
				$data['writetime'] = $data['sendtime']; 
				$data['uid']       = $this->session->userdata('uid');
				$data['id_hash']   = $data['uid']>$data['touid'] ? md5($data['uid'].'_'.$data['touid']) : md5($data['touid'].'_'.$data['uid']); 
				$result = $this->mysql_model->insert('userchatlog',$data); 
				if ($result) die("<h3>1 record added</h3>");
				break;   
		}  
	}
  
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */