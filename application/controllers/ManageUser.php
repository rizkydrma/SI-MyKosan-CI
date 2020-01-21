<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        $this->load->model('User_model', 'user');
    }
    public function index()
    {
        if (!$this->session->userdata('user')) {
            redirect('home');
        }

        $data['title'] = "MyKosan - Manage User";
        $data['page'] = "frontend/manage-user";
        $data['user'] = $this->user->getDataUser($this->session->userdata('id'));

        $old_image = $data['user']->gambar;

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->loadview->loadFront($data);
        } else {
            $this->edit($old_image);
        }
    }

    function edit($old_image)
    {
        $nama = $this->input->post('nama_user');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');

        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/images/user/users/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_image = $old_image;
                if ($old_image != 'default.png') {
                    unlink(FCPATH . 'assets\images\user\users\\' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
                $data = [
                    'gambar' => $new_image
                ];
                $this->session->set_userdata($data);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'nama' => $nama,
        ];
        $this->session->set_userdata($data);

        $this->db->set('nama_user', $nama);
        $this->db->set('email', $email);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('tgl_lahir', $tgl_lahir);
        $this->db->set('alamat', $alamat);
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user');
        $this->session->set_flashdata('flash', 'Data Berhasil diUbah!');
        redirect('manageuser');
    }


    public function riwayatPembelian()
    {
        if (!$this->session->userdata('user')) {
            redirect('home');
        }

        $data['title'] = "MyKosan - Riwayat Pembelian";
        $data['page'] = "frontend/riwayat-pembelian";
        $data['riwayat_pembelian'] = $this->user->getDataRiwayat($this->session->userdata('id'));

        $this->loadview->loadFront($data);
    }

    public function ubahPassword()
    {
        if (!$this->session->userdata('user')) {
            redirect('home');
        }
        $data['title'] = "MyKosan - Ubah Password";
        $data['page'] = "frontend/ubah-password";
        $data['user'] = $this->user->getDataUser($this->session->userdata('id'));

        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[3]|matches[confirmPassword]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|trim|min_length[3]|matches[newPassword]');

        if ($this->form_validation->run() == false) {
            $this->loadview->loadFront($data);
        } else {
            $passwordLama = $this->input->post('password');
            $passwordBaru = $this->input->post('newPassword');
            $passwordConfirm = $this->input->post('confirmPassword');

            if (!password_verify($passwordLama, $data['user']->password)) {
                $this->session->set_flashdata('flash', 'Gagal diUbah, Password Lama Salah!');
                redirect('manageuser/ubahPassword');
            } else {
                if ($passwordLama == $passwordBaru) {
                    $this->session->set_flashdata('flash', 'Gagal diUbah, Password Baru Sama!');
                    redirect('manageuser/ubahPassword');
                } else {
                    $password_hash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']->email);
                    $this->db->update('user');
                    $this->session->set_flashdata('flash', 'Password Berhasil diUbah');
                    redirect('manageuser');
                }
            }
        }
    }
}
