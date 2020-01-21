<?php

class DaftarKosan_model extends CI_Model
{
  public function frGetDataKosan($param)
  {
    $query = "SELECT `ks`.* , `km`.* FROM `kosan` `ks` JOIN `tipe_kamar` `km` ON `ks`.`id_kosan` = `km`.`id_kosan` 
    WHERE `ks`.`kecamatan` =  '$param[kecamatan]' AND `km`.`jumlah_kamar_tersedia` >= '0' AND `km`.`harga` >= '$param[harga_terendah]' AND `km`.`harga` <= '$param[harga_tertinggi]' GROUP BY `ks`.`id_kosan`
    ";

    return $this->db->query($query)->result_array();
  }

  public function getFotoKosan($id)
  {
    return $this->db->get_where('photo', ['id_kosan' => $id])->row_array();
  }

  public function getDataKosan($id)
  {
    return $this->db->get_where('kosan', ['id_kosan' => $id])->row_array();
  }

  public function getGambarKosan($id)
  {
    return $this->db->get_where('photo', ['id_kosan' => $id])->result_array();
  }

  public function getGambarKamar($id)
  {
    return $this->db->get_where('photo_kamar', ['id_tipe' => $id])->result_array();
  }

  public function getDataKamar($id)
  {
    return $this->db->get_where('tipe_kamar', ['id_kosan' => $id])->result_array();
  }
}
