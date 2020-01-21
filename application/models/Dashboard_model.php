<?php

class Dashboard_model extends CI_Model
{
    public function getData()
    {
        $id=$this->session->userdata('id');
        $query = "SELECT `u`.* , `k`.* , `t`.* FROM  `transaksi` `t` JOIN `tipe_kamar` `k` ON `t`.`id_tipe` = `k`.`id_tipe` 
        JOIN `user` `u` ON `u`.`id_user` = `t`.`id_user` WHERE `t`.`id_pemilik` = $id ORDER BY `t`.`id_transaksi` DESC  LIMIT 4 
        ";

        return $this->db->query($query)->result();
    }
}
