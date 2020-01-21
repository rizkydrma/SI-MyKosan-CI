<?php

class delOtomatis_model extends CI_Model
{
    public function delete()
    {
        $query = "DELETE FROM transaksi WHERE DATEDIFF(CURDATE(), tanggal) > 2";
        $this->db->query($query);
    }
}
