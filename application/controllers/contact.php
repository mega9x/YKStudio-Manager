<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview();

    }

    public function index()
    {
        $post = array('keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['a.isdel'] = 0;
        $where['like|(a.username'] = $data['keyword'];
        $where['or|like|a.name'] = $data['keyword'];
        $where['or|like|a.mobile'] = $data['keyword'];
        $where['#)'] = $data['keyword'];
        //$where['in|a.uid']               = $this->common_model->get_purview_uid();
        $config['totalRows'] = $this->data_model->get_user_list($where, 3);
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $where['in|uid'] = $this->common_model->get_purview_uid();
        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            if ($this->session->userdata('manage') == true) {
                $where['in|uid'] = $this->session->userdata('manage');
                $where['or|uid'] = $this->session->userdata('uid');
            }
            $where['uid'] = $this->session->userdata('uid');

        }

        $data['list'] = $this->data_model->get_user_list($where);
        $this->load->view('contact/index', $data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */