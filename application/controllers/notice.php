<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview();

    }

    public function single()
    {
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['nexttime >='] = date_query(5);
        $where['nexttime <='] = date_query(6);
        $where['limit1'] = 0;
        $where['limit2'] = 5;
        $where['in|uid'] = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            if ($this->session->userdata('manage') == true) {
                $where['in|uid'] = $this->session->userdata('manage');
                $where['or|uid'] = $this->session->userdata('uid');
            }
            $where['uid'] = $this->session->userdata('uid');

        }
        $data['list'] = $this->mysql_model->get_results('single', $where);
        $this->load->view('notice/single', $data);
    }

    public function contract()
    {
        $where['isdel'] = 0;
        $where['edate >='] = date_query(5);
        $where['edate <='] = date_query(6);
        $where['limit1'] = 0;
        $where['limit2'] = 5;
        $where['in|uid'] = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            if ($this->session->userdata('manage') == true) {
                $where['in|uid'] = $this->session->userdata('manage');
                $where['or|uid'] = $this->session->userdata('uid');
            }
            $where['uid'] = $this->session->userdata('uid');

        }
        $data['list'] = $this->mysql_model->get_results('contract', $where);
        $this->load->view('notice/contract', $data);
    }

    public function msg()
    {
        $data['list'] = $this->mysql_model->get_results('message', array('isdel' => 0, 'isread' => 0, 'receivname' => $this->session->userdata('name')));
        $this->load->view('notice/msg', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */