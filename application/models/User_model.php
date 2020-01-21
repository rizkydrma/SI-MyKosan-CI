<?php

class User_model extends CI_Model
{
    public function getData($id)
    {
        return $this->db->get_where('pemilik', ['id_pemilik' => $id])->row_object();
    }

    public function getDataUser($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_object();
    }

    public function getDataRiwayat($id)
    {
        $query = "SELECT `u`.`nama_user`, `r`.* , `ks`.`nama_kosan` , `km`.`nama_tipe` FROM `riwayat_pembelian` `r` JOIN `user` `u` ON `r`.`id_user` = `u`.`id_user` JOIN `kosan` `ks` ON `r`.`id_kosan` = `ks`.`id_kosan` JOIN `tipe_kamar` `km` ON `r`.`id_tipe` = `km`.`id_tipe` WHERE `r`.`id_user` = $id ";
        return $this->db->query($query)->result();
    }
}
