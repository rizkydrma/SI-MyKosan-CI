<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        $this->load->model('Tempat_model', 'tempat');
        
        if(!$this->session->userdata('token')){
            $json = file_get_contents('https://x.rajaapi.com/poe');
            $json = json_decode($json, true);
            $token = $json['token'];
            $data = [
                'token' => $token
            ];
            $this->session->set_userdata($data);
        }
    }
    public function index()
    {
        $data['title'] = "MyKosan - Home Page";
        $data['page'] = "frontend/home";
        $data['provinsi'] = $this->tempat->getProvinsi();

        
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('email','Email','required|email');
        $this->form_validation->set_rules('kritik_saran','Kritik & Saran','required');

        if($this->form_validation->run() == false){
            $this->loadview->loadFront($data);
        }
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

    function kirimPesan()
    {
        $data = [
            'email' => $this->input->post('email'),
            'kritik_saran' => $this->input->post('kritik_saran'),
            'waktu' => time() + (6*60*60)
        ];
        
        $this->db->insert('pesan', $data);
        $this->session->set_flashdata('flash', 'Kritik & Saran Berhasil terkirim');
        redirect('home');
    }
}
