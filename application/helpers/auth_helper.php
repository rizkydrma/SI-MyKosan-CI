<?php

function blocked()
{
    $ci = get_instance();

    if (!$ci->session->userdata('pemilik')) {
        redirect('auth/blocked');
    }
}

function hapus_session()
{
    $ci = get_instance();

    $ci->session->sess_destroy();
    session_destroy();
    $ci->session->unset_userdata('id');
    $ci->session->unset_userdata('nama');
    $ci->session->unset_userdata('email');
    $ci->session->unset_userdata('pemilik');
    $ci->session->unset_userdata('user');
}

function delAutomation()
{
    $ci = get_instance();

    $query = "DELETE FROM transaksi WHERE DATEDIFF(CURDATE(), tgl_batas_pembayaran) > 0 AND status = 'Menunggu Pembayaran'";
    $ci->db->query($query);

}

// function statusCustomer()
// {
//     $ci = get_instance();
//     $query = "UPDATE customer SET status = 'Tidak Aktif' WHERE DATEDIFF(CURDATE(), (SELECT tgl_keluar FROM transaksi )) > 0";
//     $ci->db->query($query);
// }

function block()
{
    $ci = get_instance();

    if (!$ci->session->userdata('admin')) {
        redirect('auth/blocked');
    }
}
