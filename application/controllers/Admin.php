<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('loadview');
    $this->load->model('admin_model', 'admin');
    $this->load->model('Kosan_model', 'kosan');
    
  }
  public function index()
  {
    $data['title'] = "Auth - Login Admin";
    $data['page'] = "backend/admin/login";
    

    $this->form_validation->set_rules('username', 'username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->loadview->ownerlogin($data);
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $admin = $this->admin->getDataSpec('admin',  ['username' => $username]);

      if (password_verify($password, $admin->password)) {
        $data = [
          'nama' => $admin->username,
          'admin' => 'admin'
        ];
        $this->session->set_userdata($data);
        $this->session->set_flashdata('flash', 'Berhasil Login');
        redirect('admin/dashboard');
      } else {
        $this->session->set_flashdata('flash', 'Gagal Login! Salah Password');
        redirect('admin');
      }
    }
  }


  public function dashboard()
  {
    block();
    
    $data['title'] = "MyKosan - Admin Dashboard";
    $data['page'] = "backend/admin/index";
    
    $this->loadview->loadDashboard($data);
  }

  public function aktifitasChart()
  {
    $kosan = $this->aktifitas('kosan');
    $user = $this->aktifitas('user');
    $pemilik = $this->aktifitas('pemilik');
    $jumlah = [];
    
    for($i = 0; $i < count($kosan); $i++){
      $jumlah[$i][0]['jumlah'] = $kosan[$i][0]->jumlah + $user[$i][0]->jumlah+ $pemilik[$i][0]->jumlah;
    }
    echo json_encode($jumlah);
  }
  public function chartPemilik()
  {
    
    $pemilik = $this->aktifitas('pemilik');
    
    echo json_encode($pemilik);
  }
  public function chartUser()
  {
    
    $user = $this->aktifitas('user');
    
    echo json_encode($user);
  }
  public function chartKosan()
  {
    
    $kosan = $this->aktifitas('kosan');
    
    echo json_encode($kosan);
  }

  function bulan()
  {
    $nowYear = date('Y', time());
    $bulan = [
      $jan = strtotime($nowYear . '-Jan-01'),
      $feb = strtotime($nowYear .'-Feb-01'),
      $mar = strtotime($nowYear .'-Mar-01'),
      $apr = strtotime($nowYear .'-Apr-01'),
      $may = strtotime($nowYear .'-May-01'),
      $jun = strtotime($nowYear .'-Jun-01'),
      $jul = strtotime($nowYear .'-Jul-01'),
      $aug = strtotime($nowYear .'-Aug-01'),
      $sep = strtotime($nowYear .'-Sep-01'),
      $oct = strtotime($nowYear .'-Oct-01'),
      $nov = strtotime($nowYear .'-Nov-01'),
      $dec = strtotime($nowYear .'-Dec-01'),
      $newJan = strtotime($nowYear +1 .'-Jan-01')
    ];
    return $bulan;
  }

  public function aktifitas($tabel)
  {
    $bulan = $this->bulan();
    $kosan = [];
    for($i = 0; $i < count($bulan)-1; $i++){
      $kosan[$i] = $this->admin->jumlah($tabel,$bulan[$i],$bulan[$i+1]);
    }
    return $kosan;
  }

  

  public function pemilik()
  {
    block();
    $data['title'] = "MyKosan - Data Pemilik";
    $data['page'] = "backend/admin/pemilik";
    $data['pemilik'] = $this->admin->getDataAll('pemilik');

    $this->loadview->loadDashboard($data);
  }
  public function user()
  {
    block();
    $data['title'] = "MyKosan - Data User";
    $data['page'] = "backend/admin/user";
    $data['user'] = $this->admin->getDataAll('user');

    $this->loadview->loadDashboard($data);
  }
  public function kosan()
  {
    block();
    $data['title'] = "MyKosan - Data Kosan";
    $data['page'] = "backend/admin/kosan";
    $data['kosan'] = $this->admin->getDataKosan();

    $this->loadview->loadDashboard($data);
  }
  public function pesan()
  {
    block();
    $data['title'] = "MyKosan - Kelola Pesan";
    $data['page'] = "backend/admin/pesan";
    $data['pesan'] = $this->admin->getPesan();
    

    $this->loadview->loadDashboard($data);
  }

  public function detail($tabel)
  {
    echo json_encode($this->admin->getDetail($this->input->post('id'), $tabel));
  }

  public function hapusData($id)
  {
    $tabel = $this->uri->segment(4);
    $this->admin->hapusData($id, $tabel);
    $this->session->set_flashdata('flash', 'Data Berhasil dihapus!');
    redirect('admin/dashboard');
  }

  function lihat_gambar($id)
  {
    echo json_encode($this->kosan->getFoto($id));
    
  }
}
