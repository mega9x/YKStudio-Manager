<?php

class Excel_import_model extends CI_Model
{
    function select()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('customer');
        return $query;
    }

    function insert($data)
    {

        $this->db->insert_batch('customer', $data);
    }
}
