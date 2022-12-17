<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //用户列表
    public function get_user_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            a.*,b.name as groupname,c.name as role
				from ' . $this->db->dbprefix('user') . ' as a 
					left join ' . $this->db->dbprefix('set_group') . ' as b 
					on a.groupid=b.id
					left join ' . $this->db->dbprefix('role') . ' as c 
					on a.roleid=c.id
				where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }

    //IM列表
    public function get_userchatlog_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            a.id,a.touid,a.uid,a.sendtime,a.hasview,a.content ,a.type,b.name,b.avatar,b.sign
				from ' . $this->db->dbprefix('userchatlog') . ' as a 
					left join ' . $this->db->dbprefix('user') . ' as b 
					on a.uid=b.uid 
				where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }

    //订单管理相关--------------------------------------------------------------------------------
    //订单列表
    public function get_order_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select * from ' . $this->db->dbprefix('order') . ' where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }

    //合同列表
    public function get_contract_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select  *  from ' . $this->db->dbprefix('contract') . ' where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }


    //任务管理相关--------------------------------------------------------------------------------
    //客户列表
    public function get_customer_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select * from ' . $this->db->dbprefix('customer') . ' where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }



    //跟单管理相关--------------------------------------------------------------------------------
    //跟单列表
    public function get_single_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select * from ' . $this->db->dbprefix('single') . ' where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }


    //文件管理相关--------------------------------------------------------------------------------
    //文件列表
    public function get_files_list($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select * from ' . $this->db->dbprefix('files') . ' where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }

    //统计跟单
    public function get_summary_gendan($where = '(1=1)', $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            b.username,
					count(id) as num
				from ' . $this->db->dbprefix('single') . ' as a 
				   left join ' . $this->db->dbprefix('user') . ' as b					
				   on a.uid=b.uid
				where ' . $where . ' order by a.uid';
        return $this->mysql_model->query($sql, $type);
    }

    //统计订单
    public function get_summary_order($where = '(1=1)', $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            b.username,
					count(id) as num
				from ' . $this->db->dbprefix('order') . ' as a 
				   left join ' . $this->db->dbprefix('user') . ' as b					
				   on a.uid=b.uid
				where ' . $where . ' order by a.uid';
        return $this->mysql_model->query($sql, $type);
    }

    //统计合同
    public function get_summary_hetong($where = '(1=1)', $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            b.username,
					count(id) as num
				from ' . $this->db->dbprefix('contract') . ' as a 
				   left join ' . $this->db->dbprefix('user') . ' as b					
				   on a.uid=b.uid
				where ' . $where . ' order by a.uid';

        return $this->mysql_model->query($sql, $type);
    }

    //统计售后
    public function get_summary_shouhou($where = '(1=1)', $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            b.username,
					count(id) as num
				from ' . $this->db->dbprefix('service') . ' as a 
				   left join ' . $this->db->dbprefix('user') . ' as b					
				   on a.uid=b.uid
				where ' . $where . ' order by a.uid';
        return $this->mysql_model->query($sql, $type);
    }


    //统计年度(售后)
    public function get_yeardata_service($where = '(1=1)', $type = 2)
    {
        $sql = ' select month(adddate) as m,count(id) as num from ' . $this->db->dbprefix('service') . ' where year(adddate)="' . date('Y') . '" group by month(adddate)';
        return $this->mysql_model->query($sql, $type);
    }

    //统计年度(合同)
    public function get_yeardata_hetong($where = '(1=1)', $type = 2)
    {
        $sql = ' select month(adddate) as m,count(id) as num from ' . $this->db->dbprefix('contract') . ' where year(adddate)="' . date('Y') . '" group by month(adddate)';
        return $this->mysql_model->query($sql, $type);
    }

    //统计年度(订单)
    public function get_yeardata_order($where = '(1=1)', $type = 2)
    {
        $sql = ' select month(adddate) as m,count(id) as num from ' . $this->db->dbprefix('order') . ' where year(adddate)="' . date('Y') . '" group by month(adddate)';
        return $this->mysql_model->query($sql, $type);
    }

    //统计年度(客户)
    public function get_yeardata_customer($where = '(1=1)', $type = 2)
    {
        $sql = ' select month(adddate) as m,count(id) as num from ' . $this->db->dbprefix('customer') . ' where year(adddate)="' . date('Y') . '" group by month(adddate)';
        return $this->mysql_model->query($sql, $type);
    }

    //统计年度(跟单)
    public function get_yeardata_single($where = '(1=1)', $type = 2)
    {
        $sql = ' select month(adddate) as m,count(id) as num from ' . $this->db->dbprefix('single') . ' where year(adddate)="' . date('Y') . '" group by month(adddate)';
        return $this->mysql_model->query($sql, $type);
    }


    //统计详细数据
    public function get_summary_searchdata($where, $type = 2)
    {
        $where = $this->mysql_model->setwhere($where);
        $sql = 'select 
		            a.uid,
		            b.username,
					sum(case when a.module="客户列表" then num else 0 end ) as customer_num,
					sum(case when a.module="跟单记录" then num else 0 end ) as single_num,
					sum(case when a.module="合同记录" then num else 0 end ) as contract_num,
					sum(case when a.module="订单记录" then num else 0 end ) as order_num,
					sum(case when a.module="售后记录" then num else 0 end ) as service_num,
					sum(case when a.action="新增" then num else 0 end ) as add_num,
					sum(case when a.action="修改" then num else 0 end ) as edit_num,
					sum(case when a.action="删除" then num else 0 end ) as del_num
				from ' . $this->db->dbprefix('userlog') . ' as a 
					left join ' . $this->db->dbprefix('user') . ' as b 
					on a.uid=b.uid 			
				where ' . $where;
        return $this->mysql_model->query($sql, $type);
    }

}