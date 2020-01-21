<?php

class Kosan_model extends CI_Model
{
    public function getData($id)
    {
        $query = "SELECT `p`.`nama_pemilik` , `ks`.*  FROM `kosan` `ks` JOIN `pemilik` `p` ON `ks`.`id_pemilik` = `p`.`id_pemilik` WHERE `p`.`id_pemilik` = $id
        ";
        return $this->db->query($query)->result();
    }

    public function getFoto($id)
    {
        $query = "SELECT `ph`.`foto` FROM `photo` `ph` WHERE `ph`.`id_kosan` = $id GROUP BY `ph`.`foto` ";
        return $this->db->query($query)->result_array();
    }

    public function getDetail($id)
    {
        $query = "SELECT * FROM kosan WHERE id_kosan = $id";
        $data['kosan'] = $this->db->query($query)->result();

        $query = "SELECT * FROM photo WHERE id_kosan = $id";
        $data['foto'] = $this->db->query($query)->result();

        return $data;
    }

    public function hapusData($id)
    {
        $this->db->where('id_kosan', $id);
        $this->db->delete('kosan');

        $query = "SELECT foto FROM photo WHERE id_kosan = $id";
        $photo = $this->db->query($query)->result_array();

        for($i = 0; $i< count($photo); $i++ ){
            $target = FCPATH .  'assets\images\kosan\\' . $photo[$i]['foto'];
            
            if(file_exists($target)){
                unlink($target);
            }
        }

        $this->db->where('id_kosan', $id);
        $this->db->delete('photo');
    }
}
