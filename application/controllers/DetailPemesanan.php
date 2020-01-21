<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailPemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        $this->load->model('DaftarKosan_model', 'daftarKosan');
        $this->load->model('Order_model', 'order');
    }

    public function index()
    {
        $data['title'] = 'MyKosan - Detail Pemesanan';
        $data['page'] = 'frontend/kosan/detail-pemesanan';



        $this->bayar_sebelum = $this->input->post('bayar_sebelum');
        $this->nama_kosan = $this->input->post('nama_kosan');
        $this->nama_tipe = $this->input->post('nama_tipe');
        $this->harga = $this->input->post('harga');
        $this->no_invoice = $this->input->post('no_invoice');
        $this->nama_pemesanan = $this->input->post('nama_pemesanan');
        $this->tgl_sewa = $this->input->post('tgl_sewa');
        $this->lama_sewa = $this->input->post('lama_sewa');
        $this->tgl_keluar = $this->input->post('tgl_keluar');
        $this->total_harga = $this->input->post('total_harga');
        $this->loadview->loadFront($data);
    }
}
