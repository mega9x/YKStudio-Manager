<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview();

    }

    public function index()
    {

    }

    //任务名称验证
    public function customer_name()
    {
        $name = str_htmlencode($this->input->get_post('name', TRUE));
        $data = $this->mysql_model->get_rows('customer', array('name' => $name));
        if (count($data) > 0) {
            die('<span class=info_error>已存在</span>');
        }
    }

    //任务名称检查
    public function customer_check()
    {
        $item = intval($this->input->get('item', TRUE));
        $where['isdel'] = 0;
        $where['like|company'] = $item;
        $list = $this->mysql_model->get_results('customer', $where);
        $str = '<?xml version="1.0" encoding="utf8"?><root>';
        foreach ($list as $arr => $row) {
            $str .= '<message id="' . $row['id'] . '"><text>' . $row['company'] . '</text></message>';
        }
        $str .= '</root>';
        die($str);
    }

    //获取地区
    public function getarea()
    {
        $id = intval($this->input->get('id', TRUE));
        $list = $this->mysql_model->get_results('area', array('isdel' => 0, 'parentid' => $id));
        $str = '<select name="square" onchange="getSquare(options[selectedIndex]);"><option value="">请选择</option>';
        foreach ($list as $arr => $row) {
            $str .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
        }
        $str .= '</select>';
        die($str);
    }

    //获取产品类别
    public function gettrade()
    {
        $id = intval($this->input->get('id', TRUE));
        $list = $this->mysql_model->get_results('product_class', array('isdel' => 0, 'parentid' => $id));
        $str = '<select name="strade" onchange="getStrade(options[selectedIndex]);"><option value="">请选择</option>';
        foreach ($list as $arr => $row) {
            $str .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
        }
        $str .= '</select>';
        die($str);
    }

    public function upload()
    {
        $config['filepath'] = 'data/upfile/' . $this->session->userdata('uid') . '/' . date('Ym') . '/';
        $this->load->library('lib_upload', $config);
        $info = $this->lib_upload->upload('imgFile');
        if (!isset($info['error'])) {
            die(json_encode(array('error' => 0, 'oldfilename' => $info['oldname'], 'url' => base_url($info['filepath']))));
        } else {
            str_alert($info['error']);
        }
    }

    public function upload_manage()
    {
        $config['filepath'] = 'data/upfile/' . $this->session->userdata('uid') . '/';
        $this->load->library('lib_upload', $config);
        $this->lib_upload->manage();
    }

    public function choose_product()
    {
        $where['isdel'] = 0;
        $config['totalRows'] = $this->mysql_model->get_count('product', $where);
        $this->load->library('lib_page', $config);
        $where['order'] = 'id desc';
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['list'] = $this->mysql_model->get_results('product', $where);
        $this->load->view('common/choose_product', $data);
    }

    //选择区域
    public function choose_area1()
    {
        $post = array('keyword');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['isdel'] = 0;
        $where['parentid'] = 0;
        $where['order'] = 'id asc';
        $where['like|name'] = $data['keyword'];
        $config['totalRows'] = $this->mysql_model->get_count('area', $where);
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['list'] = $this->mysql_model->get_results('area', $where);
        $this->load->view('common/choose_area1', $data);
    }

    //选择区域
    public function choose_area2()
    {
        $post = array('keyword');
        //$area1= $this->input->POST('area1');
        //$area_name1= $this->input->POST('area_name1');
        //echo $area_name1;
        //  var_dump($area_name1);

        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }


        $where['isdel'] = 0;
        $where['order'] = 'id asc';
        $where['like|name'] = $data['keyword'];
        $config['totalRows'] = $this->mysql_model->get_count('area', $where);
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['list'] = $this->mysql_model->get_results('area', $where);
        $this->load->view('common/choose_area2', $data);


    }

    public function choose_user()
    {
        $data['list'] = $this->mysql_model->get_results('order', array('isdel' => 0));
        $data['user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['group'] = $this->mysql_model->get_results('set_group', array('isdel' => 0));
        $this->load->view('common/choose_user', $data);
    }

    //选择客户
    public function choose_customer()
    {
        $data = str_htmlencode($this->input->post(NULL, TRUE));

        $this->load->model('data_model');
        $post = array('mobile', 'Area', 'Square', 'type', 'start', 'adduser', 'linkman', 'State', 'Tel',
            'timetype', 'source', 'Trade', 'Strades', 'Group', 'SearchRange',
            'address', 'TimeBegin', 'TimeEnd', 'ETimeBegin', 'ETimeEnd', 'timetype', 'Gendan', 'keyword', 'sttdate', 'enddate', 'area1', 'area2');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['order'] = 'id desc';
        $where['isdel'] = 0;
        $where['type'] = $data['type'];
        $where['like|name'] = $data['keyword'];
        $where['adduser'] = $data['adduser'];
        $where['linkman'] = $data['linkman'];
        $where['start'] = $data['start'];
        $where['trade'] = $data['Trade'];

        $where['source'] = $data['source'];

        $where['area1'] = $data['area1'];
        $where['area2'] = $data['area2'];
        $where['square'] = $data['Square'];
        $where['mobile'] = $data['mobile'];
        $where['address'] = $data['address'];
        $where['cdate >='] = $data['TimeBegin'];
        $where['cdate <='] = $data['TimeEnd'];
        $where['lasttime >='] = $data['ETimeBegin'];
        $where['lasttime <='] = $data['ETimeEnd'];

        //非管理员
        if ($this->session->userdata('roleid') > 0) {
            $where['uid'] = $this->session->userdata('uid');
        }

        switch ($data['timetype']) {
            case 'd':
                $where['adddate'] = date('Y-m-d');
                break;
            case 'w':
                $where['adddate >='] = date_query(1);
                $where['adddate <='] = date_query(2);
                break;
            case 'm':
                $where['adddate >='] = date_query(5);
                $where['adddate <='] = date_query(6);
                break;
        }
        $config['totalRows'] = $this->mysql_model->get_count('customer', $where);
        $config['parameter'] = http_build_query(array_filter($data));
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        $data['select_area'] = $this->mysql_model->get_results('area', array('isdel' => 0));
        $data['select_type'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'type'));
        $data['select_zhiwei'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'zhiwei'));
        $data['select_star'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'star'));
        $data['select_records'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'records'));
        $data['select_hetong'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'hetong'));
        $data['select_source'] = $this->mysql_model->get_results('set_select', array('isdel' => 0, 'type' => 'source'));
        $data['select_trade'] = $this->mysql_model->get_results('product_class', array('isdel' => 0, 'parentid' => 0));
        $data['select_group'] = $this->mysql_model->get_results('set_group', array('isdel' => 0));
        $data['list'] = $this->mysql_model->get_results('customer', $where);
        $data['value'] = unserialize($this->mysql_model->get_rows('config', array('name' => 'customer'), 'value'));
        $this->load->view('common/choose_customer', $data);
    }


    public function choose_order()
    {
        $post = array('keyword', 'customerid');
        foreach ($post as $key => $val) {
            $data[$val] = str_htmlencode($this->input->get_post($val, TRUE));
        }
        $where['isdel'] = 0;
        $where['customerid'] = $data['customerid'];
        $data['audit'] = array(1 => '已完成', 2 => '处理中', 3 => '未处理');
        $data['list'] = $this->data_model->get_order_list($where . ' group by b.oid,a.id order by id desc');
        $this->load->view('common/choose_order', $data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */