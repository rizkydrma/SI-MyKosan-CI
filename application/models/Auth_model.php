<?php

class Auth_model extends CI_Model
{
    function getData($table, $param)
    {
        return $this->db->get_where($table, $param)->row();
    }

    function setData($table, $param)
    {
        $this->db->delete($table, ['email' => $param]);
    }
}
