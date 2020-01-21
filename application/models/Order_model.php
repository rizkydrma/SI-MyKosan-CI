<?php

class Order_model extends CI_Model
{
    public function getDataOrder($id)
    {
        $query = "SELECT `km`.* , `ks`.* FROM `tipe_kamar` `km` JOIN `kosan` `ks` ON `km`.`id_kosan` = `ks`.`id_kosan` WHERE `km`.`id_tipe` = $id";

        return $this->db->query($query)->row_object();
    }
}
