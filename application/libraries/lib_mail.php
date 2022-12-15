<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_mail {
    
	public function __construct(){	
	    $this->ci = &get_instance();
		$config['newline']   = "\r\n";
		$config['crlf']      = "\r\n";
		$config['protocol']  = 'smtp';  
		$config['smtp_host'] = MAIL_SMTP;  
		$config['smtp_user'] = MAIL_USER;  
		$config['smtp_pass'] = MAIL_PWD;  
		$config['smtp_port'] = '25';  
		$config['charset']   = 'utf-8';  
		$config['wordwrap']  = TRUE;  
		$config['mailtype']  = 'html';  
		$this->ci->load->library('email',$config);  
	}
    
	//发送邮件
	public function send($subject,$body,$email){
		$this->ci->email->from(MAIL_USER,MAIL_USER);  
		$this->ci->email->to($email);  
		$this->ci->email->subject($subject);  
		$this->ci->email->message($body);   
		return $this->ci->email->send();
	}	
 

}