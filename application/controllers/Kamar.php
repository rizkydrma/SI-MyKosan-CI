<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('loadview');
    blocked();
    $this->load->model('Kamar_model', 'kamar');
    $this->load->model('Kosan_model', 'kosan');
    $this->load->model('Transaksi_model', 'transaksi');

  }

  public function index()
  {
    $data['title'] = "MyKosan - Kelola Kamar";
    $data['page'] = "backend/dashboard-kamar";
    $data['kosan'] = $this->kamar->getDataKosan($this->session->userdata('id'));
    $data['notif'] = $this->transaksi->getNotifikasi();

    $this->loadview->loadDashboard($data);
  }

  public function dataKamar($id)
  {
    $data['title'] = "MyKossan - Kelola Kamar";
    $data['page'] = "backend/kamar";
    $data['kamar'] = $this->kamar->getDataSpecify($id);
    $data['kosan'] = $this->kamar->getDataWhere($id);
    $data['notif'] = $this->transaksi->getNotifikasi();


    $this->form_validation->set_rules('id_kosan', 'Kosan', 'required');
    $this->form_validation->set_rules('nama_tipe', 'Nama Tipe', 'required');
    $this->form_validation->set_rules('tipe_kamar', 'Tipe Kamar', 'required');
    $this->form_validation->set_rules('jumlah_kamar', 'Kosan', 'required');
    $this->form_validation->set_rules('kamar_tersedia', 'Kamar Tersedia', 'required');
    $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');

    if ($this->form_validation->run() == false) {
      $this->loadview->loadDashboard($data);
    } else {
      $data = [
        'id_kosan' => $this->input->post('id_kosan'),
        'nama_tipe' => $this->input->post('nama_tipe'),
        'tipe_kamar' => $this->input->post('tipe_kamar'),
        'jumlah_kamar' => $this->input->post('jumlah_kamar'),
        'jumlah_kamar_tersedia' => $this->input->post('kamar_tersedia'),
        'fasilitas' => $this->input->post('fasilitas'),
        'harga' => $this->input->post('harga'),
      ];

      $this->db->insert('tipe_kamar', $data);
      $this->session->set_flashdata('flash', 'Data Berhasil ditambahkan!');
      redirect('kamar');
    }
  }

  public function ubahData()
  {
    $data = [
      'id_kosan' => $this->input->post('id_kosan'),
      'nama_tipe' => $this->input->post('nama_tipe'),
      'tipe_kamar' => $this->input->post('tipe_kamar'),
      'jumlah_kamar' => $this->input->post('jumlah_kamar'),
      'jumlah_kamar_tersedia' => $this->input->post('kamar_tersedia'),
      'fasilitas' => $this->input->post('fasilitas'),
      'harga' => $this->input->post('harga'),
      'waktu' => time() + (6*60*60)
    ];


    $this->db->where('id_tipe', $this->input->post('id_tipe'));
    $this->db->update('tipe_kamar', $data);
    $this->session->set_flashdata('flash', 'Data Berhasil diUbah!');
    redirect('kamar');
  }

  public function hapusData($id)
  {
    $this->kamar->hapusData($id);
    $this->session->set_flashdata('flash', 'Data Berhasil dihapus!');
    redirect('kamar');
  }

  public function detail()
  {
    echo json_encode($this->kamar->getDetail($this->input->post('id')));
  }

  public function getKosan()
  {
    echo json_encode($this->kamar->getData('kosan'));
  }

  function proses_upload()
  {
    $config['upload_path'] = FCPATH . '/assets/images/tipe_kamar';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['encrypt_name'] = TRUE;
    $config['max_size']  = 4048;

    $this->load->library('upload', $config);
    $this->form_validation->set_rules('id_tipe', 'Tipe Kamar', 'required');


    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('flash', 'Data Gagal ditambahkan! ,' . form_error());

      redirect('kamar');
    } else {
      if ($this->upload->do_upload('file')) {
        $id_tipe = $this->input->post('id_tipe');


        $name = $this->upload->data('file_name');
        $this->db->insert('photo_kamar', ['id_tipe' => $id_tipe, 'foto' => $name]);
        $this->session->set_flashdata('flash', 'Data Berhasil ditambahkan!');
      }
      redirect('kamar');
    }
  }

  function lihat_gambar($id)
  {
    echo json_encode($this->kamar->getFoto($id));
  }
}
