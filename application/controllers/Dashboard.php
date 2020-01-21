<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('loadview');
    blocked();
    delAutomation();
    // statusCustomer();
    $this->load->model('Dashboard_model', 'dashboard');
    $this->load->model('Transaksi_model', 'transaksi');
  }


  public function index()
  {
    $data['title'] = 'MyKosan - Dashboard';
    $data['page'] = 'backend/index';
    $data['transaksi'] = $this->dashboard->getData();
    $data['notif'] = $this->transaksi->getNotifikasi();
    $this->loadview->loadDashboard($data);
  }

  public function dibayar()
  {
    $id_transaksi = $this->uri->segment(3);
    $id_user = $this->uri->segment(4);
    $id_kosan = $this->uri->segment(5);
    $id_tipe = $this->uri->segment(6);
    $this->db->set('status', 'Telah diBayar');
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update('transaksi');

    $data = [
      'id_user' => $id_user,
      'id_transaksi' => $id_transaksi,
      'id_pemilik' => $this->session->userdata('id'),
      'id_kosan' => $id_kosan,
      'id_tipe' => $id_tipe,
      'status' => 'Aktif'
    ];

    $this->db->insert('customer', $data);
    $this->session->set_flashdata('flash', 'Berhasil, Transaksi telah dibayar');
    redirect('dashboard');
  }
  public function menunggu()
  {
    $id_transaksi = $this->uri->segment(3);
    $id_user = $this->uri->segment(4);
    $id_kosan = $this->uri->segment(5);
    $id_tipe = $this->uri->segment(6);
    $this->db->set('status', 'Menunggu Pembayaran');
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update('transaksi');

    $kondisi = [
      'id_pemilik' => $this->session->userdata('id'),
      'id_user' => $id_user,
      'id_transaksi' => $id_transaksi
    ];
    $this->db->where($kondisi);
    $this->db->delete('customer');
    $this->session->set_flashdata('flash', 'Berhasil, Transaksi belum dibayar');
    redirect('dashboard');
  }

  function bulan()
  {
    $nowYear = date('Y', time());
    $bulan = [
      $jan = strtotime($nowYear . '-Jan-01'),
      $feb = strtotime($nowYear . '-Feb-01'),
      $mar = strtotime($nowYear . '-Mar-01'),
      $apr = strtotime($nowYear . '-Apr-01'),
      $may = strtotime($nowYear . '-May-01'),
      $jun = strtotime($nowYear . '-Jun-01'),
      $jul = strtotime($nowYear . '-Jul-01'),
      $aug = strtotime($nowYear . '-Aug-01'),
      $sep = strtotime($nowYear . '-Sep-01'),
      $oct = strtotime($nowYear . '-Oct-01'),
      $nov = strtotime($nowYear . '-Nov-01'),
      $dec = strtotime($nowYear . '-Dec-01'),
      $newJan = strtotime($nowYear + 1 . '-Jan-01')
    ];
    return $bulan;
  }

  public function chartPendapatan()
  {
    $bulan = $this->bulan();
    $transaksi = [];
    for($i = 0; $i < count($bulan)-1; $i++){
      $transaksi[$i] = $this->transaksi->chartPendapatan($bulan[$i],$bulan[$i+1]);
    }
    echo json_encode($transaksi);
  }
}
