<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kosan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('loadview');
    blocked();
    $this->load->model('Kosan_model', 'kosan');
    $this->load->model('Tempat_model', 'tempat');
    $this->load->model('Transaksi_model', 'transaksi');

  }

  public function index()
  {
    $data['title'] = "MyKosan - Kelola Kosan";
    $data['page'] = "backend/kosan";
    $data['kosan'] = $this->kosan->getData($this->session->userdata('id'));
    $data['provinsi'] = $this->tempat->getProvinsi();
    $data['notif'] = $this->transaksi->getNotifikasi();


    $this->form_validation->set_rules('nama_kosan', 'Nama Kosan', 'required');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
    $this->form_validation->set_rules('kota', 'Kota', 'required');
    $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() == false) {
      $this->loadview->loadDashboard($data);
    } else {
      $split_prov = explode('|', $this->input->post('provinsi'));
      $nama_prov = $split_prov[1];
      $split_kota = explode("|", $this->input->post('kota'));
      $nama_kota = $split_kota[1];

      $data = [
        'id_pemilik' => $this->input->post('id_pemilik'),
        'nama_kosan' => $this->input->post('nama_kosan'),
        'provinsi' => $nama_prov,
        'kota' => $nama_kota,
        'kecamatan' => $this->input->post('kecamatan'),
        'alamat' => $this->input->post('alamat'),
        'deskripsi' => $this->input->post('deskripsi'),
        'waktu' => time() + (6*60*60)

      ];

      $this->db->insert('kosan', $data);
      $this->session->set_flashdata('flash', 'Data Berhasil ditambahkan!');
      redirect('kosan');
    }
  }

  public function ubahData()
  {
    $tamp_provinsi = $this->input->post('provinsi');
    $tamp_kota = $this->input->post('kota');
    if (!strpos($tamp_provinsi, '|') || !strpos($tamp_kota, '|')) {
      $nama_prov = $tamp_provinsi;
      $nama_kota = $tamp_kota;
    } else {
      $split_prov = explode('|', $this->input->post('provinsi'));
      $split_kota = explode("|", $this->input->post('kota'));
      $nama_prov = $split_prov[1];
      $nama_kota = $split_kota[1];
    }

    $data = [
      'id_pemilik' => $this->input->post('id_pemilik'),
      'nama_kosan' => $this->input->post('nama_kosan'),
      'provinsi' => $nama_prov,
      'kota' => $nama_kota,
      'kecamatan' => $this->input->post('kecamatan'),
      'alamat' => $this->input->post('alamat'),
      'deskripsi' => $this->input->post('deskripsi'),
    ];

    $this->db->where('id_kosan', $this->input->post('id_kosan'));
    $this->db->update('kosan', $data);
    $this->session->set_flashdata('flash', 'Data Berhasil diUbah!');
    redirect('kosan');
  }
  public function hapusData($id)
  {
    $this->kosan->hapusData($id);

    $this->session->set_flashdata('flash', 'Data Berhasil dihapus!');
    redirect('kosan');
  }

  function getKota($id)
  {
    $data = $this->tempat->getKota($id);
    echo json_encode($data);
  }

  function getKecamatan($id)
  {
    $data = $this->tempat->getKecamatan($id);
    echo json_encode($data);
  }

  function proses_upload()
  {
    $config['upload_path'] = FCPATH . '/assets/images/kosan';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['encrypt_name'] = TRUE;
    $config['max_size']  = 4048;

    $this->load->library('upload', $config);
    $this->form_validation->set_rules('id_kosan', 'Kosan', 'required');


    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('flash', 'Data Gagal ditambahkan! ,' . form_error());

      redirect('kosan');
    } else {
      if ($this->upload->do_upload('file')) {
        $id_kosan = $this->input->post('id_kosan');
        $name = $this->upload->data('file_name');
        $this->db->insert('photo', ['id_kosan' => $id_kosan, 'foto' => $name]);
        $this->session->set_flashdata('flash', 'Data Berhasil ditambahkan!');
      }
      redirect('kosan');
    }
  }

  function lihat_gambar($id)
  {
    echo json_encode($this->kosan->getFoto($id));
  }

  function detail($id)
  {
    echo json_encode($this->kosan->getDetail($id));
  }
}
