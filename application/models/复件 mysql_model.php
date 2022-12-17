<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mysql_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_rows($table, $where, $select = '')
    {
        $result = $this->get_results($table, $where, 1);
        if ($select) {
            return isset($result[$select]) ? $result[$select] : '';
        } else {
            return $result;
        }
    }

    public function get_results($table, $where = '', $type = 2)
    {
        $this->db->from($this->db->dbprefix($table));
        if (isset($where['select']) && is_array($where['select'])) {
            foreach ($where['select'] as $arr => $row) {
                if (strpos($arr, 'max|') !== false) {
                    $name = str_replace('max|', '', $arr);
                    $this->db->select_max($name, $row);
                } elseif (strpos($arr, 'min|') !== false) {
                    $name = str_replace('min|', '', $arr);
                    $this->db->select_min($name, $row);
                } elseif (strpos($arr, 'avg|') !== false) {
                    $name = str_replace('avg|', '', $arr);
                    $this->db->select_avg($name, $row);
                } elseif (strpos($arr, 'sum|') !== false) {
                    $name = str_replace('sum|', '', $arr);
                    $this->db->select_sum($name, $row);
                } else {
                    $this->db->select($row, false);
                }
            }
            unset($where['select']);
        }
        if (isset($where['select']) && !is_array($where['select'])) {
            $this->db->select($where['select']);
            unset($where['select']);
        }
        if (isset($where['join'])) {
            foreach ($where['join'] as $arr => $row) {
                if (strpos($arr, 'left|') !== false) {
                    $name = str_replace('left|', '', $arr);
                    $this->db->join($name, $row, 'left');
                } elseif (strpos($arr, 'right|') !== false) {
                    $name = str_replace('right|', '', $arr);
                    $this->db->join($name, $row, 'right');
                } elseif (strpos($arr, 'outer|') !== false) {
                    $name = str_replace('outer|', '', $arr);
                    $this->db->join($name, $row, 'outer');
                } elseif (strpos($arr, 'inner|') !== false) {
                    $name = str_replace('inner|', '', $arr);
                    $this->db->join($name, $row, 'inner');
                } else {
                    $this->db->join($arr, $row, 'left');
                }
            }
            unset($where['join']);
        }
        if (isset($where['order'])) {
            $this->db->order_by($where['order']);
            unset($where['order']);
        }
        if (isset($where['group'])) {
            $this->db->group_by($where['group']);
            unset($where['group']);
        }
        if (isset($where['limit2'])) {
            $this->db->limit($where['limit2'], $where['limit1']);
            unset($where['limit1'], $where['limit2']);
        }
        if (isset($where['having'])) {
            $this->db->having($where['having']);
            unset($where['having']);
        }

        if (is_array($where)) {
            $this->get_where($where);
        } else {
            if ($where) $this->db->where($where);
        }

        $this->setwhere($where);
        $query = $this->db->get();
        switch ($type) {
            case 1:
                $result = $query->row_array();
                break;
            case 2:
                $result = $query->result_array();
                break;
            case 3:
                $result = $query->num_rows();
                break;
        }
        return $result;
    }

    public function get_where($search)
    {
        $where = ' (1=1) ';
        $order = $group = $limit1 = $limit2 = $having = '';
        if (!is_array($search)) return $where;
        if (isset($search['limit2'])) {
            $limit2 = ',' . $search['limit2'];
            unset($search['limit2']);
        }
        if (isset($search['limit1'])) {
            $limit1 = $search['limit1'];
            $limit1 = ' limit ' . $limit1 . $limit2;
            unset($search['limit1']);
        }
        if (isset($search['group'])) {
            $group = ' group by ' . $search['group'];
            unset($search['group']);
        }
        if (isset($search['order'])) {
            $order = ' order by ' . $search['order'];
            unset($search['order']);
        }
        if (isset($search['having'])) {
            $having = $search['having'] ? ' having ' . $search['having'] : '';
            unset($search['having']);
        }
        foreach ($search as $key => $val) {
            if (!is_array($val) && strlen($val) == 0) continue;
            $f = strpos($key, ' ') !== false ? ' ' : ' = ';
            if (strpos($key, 'or|') !== false) {
                $t = ' or ';
                $key = str_replace('or|', '', $key);
            } else {
                $t = ' and ';
            }
            if (strpos($key, 'in|') !== false) {
                $key = str_replace('in|', '', $key);
                $val = is_array($val) ? "('" . implode("','", $val) . "')" : '(' . $val . ')';
                $where .= $t . $key . ' in ' . $val;
            } elseif (strpos($key, 'like|') !== false) {
                $key = str_replace('like|', '', $key);
                $where .= $t . $key . ' like ' . $this->db->escape('%' . $val . '%');
            } elseif (strpos($key, 'find|') !== false) {
                $key = str_replace('find|', '', $key);
                $where .= $t . ' find_in_set(' . $val . ',' . $key . ')';
            } elseif (strpos($key, '#)') !== false) {
                $where .= ')';
            } else {
                $where .= $t . $key . $f . $this->db->escape($val);
            }
        }
        return $where . $group . $having . $order . $limit1;
    }

    private function setwhere($where)
    {
        if (is_array($where)) {
            foreach ($where as $arr => $row) {
                if (!is_array($row)) if (strlen($row) < 1) continue;
                if (strpos($arr, 'or|') !== false) {
                    $name = str_replace('or|', '', $arr);
                    $this->db->or_where($name, $row);
                } elseif (strpos($arr, 'in|') !== false) {
                    $name = str_replace('in|', '', $arr);
                    $this->db->where_in($name, $row);
                } elseif (strpos($arr, 'like|') !== false) {
                    $name = str_replace('like|', '', $arr);
                    $this->db->like($name, $row);
                } elseif (strpos($arr, 'liker|') !== false) {
                    $name = str_replace('liker|', '', $arr);
                    $this->db->or_like($name, $row);
                } elseif (strpos($arr, 'find|') !== false) {
                    $name = str_replace('find|', '', $arr);
                    $this->db->where(1, '1 AND FIND_IN_SET(' . $row . ',' . $name . ')', FALSE);
                } elseif (strpos($arr, '*') !== false) {
                    $this->db->where($row, false);
                } else {
                    $this->db->where($arr, $row);
                }
            }
        } else {
            if ($where) $this->db->where($where);
        }
    }

    public function get_count($table, $where = '')
    {
        return $this->get_results($table, $where, 3);
    }

    public function insert($table, $data)
    {
        $table = $this->db->dbprefix($table);
        if (isset($data[0]) && is_array($data[0])) {
            $this->db->insert_batch($table, $data);
        } else {
            $this->db->insert($table, $data);
        }
        $this->db->cache_delete_all();
        return $this->db->insert_id();
    }

    public function update($table, $data, $where = '')
    {
        $table = $this->db->dbprefix($table);
        if (isset($data[0]) && is_array($data[0])) {
            $this->db->update_batch($table, $data, $where);
            if ($this->db->affected_rows()) $this->db->cache_delete_all();
            return true;
            return false;
        }
        if (is_array($data)) {
            $this->setwhere($where);
            foreach ($data as $arr => $row) {
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
            $result = $this->db->query('UPDATE ' . $table . ' SET ' . $data . ($where ? ' WHERE ' . $where : ''));
        }
        $this->db->cache_delete_all();
        return $result;
    }

    public function query($sql, $type = 1)
    {
        $query = $this->db->query($sql);
        switch ($type) {
            case 1:
                $result = $query->row_array();
                break;
            case 2:
                $result = $query->result_array();
                break;
            case 3:
                $result = $query->num_rows();
                break;
        }
        return $result;
    }

    public function delete($table, $where = '')
    {
        $table = $this->db->dbprefix($table);
        $this->setwhere($where);
        if ($where) {
            $this->db->delete($table);
        } else {
            $this->db->empty_table($table);
        }
        if ($this->db->affected_rows()) {
            $this->db->cache_delete_all();
            return true;
        }
        return false;
    }

}