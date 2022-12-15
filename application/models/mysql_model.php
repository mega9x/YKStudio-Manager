<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mysql_model extends CI_Model { 

    public function __construct(){
  		parent::__construct();
	}
	
	public function query($sql,$type=1) {
		$query = $this->db->query($sql);
		switch ($type) {
			case 1:$result = $query->row_array();break;  
			case 2:$result = $query->result_array();break;  	
			case 3:$result = $query->num_rows();break; 	
		}
		return $result;
	}
 
	public function get_rows($table,$where,$select='') {
	    $result = $this->get_results($table,$where,1);
		if ($select) {
		    return isset($result[$select]) ? $result[$select] : '';
		} else {
		    return $result;		
		}		
	}
 
	public function get_count($table,$where='') {
	    return $this->get_results($table,$where,3);			
	}
	
	public function insert($table,$data){ 
		$table  = $this->db->dbprefix($table);
		if (isset($data[0]) && is_array($data[0])) {
			$this->db->insert_batch($table, $data);
		} else {
			$this->db->insert($table, $data);    	
		}
		$this->db->cache_delete_all();
		return $this->db->insert_id();  
	}
	
	public function update($table,$data,$where='') {
		$table  = $this->db->dbprefix($table);
		if (isset($data[0]) && is_array($data[0])) {
			$this->db->update_batch($table,$data,$where);
			if ($this->db->affected_rows()) $this->db->cache_delete_all();return true; 
			return false; 
		} 
		if (is_array($data)) {
		    $this->db->where($this->setwhere($where), NULL, FALSE);
		    foreach ($data as $arr=>$row) {
			    if (strpos($arr, 'set|') !== false) { 
					$name = str_replace('set|', '', $arr); 
					$this->db->set($name, $row, FALSE);
				}
			}
			if (isset($name)) {
			    $result = $this->db->update($table); 
			} else {
			    $result = $this->db->update($table, $data);  
			}
		} else {
		    $result = $this->db->query('UPDATE '.$table.' SET '.$data .($where ? ' WHERE '.$where : ''));	
		}
		$this->db->cache_delete_all();
		return $result; 
    }
 

	public function delete($table,$where='') { 
		$table = $this->db->dbprefix($table);
		$this->db->where($this->setwhere($where), NULL, FALSE);
		if ($where)	{
			$this->db->delete($table);
		} else {	
			$this->db->empty_table($table); 	
		}
		if ($this->db->affected_rows()) {
		    $this->db->cache_delete_all();
			return  true; 
		} 
		return  false; 
	}
	
	
	public function get_results($table,$where='',$type=2) {
	    $this->db->from($this->db->dbprefix($table));
	    if (isset($where['select']) && is_array($where['select'])) {
		    foreach ($where['select'] as $arr=>$row) {
				if (strpos($arr, 'max|') !== false) { 
					$name = str_replace('max|', '', $arr); 
					$this->db->select_max($name, $row); 
				} elseif (strpos($arr, 'min|') !== false) { 
					$name  = str_replace('min|', '', $arr); 
					$this->db->select_min($name, $row); 
				} elseif (strpos($arr, 'avg|') !== false) { 
					$name = str_replace('avg|', '', $arr); 
					$this->db->select_avg($name, $row); 
				} elseif (strpos($arr, 'sum|') !== false) { 
					$name = str_replace('sum|', '',$arr); 
					$this->db->select_sum($name, $row); 
				} else {
				    $this->db->select($row,false);	
				}
			}
			unset($where['select']);
		}
		if (isset($where['select']) && !is_array($where['select'])) {
		    $this->db->select($where['select']);
			unset($where['select']);
		}
		if (isset($where['join'])) {
		    foreach ($where['join'] as $arr=>$row) {
				if (strpos($arr, 'left|') !== false) { 
					$name = str_replace('left|', '', $arr); 
					$this->db->join($name, $row, 'left');
				} elseif (strpos($arr, 'right|') !== false) { 
					$name  = str_replace('right|', '', $arr); 
					$this->db->join($name, $row, 'right');
				} elseif (strpos($arr, 'outer|') !== false) { 
					$name = str_replace('outer|', '', $arr); 
					$this->db->join($name, $row, 'outer');
				} elseif (strpos($arr, 'inner|') !== false) { 
					$name = str_replace('inner|', '',$arr); 
					$this->db->join($name, $row, 'inner');	
				} else {
				    $this->db->join($arr, $row, 'left');	
				}
			}
			unset($where['join']);
		}
		if (is_array($where)) {
		    $this->db->where($this->setwhere($where), NULL, FALSE);
		} else {
		    if ($where) $this->db->where($where, NULL, FALSE);
		}
		$query = $this->db->get();
		switch ($type) {
			case 1:$result = $query->row_array();break;  
			case 2:$result = $query->result_array();break;  	
			case 3:$result = $query->num_rows();break; 	
		}
		return $result;
	}
 
	public function setwhere($search) { 
		$where = ' (1=1) '; 
		$order = $group = $limit1 = $limit2 = $having = '';
		if (!is_array($search)) return $where; 
		if (isset($search['limit2'])){$limit2 = ','.$search['limit2'];unset($search['limit2']);}
		if (isset($search['limit1'])){$limit1 = $search['limit1'];$limit1 = ' limit '.$limit1.$limit2;unset($search['limit1']);}
		if (isset($search['group'])){$group = ' group by '.$search['group'];unset($search['group']);}
		if (isset($search['order'])){$order = ' order by '.$search['order'];unset($search['order']);}
		if (isset($search['having'])){$having = $search['having'] ? ' having '.$search['having'] :'';unset($search['having']);}
		foreach ($search as $key=>$val) { 
		    if (!is_array($val) && strlen($val)==0) continue;
			$f = strpos($key, ' ') !== false ? ' ': ' = ';
			if (strpos($key, 'or|') !== false) {
			    $t   = ' or ';
				$key = str_replace('or|', '',$key);
			} else {
			    $t   = ' and ';
			}
			if (strpos($key, 'in|') !== false) {	
				$key = str_replace('in|', '',$key);
				$val   = is_array($val) ? "('" . implode("','", $val) . "')" : '('.$val.')'; 
				$where .= $t.$key.' in '.$val; 	
			} elseif (strpos($key, 'like|') !== false) {	
				$key = str_replace('like|', '',$key);
				$where .= $t.$key.' like '.$this->db->escape('%'.$val.'%');  
			} elseif (strpos($key, 'find|') !== false) {	
				$key = str_replace('find|', '',$key);
				$where .= $t.' find_in_set('.$val.','.$key.')'; 
			} elseif (strpos($key, '#)') !== false) {	
				$where .= ')';
			} else {
				$where .= $t.$key.$f.$this->db->escape($val); 
			}
		} 
		return $where.$group.$having.$order.$limit1; 
	} 
  
}