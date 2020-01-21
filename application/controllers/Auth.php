<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('loadview');
    $this->load->model('Auth_model', 'auth');
  }

  public function index()
  {
    $data['title'] = "MyKosan - Login User";
    $data['page'] = "frontend/auth/index";

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->loadview->loadFront($data);
    } else {
      $this->_userLogin();
    }
  }

  public function daftarUser()
  {
    $data['title'] = "MyKosan - Daftar User";
    $data['page'] = "frontend/auth/daftar-user";


    $this->form_validation->set_rules('nama_user', 'Nama User', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]|is_unique[pemilik.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]');
    $this->form_validation->set_rules('repassword', 'Confirm Password', 'required|trim|min_length[3]|matches[password]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');

    if ($this->form_validation->run() == false) {
      $this->loadview->loadFront($data);
    } else {
      $this->_register('user');
    }
  }

  public function loginOwner()
  {
    $data['title'] = "Auth - Login Owner";
    $data['page'] = "frontend/auth/login-owner";

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->loadview->ownerlogin($data);
    } else {
      $this->_ownerLogin();
    }
  }

  public function daftarOwner()
  {
    $data['title'] = "Auth - Daftar Owner";
    $data['page'] = "frontend/auth/daftar-owner";

    $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]|is_unique[pemilik.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]');
    $this->form_validation->set_rules('repassword', 'Confirm Password', 'required|trim|min_length[3]|matches[password]');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $this->loadview->ownerlogin($data);
    } else {
      $this->_register('pemilik');
    }
  }




  // ===========================FUNCTIONS======================\\

  private function _register($param)
  {
    $email = $this->input->post('email');
    if ($param == 'user') {
      $data = [
        'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
        'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'is_active' => 0,
        'gambar' => 'default.png',
        'waktu' => time() + (6*60*60)
      ];
    } else {
      $data = [
        'nama_pemilik' => htmlspecialchars($this->input->post('nama_pemilik', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
        'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'is_active' => 0,
        'gambar' => 'default.png',
        'waktu' => time() + (6*60*60)
      ];
    }

    $token = base64_encode(random_bytes(32));
    $user_token = [
      'email' => $email,
      'token' => $token,
      'date_created' => time()
    ];

    if ($param == 'user') {
      $this->db->insert('user', $data);
    } else if ($param == 'pemilik') {
      $this->db->insert('pemilik', $data);
    }
    $this->db->insert('user_token', $user_token);
    $this->_sendmail($token, 'verify');

    $this->session->set_flashdata('flash', 'Akun Berhasil dibuat!');
    if ($param == 'pemilik') {
      redirect('auth/loginowner');
    } else {
      redirect('auth');
    }
  }

  private function _sendmail($token, $type)
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
    $this->email->from('alamat email kamu', 'Verifikasi Accout MyKosan');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Account Verification');
      $this->email->message('
            <head>
            <style>
                body{
                    font-family: "Segoe UI";
                    font-weight: 400;
                    background: rgba(214, 214, 214, 0.719);
                    min-height: 400px;
                }
                .below{
                    text-align: center;
                }
                .btn-aktifasi{
                    border-radius: 20px;
                    background: rgba(41, 128, 209, 0.877);
                    padding: 10px 20px;
                    margin: 0 auto;
                }
                a{
                    text-decoration: none;
                    color: white;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <table align="center">
                <tr>
                    <td>
                        <h5>Klik Link di bawah ini untuk mengaktifasi Akun MyKosan Kamu !</h5>
                    </td>
                </tr>
                <tr>
                    <td class="below">
                            <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" class="btn-aktifasi"> Aktifasi </a>            
                        </td>
                </tr>
            </table>
        </body>
      ');
    } else if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->auth->getData('user', ['email' => $email]);
    $pemilik = $this->auth->getData('pemilik',  ['email' => $email]);

    if ($user) {
      $table = 'user';
    } else if ($pemilik) {
      $table = 'pemilik';
    }

    if ($user || $pemilik) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row();
    }
    if ($user_token) {
      if (time() - $user_token->date_created < (60 * 60 * 24)) {
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        $this->db->update($table);

        $this->auth->setData('user_token', $email);
        $this->session->set_flashdata('flash', 'Akun Berhasil diaktivasi!');
        redirect('home');
      } else {
        $this->auth->setData('user', $email);
        $this->auth->setData('user_token', $email);
        $this->session->set_flashdata('flash', 'Akun Gagal diaktivasi Token kadaluarsa!');
        redirect('home');
      }
    } else {
      $this->session->set_flashdata('flash', 'Akun Gagal diaktivasi User sudah aktif!');
      redirect('home');
    }
  }
  private function _userLogin()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->auth->getData('user',  ['email' => $email]);


    if ($user) {
      if ($user->is_active == 1) {
        if (password_verify($password, $user->password)) {
          $data = [
            'id' => $user->id_user,
            'nama' => $user->nama_user,
            'email' => $user->email,
            'gambar' => $user->gambar,
            'user' => 'user'
          ];
          $this->session->set_userdata($data);
          $this->session->set_flashdata('flash', 'Berhasil Login');
          redirect('home');
        } else {
          $this->session->set_flashdata('flash', 'Gagal Login! Salah Password');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('flash', 'Gagal, Akun Belum diaktivasi!');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('flash', 'Gagal Akun Tidak Ada!');
      redirect('auth');
    }
  }

  private function _ownerLogin()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $pemilik = $this->auth->getData('pemilik',  ['email' => $email]);


    if ($pemilik) {
      if ($pemilik->is_active == 1) {
        if (password_verify($password, $pemilik->password)) {
          $data = [
            'id' => $pemilik->id_pemilik,
            'nama' => $pemilik->nama_pemilik,
            'email' => $pemilik->email,
            'pemilik' => 'pemilik'
          ];
          $this->session->set_userdata($data);
          $this->session->set_flashdata('flash', 'Berhasil Login');
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('flash', 'Gagal Login! Salah Password');
          redirect('auth/loginOwner');
        }
      } else {
        $this->session->set_flashdata('flash', 'Gagal, Akun Belum diaktivasi!');
        redirect('auth/loginOwner');
      }
    } else {
      $this->session->set_flashdata('flash', 'Gagal Akun Tidak Ada!');
      redirect('auth/loginOwner');
    }
  }

  public function forgotUser()
  {
    $data['title'] = 'MyKosan - Forgot Password User';
    $data['page'] = 'frontend/auth/forgot-user';

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == false) {
      $this->loadview->loadFront($data);
    } else {
      $email = $this->input->post('email');
      $user = $this->auth->getData('user',  ['email' => $email, 'is_active' => 1]);

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendmail($token, 'forgot');

        $this->session->set_flashdata('flash', 'Berhasil Please check your email to reset your password');
        redirect('auth');
      } else {
        $this->session->set_flashdata('flash', 'Gagal Email belum terdaftar atau belum diaktivasi');
        redirect('auth/forgotpassword');
      }
    }
  }

  public function forgotOwner()
  {
    $data['title'] = 'MyKosan - Forgot Password Owner';
    $data['page'] = 'frontend/auth/forgot-owner';

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == false) {
      $this->loadview->ownerlogin($data);
    } else {
      $email = $this->input->post('email');
      $user = $this->auth->getData('pemilik',  ['email' => $email, 'is_active' => 1]);

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendmail($token, 'forgot');

        $this->session->set_flashdata('flash', 'Berhasil Please check your email to reset your password');
        redirect('auth/loginowner');
      } else {
        $this->session->set_flashdata('flash', 'Gagal Email belum terdaftar atau belum diaktivasi');
        redirect('auth/forgotpassword');
      }
    }
  }

  public function resetpassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->auth->getData('user', ['email' => $email]);
    $pemilik = $this->auth->getData('pemilik', ['email' => $email]);

    $table = ($user) ? 'user' : 'pemilik';
    $this->session->set_userdata('table', $table);

    if ($pemilik || $user) {
      $user_token = $this->auth->getData('user_token', ['token' => $token]);

      if ($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword($table);
      }
    }
  }

  public function changePassword($table)
  {

    if (!$this->session->userdata('reset_email')) {
      redirect('home');
    }
    $data['title'] = 'MyKosan - Change Password';
    $data['page'] = 'frontend/auth/change-password';

    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repassword]');
    $this->form_validation->set_rules('repassword', 'Confirm Password', 'required|trim|min_length[3]|matches[password]');

    if ($this->form_validation->run() == false) {
      if ($table == 'user') {
        $this->loadview->loadFront($data);
      } else {
        $this->loadview->ownerlogin($data);
      }
    } else {
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update($table);

      $this->session->unset_userdata('reset_email');
      $this->session->unset_userdata('table');

      $this->session->set_flashdata('flash', 'Password Berhasil diubah!');
      if ($table == 'user') {
        redirect('auth');
      } else {
        redirect('auth/loginowner');
      }
    }
  }

  public function blocked()
  {
    $this->load->view('frontend/auth/blocked');
  }

  public function logout()
  {
    hapus_session();

    $this->session->set_flashdata('flash', 'Akun Berhasil Logout!');
    redirect('home');
  }
}
