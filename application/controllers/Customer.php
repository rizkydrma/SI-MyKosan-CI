<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        blocked();
        $this->load->model('Customer_model', 'customer');
        $this->load->model('Transaksi_model', 'transaksi');

    }
    public function index()
    {
        $data['title'] = "MyKosan - Kelola Customer";
        $data['page'] = "backend/customer";
        $data['notif'] = $this->transaksi->getNotifikasi();

        $data['customer'] = $this->customer->getData($this->session->userdata('id'));

        $this->loadview->loadDashboard($data);
    }
    public function hapusData($id)
    {
        $this->customer->hapusData($id);
        $this->session->set_flashdata('flash', 'Data Berhasil dihapus!');
        redirect('customer');
    }
    public function getDetail()
    {
        echo json_encode($this->customer->getDetailData($_POST['id']));
    }
}
