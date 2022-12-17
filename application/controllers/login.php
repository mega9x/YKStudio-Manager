<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));
        if (is_array($data) && count($data) > 0) {
            !get_token() && str_alert('token验证失败', site_url('login'));
            strlen($data['username']) < 1 && str_alert('用户名不能为空', site_url('login'));
            strlen($data['userpwd']) < 1 && str_alert('密码不能为空', site_url('login'));
            $user = $this->mysql_model->get_rows('user', array('username' => $data['username'], 'isdel' => 0,));

            count($user) < 1 && str_alert('账号错误', site_url('login'));
            $user['userpwd'] != md5($data['userpwd']) && str_alert('密码错误', site_url('login'));
            $session['uid'] = $user['uid'];
            $session['name'] = $user['name'];
            $session['roleid'] = $user['roleid'];
            $session['groupid'] = $user['groupid'];
            $session['right'] = $user['right'];
            $session['manage'] = $user['manage'];
            $session['lever'] = $user['lever'];
            $session['icon'] = $user['icon'];
            $session['username'] = $user['username'];

            $this->session->set_userdata($session);
            $this->common_model->userloginlog($user);
            redirect(site_url());
        } else {
            $this->load->view('login' . LOGINSTYLE, $data);
        }
    }

    public function locks()
    {
        $action = str_htmlencode($this->input->get_post('action', TRUE));
        if ($action == 's') {
            $this->session->set_userdata('sys', '');
        } else {
            $userpwd = str_htmlencode($this->input->get_post('userpwd', TRUE));
            $data = $this->mysql_model->get_rows('user', array('uid' => $this->session->userdata('uid')));
            if (count($data) > 0) {
                if ($data['userpwd'] == md5($userpwd)) {
                    $this->session->set_userdata('sys', time());
                    die('解锁成功');
                }
            }
            die('密码错误');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */