<?php

class Transaksi_model extends CI_Model
{
    public function getData($id)
    {
        $query = "SELECT `u`.`nama_user` , `km`.`nama_tipe` , `ks`.`nama_kosan` , `t`.* FROM `transaksi` `t` JOIN `user` `u` ON `t`.`id_user` = `u`.`id_user` JOIN `tipe_kamar` `km` ON `t`.`id_tipe` = `km`.`id_tipe` JOIN `kosan` `ks` ON `t`.`id_kosan` = `ks`.`id_kosan` WHERE `t`.`id_pemilik` = $id ";

        return $this->db->query($query)->result();
    }

    public function getDataDetail($id)
    {
        $query = "SELECT `u`.`nama_user` , `km`.`nama_tipe` , `ks`.`nama_kosan` , `t`.* FROM `transaksi` `t` JOIN `user` `u` ON `t`.`id_user` = `u`.`id_user` JOIN `tipe_kamar` `km` ON `t`.`id_tipe` = `km`.`id_tipe` JOIN `kosan` `ks` ON `t`.`id_kosan` = `ks`.`id_kosan` WHERE `t`.`id_transaksi` = $id ";

        return $this->db->query($query)->row();
    }

    public function ubahNotifikasi()
    {
        $this->db->set('read',1);
        $this->db->where('read',0);
        $this->db->update('transaksi');
    }
    public function getNotifikasi()
    {
        $this->db->select('count(*) as notif');
        $this->db->from('transaksi');
        $this->db->where('read',0);
        return $this->db->get()->row_object();
    }

    public function hapusData($transaksi,$tipe,$jumlah)
    {
        // $this->db->select('jumlah_kamar_tersedia');
        // $res = $this->db->get_where('tipe_kamar',[
        //     'id_tipe' => $tipe
        // ])->result_object();
        // $new_jumlah = (int) $res[0]->jumlah_kamar_tersedia + $jumlah;

        // $this->db->set('jumlah_kamar_tersedia', 'jumlah_kamar_tersedia' + $jumlah);
        // $this->db->where('id_tipe', $tipe);
        // $this->db->update('tipe_kamar');

        // $query = "UPDATE tipe_kamar SET jumlah_kamar_tersedia = jumlah_kamar_tersedia + $jumlah WHERE id_tipe = $tipe ";
        // $this->db->query($query);

        $this->db->delete('transaksi', [
            'id_transaksi' => $transaksi
        ]);
        
    }

    public function chartPendapatan( $awalBulan, $akhirBulan)
    {
        $query = "SELECT sum(total_harga) as jumlah from transaksi where tgl_transaksi >= $awalBulan AND tgl_transaksi < $akhirBulan AND status = 'Telah diBayar'";
        return $this->db->query($query)->result();
    }
}
