<?php

class Customer_model extends CI_Model
{
    public function getData($id)
    {
        $query = "SELECT `u`.`nama_user`, `u`.`email`, `u`.`no_telp` , `t`.`no_invoice` ,`t`.`tgl_masuk` ,`t`.`tgl_keluar` , `ks`.`nama_kosan` , `km`.`nama_tipe` ,`c`.* FROM `customer` `c` JOIN `user` `u` ON `c`.`id_user` = `u`.`id_user` JOIN `transaksi` `t` ON `c`.`id_transaksi` = `t`.`id_transaksi` JOIN `kosan` `ks` ON `c`.`id_kosan` = `ks`.`id_kosan` JOIN `tipe_kamar` `km` ON `c`.`id_tipe` = `km`.`id_tipe` WHERE `c`.`id_pemilik` = $id ";

        return $this->db->query($query)->result();
    }
    public function getDetailData($id)
    {
        $query = "SELECT `u`.`nama_user`, `u`.`email`, `u`.`no_telp` , `t`.`no_invoice` ,`t`.`tgl_masuk` ,`t`.`tgl_keluar`, `ks`.`nama_kosan` , `km`.`nama_tipe` FROM `customer` `c` JOIN `user` `u` ON `c`.`id_user` = `u`.`id_user` JOIN `transaksi` `t` ON `c`.`id_transaksi` = `t`.`id_transaksi` JOIN `kosan` `ks` ON `c`.`id_kosan` = `ks`.`id_kosan` JOIN `tipe_kamar` `km` ON `c`.`id_tipe` = `km`.`id_tipe` WHERE `c`.`id_customer` = $id ";
        return $this->db->query($query)->row_array();
    }
    public function hapusData($id)
    {
        $this->db->where('id_customer',$id);
        $this->db->delete('customer');
    }
}
