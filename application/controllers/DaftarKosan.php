<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarKosan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('loadview');
        $this->load->model('DaftarKosan_model', 'daftarKosan');
        $this->load->model('Order_model', 'order');
        $this->load->model('Tempat_model', 'tempat');
    }
    public function index()
    {
        $data['title'] = 'MyKosan - Daftar Kosan';
        $data['page'] = 'frontend/kosan/daftar-kosan';
        $data['provinsi'] = $this->tempat->getProvinsi();


        $kecamatan = $this->input->get('kecamatan');
        $tgl_sewa = $this->input->get('tgl_sewa');
        $harga_terendah = $this->input->get('harga_terendah');
        $harga_tertinggi = $this->input->get('harga_tertinggi');

        $param = [
            'kecamatan' => $kecamatan,
            'tgl_sewa' => $tgl_sewa,
            'harga_terendah' => $harga_terendah,
            'harga_tertinggi' => $harga_tertinggi
        ];

        $data['kosan'] = $this->daftarKosan->frGetDataKosan($param);

        for ($i = 0; $i < count($data['kosan']); $i++) {
            $data['gambar'][$i] = $this->daftarKosan->getFotoKosan($data['kosan'][$i]['id_kosan']);
        }
        

        $this->loadview->loadFront($data);
    }

    public function detailKosan($id)
    {
        $data['title'] = 'MyKosan - Detail Kosan';
        $data['page'] = 'frontend/kosan/detail-kosan';
        $data['provinsi'] = $this->tempat->getProvinsi();


        $data['kosan'] = $this->daftarKosan->getDataKosan($id);
        $data['gambarKosan'] = $this->daftarKosan->getGambarKosan($id);
        
        $data['kamar'] = $this->daftarKosan->getDataKamar($id);


        $this->loadview->loadFront($data);
    }

    public function konfirmasi()
    {

        $data['title'] = 'MyKosan - Konfirmasi Pesanan';
        $data['page'] = 'frontend/kosan/konfirmasi-pesanan';
        $id = $this->input->post('id_tipe');
        $data['detailPesanan'] = $this->order->getDataOrder($id);
        $tgl_sewa = $this->input->post('tgl_sewa');
        $lama_sewa = $this->input->post('lama_sewa');
        $jumlah_kamar_tersedia = $this->input->post('jumlah_kamar_tersedia');
        $no_invoice = date('d-m-Y ', time()) . random_int(0, 9999);

        $bayarSebelum = explode(' ', $no_invoice);
        $tgl_transaksi = time() + (6*60*60);
        $bayarSebelum = $bayarSebelum[0];
        $bayarSebelum = strtotime($bayarSebelum);
        $resbayarSebelum = date('Y-m-d H:i', $bayarSebelum + (60 * 60 * 24 * 2));
        $batasPembayaran = date('Y-m-d', $bayarSebelum + (60 * 60 * 24 * 2));

        $data['konfirmasi'] = [
            'no_invoice' => $no_invoice,
            'tgl_sewa' => $tgl_sewa,
            'lama_sewa' => $lama_sewa,
            'jumlah_kamar_tersedia' => $jumlah_kamar_tersedia,
            'tgl_keluar' => date('Y-m-d', strtotime($tgl_sewa) + (60 * 60 * 24 * 30) * $lama_sewa),
            'total_harga' => $lama_sewa * $data['detailPesanan']->harga * $jumlah_kamar_tersedia,
            'bayar_sebelum' => $resbayarSebelum
        ];
        

        $this->form_validation->set_rules('id_kosan', 'ID Kosan', 'required');
        $this->form_validation->set_rules('id_tipe', 'ID Tipe', 'required');
        $this->form_validation->set_rules('id_pemilik', 'Pemilik', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('tgl_sewa', 'Tanggal Sewa', 'required');
        $this->form_validation->set_rules('lama_sewa', 'Lama Sewa', 'required');
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('total_harga', 'Total Harga', 'required');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('user')) {
                $this->loadview->loadFront($data);
            } else {
                redirect('auth');
            }
        } else {
            $data['transaksi'] = [
                'no_invoice' => $this->input->post('no_invoice'),
                'id_user' => $this->input->post('id_user'),
                'id_tipe' => $this->input->post('id_tipe'),
                'id_kosan' => $this->input->post('id_kosan'),
                'tgl_transaksi' => $tgl_transaksi,
                'lama_sewa' => $this->input->post('lama_sewa'),
                'jumlah_kamar' => $this->input->post('jumlah_kamar_tersedia'),
                'tgl_masuk' => $this->input->post('tgl_sewa'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'total_harga' => $this->input->post('total_harga'),
                'status' => 'Menunggu Pembayaran',
                'tgl_batas_pembayaran' => $batasPembayaran,
                'id_pemilik' => $this->input->post('id_pemilik'),
                'read' => 0
            ];

            if($data['transaksi']['no_invoice'] == $data['konfirmasi']['no_invoice']){
                echo"sama";
            }else{
                echo"beda";
            }

            $data['pembayaran'] = [
                'no_invoice' => $this->input->post('no_invoice'),
                'total_harga' => $this->input->post('total_harga'),
                'tgl_batas_pembayaran' => $resbayarSebelum,
                'nama_user' => $this->session->userdata('nama'),
                'jumlah_kamar_tersedia' => $jumlah_kamar_tersedia
            ];

            $new_jumlah_kamar = $this->input->post('new_jumlah_kamar') - $jumlah_kamar_tersedia;

            $this->db->insert('transaksi', $data['transaksi']);
            $this->db->set('jumlah_kamar_tersedia', $new_jumlah_kamar);
            $this->db->where('id_tipe', $this->input->post('id_tipe'));
            $this->db->update('tipe_kamar');
            $this->_sendPembayaran($data['pembayaran']);
            $this->detailPemesanan();
        }
    }

    public function detailPemesanan()
    {
        $data['title'] = 'MyKosan - Detail Pemesanan';
        $data['page'] = 'frontend/kosan/detail-pemesanan';

        $data['pemesanan'] = [
            'bayar_sebelum' => $this->input->post('bayar_sebelum'),
            'nama_kosan' => $this->input->post('nama_kosan'),
            'nama_tipe' => $this->input->post('nama_tipe'),
            'harga' => $this->input->post('harga'),
            'no_invoice' => $this->input->post('no_invoice'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'tgl_sewa' => $this->input->post('tgl_sewa'),
            'lama_sewa' => $this->input->post('lama_sewa'),
            'jumlah_kamar_tersedia' => $this->input->post('jumlah_kamar_tersedia'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'total_harga' => $this->input->post('total_harga'),
            'id_kosan' => $this->input->post('id_kosan'),
            'id_tipe' => $this->input->post('id_tipe')
        ];


        $this->loadview->loadFront($data);
    }

    private function _sendPembayaran($pembayaran)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'alamat email kamu',
            'smtp_pass' => 'password email kamu',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from('alamat email kamu', 'do not reply this email! @mykosan');
        $this->email->to($this->session->userdata('email'));
        $this->email->subject('Kode Pembayaran Kosan');
        $this->email->message('<table border="0" width="500px">
        <tr>
            <td>
                <H2>Pesanan Anda Rp ' . $pembayaran['total_harga'] . ' telah dipesan</H2>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    Dear ' . $pembayaran['nama_user'] . ', <br>
                    Terimakasih atas pesanan anda! Pesanan anda akan berhasil kami pesan setelah anda melakukan
                    pembayaran, Mohon membayar sebelum ' . $pembayaran['tgl_batas_pembayaran'] . ' menggunakan kode pembayaran di bawah ini. <br>
                    Kami telah mengirim email kepada anda dengan instruksi pembayaran ini <br>
                    <h3 align="center"> ' . $pembayaran['no_invoice'] . '</h3>
                    <h2 align="center">Jumlah : <br> Rp.' . $pembayaran['total_harga'] . '</h2>
                    <h2 align="center">Bayar Sebelum: <br> ' . $pembayaran['tgl_batas_pembayaran'] . '</h2>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <h5>Bayar Di Tempat</h5>
                <ol>
                    <li>
                        <p>Bilang Kepada Pemilik/Pegawai Kosan ditempat Anda ingin melakukan pembayaran MyKosan</p>
                    </li>
                    <li>
                        <p>Pemilik/Pegawai Kosan akan meminta kode pembayaran <b> ' . $pembayaran['no_invoice'] . ' </b></p>
                    </li>
                    <li>
                        <p>Pemilik/Pegawai Kosan ingin konfirmasi MyKosan dan jumlah <b> Rp.' . $pembayaran['total_harga'] . ' </b></p>
                    </li>
                    <li>
                        <p>Bayar dan terima struk + kunci kamar Anda</p>
                    </li>
                </ol>
            </td>
        </tr>
    </table>');


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
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
}
