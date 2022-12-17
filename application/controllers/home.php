<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview();
    }

    public function index()
    {
        $data['theme'] = $this->mysql_model->get_results('theme', array('isdel' => 0, 'uid' => 0, 'or|uid' => $this->session->userdata('uid')));
        $data['icon'] = $this->session->userdata('icon');
        $data['applist'] = $this->mysql_model->get_results('menu', array('order' => 'ordnum asc', 'isdel' => 0, 'apptype' => 'app'));
        $data['sapplist'] = $this->mysql_model->get_results('menu', array('order' => 'ordnum asc', 'isdel' => 0, 'apptype' => 'sapp'));
        $data['lever'] = $this->common_model->get_lever();
        $this->load->view('index', $data);
    }

    public function support()
    {
        $this->load->view('support');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */