<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Summary extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common_model->checkpurview(5);

    }

    public function index()
    {
        $data['service_1'] = $this->mysql_model->get_count('service', array('upddate' => date('Y-m-d')));
        $data['service_2'] = $this->mysql_model->get_count('service', array('upddate >=' => date_query(1), 'upddate <=' => date_query(2)));
        $data['service_3'] = $this->mysql_model->get_count('service', array('upddate >=' => date_query(6), 'upddate <=' => date_query(7)));
        $data['service_4'] = $data['service_1'] + $data['service_2'] + $data['service_3'];

        $data['order_1'] = $this->mysql_model->get_count('order', array('upddate' => date('Y-m-d')));
        $data['order_2'] = $this->mysql_model->get_count('order', array('upddate >=' => date_query(1), 'upddate <=' => date_query(2)));
        $data['order_3'] = $this->mysql_model->get_count('order', array('upddate >=' => date_query(6), 'upddate <=' => date_query(7)));
        $data['order_4'] = $data['order_1'] + $data['order_2'] + $data['order_3'];

        $data['single_1'] = $this->mysql_model->get_count('single', array('upddate' => date('Y-m-d')));
        $data['single_2'] = $this->mysql_model->get_count('single', array('upddate >=' => date_query(1), 'upddate <=' => date_query(2)));
        $data['single_3'] = $this->mysql_model->get_count('single', array('upddate >=' => date_query(6), 'upddate <=' => date_query(7)));
        $data['single_4'] = $data['single_1'] + $data['single_2'] + $data['single_3'];

        $data['linkman_1'] = $this->mysql_model->get_count('linkman', array('upddate' => date('Y-m-d')));
        $data['linkman_2'] = $this->mysql_model->get_count('linkman', array('upddate >=' => date_query(1), 'upddate <=' => date_query(2)));
        $data['linkman_3'] = $this->mysql_model->get_count('linkman', array('upddate >=' => date_query(6), 'upddate <=' => date_query(7)));
        $data['linkman_4'] = $data['linkman_1'] + $data['linkman_2'] + $data['linkman_3'];

        $data['contract_1'] = $this->mysql_model->get_count('contract', array('upddate >=' => date('Y-m-d')));
        $data['contract_2'] = $this->mysql_model->get_count('contract', array('upddate >=' => date_query(1), 'upddate <=' => date_query(2)));
        $data['contract_3'] = $this->mysql_model->get_count('contract', array('upddate >=' => date_query(6), 'upddate <=' => date_query(7)));
        $data['contract_4'] = $data['contract_1'] + $data['contract_2'] + $data['contract_3'];

        $data['customer_1'] = $this->mysql_model->get_count('customer', array('upddate' => date('Y-m-d')));
        $data['customer_2'] = $this->mysql_model->get_count('customer', array('upddate >=' => date_query(1), 'upddate <=' => date_query(2)));
        $data['customer_3'] = $this->mysql_model->get_count('customer', array('upddate >=' => date_query(6), 'upddate <=' => date_query(7)));
        $data['customer_4'] = $data['customer_1'] + $data['customer_2'] + $data['customer_3'];
        $this->load->view('summary/index', $data);
    }

    public function gendan()
    {
        $where1['a.isdel'] = 0;
        $data['list1'] = array_column($this->data_model->get_summary_gendan($where1), 'num');
        $data['username'] = array_column($this->data_model->get_summary_gendan($where1), 'username');
        $where2['a.isdel'] = 0;
        $where2['a.adddate >='] = date_query(1);
        $where2['a.adddate <='] = date_query(2);
        $data['list2'] = array_column($this->data_model->get_summary_gendan($where2), 'num');
        $where3['a.isdel'] = 0;
        $where3['a.adddate <='] = date_query(5);
        $where3['a.adddate <='] = date_query(6);
        $data['list3'] = array_column($this->data_model->get_summary_gendan($where3), 'num');
        $this->load->view('summary/gendan', $data);
    }

    public function order()
    {
        $where1['a.isdel'] = 0;
        $data['list1'] = array_column($this->data_model->get_summary_order($where1), 'num');
        $where2['a.isdel'] = 0;
        $where2['a.adddate >='] = date_query(1);
        $where2['a.adddate <='] = date_query(2);
        $data['list2'] = array_column($this->data_model->get_summary_order($where2), 'num');
        $where3['a.isdel'] = 0;
        $where3['a.adddate >='] = date_query(5);
        $where3['a.adddate <='] = date_query(6);
        $data['list3'] = array_column($this->data_model->get_summary_order($where3), 'num');
        $data['username'] = array_column($this->data_model->get_summary_order($where1), 'username');
        $this->load->view('summary/order', $data);
    }

    public function hetong()
    {
        $where1['a.isdel'] = 0;
        $data['list1'] = array_column($this->data_model->get_summary_hetong($where1), 'num');
        $where2['a.isdel'] = 0;
        $where2['a.adddate >='] = date_query(1);
        $where2['a.adddate <='] = date_query(2);
        $data['list2'] = array_column($this->data_model->get_summary_hetong($where2), 'num');
        $where3['a.isdel'] = 0;
        $where3['a.adddate >='] = date_query(5);
        $where3['a.adddate <='] = date_query(6);
        $data['list3'] = array_column($this->data_model->get_summary_hetong($where3), 'num');
        $data['username'] = array_column($this->data_model->get_summary_hetong($where1), 'username');
        $this->load->view('summary/hetong', $data);
    }

    public function shouhou()
    {
        $where1['a.isdel'] = 0;
        $data['list1'] = array_column($this->data_model->get_summary_shouhou($where1), 'num');
        $where2['a.isdel'] = 0;
        $where2['a.adddate >='] = date_query(1);
        $where2['a.adddate <='] = date_query(2);
        $data['list2'] = array_column($this->data_model->get_summary_shouhou($where2), 'num');
        $where3['a.isdel'] = 0;
        $where3['a.adddate >='] = date_query(5);
        $where3['a.adddate <='] = date_query(6);
        $data['list3'] = array_column($this->data_model->get_summary_shouhou($where3), 'num');
        $data['username'] = array_column($data['list1'], 'username');
        $this->load->view('summary/shouhou', $data);
    }


    public function yeardata()
    {
        $service = array_column($this->data_model->get_yeardata_service(), 'num', 'm');
        $hetong = array_column($this->data_model->get_yeardata_hetong(), 'num', 'm');
        $order = array_column($this->data_model->get_yeardata_order(), 'num', 'm');
        $customer = array_column($this->data_model->get_yeardata_customer(), 'num', 'm');
        $single = array_column($this->data_model->get_yeardata_single(), 'num', 'm');
        for ($i = 1; $i <= 12; $i++) {
            $data['service'][] = isset($service[$i]) ? $service[$i] : 0;
            $data['hetong'][] = isset($hetong[$i]) ? $hetong[$i] : 0;
            $data['order'][] = isset($order[$i]) ? $order[$i] : 0;
            $data['customer'][] = isset($customer[$i]) ? $customer[$i] : 0;
            $data['single'][] = isset($single[$i]) ? $single[$i] : 0;
        }
        $this->load->view('summary/yeardata', $data);
    }


    public function searchdata()
    {
        $data['TimeBegin'] = str_htmlencode($this->input->get_post('TimeBegin', TRUE));
        $data['TimeEnd'] = str_htmlencode($this->input->get_post('TimeEnd', TRUE));
        $where['a.adddate >='] = $data['TimeBegin'];
        $where['a.adddate <='] = $data['TimeEnd'];
        $where['group'] = 'a.uid';
        $config['totalRows'] = $this->data_model->get_summary_searchdata($where, 3);
        $config['parameter'] = http_build_query(array_filter($data));
        $this->load->library('lib_page', $config);
        $where['limit1'] = $this->lib_page->firstRow;
        $where['limit2'] = $this->lib_page->listRows;
        $data['list'] = $this->data_model->get_summary_searchdata($where);
        $this->load->view('summary/searchdata', $data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */