<?php

class Admin_model extends CI_Model
{
    public function getDataSpec($id)
    {
        return $this->db->get_where('admin', ['username' => $id])->row_object();
    }

    public function getDataAll($tabel)
    {
        return $this->db->get($tabel)->result();
    }

    public function getDataKosan()
    {
        $query = "SELECT `p`.`nama_pemilik` , `ks`.* FROM `kosan` `ks` JOIN `pemilik` `p` ON `ks`.`id_pemilik` = `p`.`id_pemilik` ";
        return $this->db->query($query)->result();
    }

    public function getDetail($id, $tabel)
    {
        if ($tabel == 'Pemilik') {
            return $this->db->get_where('pemilik', ['id_pemilik' => $id])->row_array();
        } else if ($tabel == 'User') {
            return $this->db->get_where('user', ['id_user' => $id])->row_array();
        } else if ($tabel == 'Kosan') {
            $query = "SELECT `ks`.* , `p`.`nama_pemilik` FROM `kosan` `ks` JOIN `pemilik` `p` ON `ks`.`id_pemilik` = `p`.`id_pemilik` WHERE `ks`.`id_kosan` = $id";
            return $this->db->query($query)->row_array();
        }
    }

    public function hapusData($id, $tabel)
    {
        if ($tabel == 'Pemilik') {
            $this->db->where('id_pemilik', $id);
            $this->db->delete('pemilik');
        } else if ($tabel == 'User') {
            $this->db->where('id_user', $id);
            $this->db->delete('user');
        } else if ($tabel == 'Kosan') {
            $this->db->where('id_kosan', $id);
            $this->db->delete('kosan');
        } else if ($tabel == 'Pesan') {
            $this->db->where('id', $id);
            $this->db->delete('pesan');
        }
    }

    public function getPesan()
    {
        $this->db->from('pesan');
        $this->db->order_by("waktu", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlah($tabel , $awalBulan, $akhirBulan)
    {
        $query = "SELECT count(waktu) as jumlah from $tabel where waktu >= $awalBulan AND waktu < $akhirBulan";
        return $this->db->query($query)->result();
    }
}
