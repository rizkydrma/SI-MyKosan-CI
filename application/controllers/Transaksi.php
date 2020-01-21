<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        blocked();
        $this->load->model('Transaksi_model', 'transaksi');
        $this->transaksi->ubahNotifikasi();
    }

    public function index()
    {
        $data['title'] = "MyKosan - Transaksi";
        $data['page'] = "backend/transaksi";
        $data['notif'] = $this->transaksi->getNotifikasi();
        $data['transaksi'] = $this->transaksi->getData($this->session->userdata('id'));
        $this->loadview->loadDashboard($data);
    }

    public function detail()
    {
        echo json_encode($this->transaksi->getDataDetail($this->input->post('id')));
    }

    public function dibayar()
    {
        $this->db->set('status', 'Telah diBayar');
        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi');
        $this->session->set_flashdata('flash', 'Transaksi telah dibayar');
        redirect('dashboard');
    }

    public function menunggu()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $this->db->set('status', 'Menunggu Pembayaran');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        $kondisi = [
            'id_pemilik' => $this->session->userdata('id'),
            'id_user' => $this->input->post('id_user'),
            'id_transaksi' => $id_transaksi
        ];
        $this->db->where($kondisi);
        $this->db->delete('customer');
        $this->session->set_flashdata('flash', 'Berhasil, Transaksi belum dibayar');
        redirect('dashboard');
    }

    public function hapusData()
    {
        $transaksi = $this->uri->segment(3);
        $tipe = $this->uri->segment(4);
        $jumlah_kamar = $this->uri->segment(5);

        $this->transaksi->hapusData($transaksi,$tipe,$jumlah_kamar);
        $this->session->set_flashdata('flash', 'Data Berhasil dihapus!');
        redirect('transaksi');
    }
}
