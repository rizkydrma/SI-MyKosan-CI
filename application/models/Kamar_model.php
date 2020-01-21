<?php

class Kamar_model extends CI_Model
{
    public function getData($tabel)
    {
        return $this->db->get($tabel)->result();
    }
    public function getDataKosan($id)
    {
        return $this->db->get_where('kosan',['id_pemilik' => $id])->result();
    }

    public function getDataWhere($id)
    {
        return $this->db->get_where('kosan', ['id_kosan' => $id])->result();
    }

    public function getDataKamar($id)
    {
        $query = "SELECT `km`.* , `ks`.* FROM `tipe_kamar` `km` JOIN `kosan` `ks` ON `km`.`id_kosan` = `ks`.`id_kosan` WHERE `ks`.`id_kosan` = $id GROUP BY `ks`.`id_kosan`";

        return $this->db->query($query)->row_object();
    }

    public function getJumlah($id)
    {
        $query = "SELECT COUNT(id_tipe) AS jumlahTipeKamar , SUM(jumlah_kamar) AS jumlahTotalKamar FROM tipe_kamar WHERE id_kosan = $id";

        return $this->db->query($query)->row_object();
    }

    public function getDataSpecify($id)
    {
        $query = "SELECT `km`.* , `ks`.* FROM `tipe_kamar` `km` JOIN `kosan` `ks` ON `km`.`id_kosan` = `ks`.`id_kosan` where `km`.`id_kosan` = $id ";
        return $this->db->query($query)->result();
    }

    public function getDetail($id)
    {
        $data['kamar'] = $this->db->get_where('tipe_kamar', ['id_tipe' => $id])->row_array();

        $data['kosan'] = $this->db->get_where('kosan', ['id_kosan' => $data['kamar']['id_kosan']])->row_array();

        return $data;
    }

    public function hapusData($id)
    {
        $this->db->where('id_tipe', $id);
        $this->db->delete('tipe_kamar');

        $query = "SELECT foto FROM photo_kamar WHERE id_tipe = $id";
        $photo = $this->db->query($query)->result_array();
        
        for($i = 0; $i< count($photo); $i++ ){
            $target = FCPATH .  'assets\images\tipe_kamar\\' . $photo[$i]['foto'];
            if(file_exists($target)){
                unlink($target);
            }
        }
        $this->db->where('id_tipe', $id);
        $this->db->delete('photo_kamar');

    }

    public function getFoto($id)
    {
        $query = "SELECT `ph`.`foto` FROM `photo_kamar` `ph` WHERE `ph`.`id_tipe` = $id ";
        return $this->db->query($query)->result_array();
    }
}
