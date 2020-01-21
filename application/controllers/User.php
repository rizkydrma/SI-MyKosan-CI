<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        blocked();
        $this->load->model('User_model', 'user');
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        $data['title'] = "MyKosan - User Setting";
        $data['page'] = "backend/user";
        $data['notif'] = $this->transaksi->getNotifikasi();


        $data['user'] = $this->user->getData($this->session->userdata('id'));
        $old_image = $data['user']->gambar;
        $this->form_validation->set_rules('nama_pemilik', 'Nama User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->loadview->loadDashboard($data);
        } else {
            $this->edit($old_image);
        }
    }
    function edit($old_image)
    {
        $nama = $this->input->post('nama_pemilik');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');

        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/user/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_image = $old_image;
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets\images\user\\' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama_pemilik', $nama);
        $this->db->set('email', $email);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('tgl_lahir', $tgl_lahir);
        $this->db->set('alamat', $alamat);
        $this->db->where('id_pemilik', $this->input->post('id_pemilik'));
        $this->db->update('pemilik');
        $this->session->set_flashdata('flash', 'Data Berhasil diUbah!');
        redirect('user');
    }
}
