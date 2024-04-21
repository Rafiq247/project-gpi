<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Memuat autoload.php dari vendor
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('backend/template/Auth_header', $data);
      $this->load->view('backend/auth/login');
      $this->load->view('backend/template/Auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      //kondisi jika user aktif 
      if ($user['is_active'] == 1) {
        //cek password 
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            $this->session->set_userdata('masuk_admin', true);
            redirect('admin');
          } else {
            $this->session->set_userdata('masuk_user', true);
            redirect('pegawai');
          }
        } else {
          $this->session->set_flashdata('message', 'password salah');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email belum diaktivasi
		 		 </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email tidak terdaftar
		 	 </div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email ini sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'Password tidak sama!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Registration';

      $this->load->view('backend/template/Auth_header', $data);
      $this->load->view('backend/auth/registration');
      $this->load->view('backend/template/Auth_footer');
    } else {
      // Menyiapkan data untuk disimpan ke dalam session
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $password = $this->input->post('password1');

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      // Data yang akan disimpan dalam session
      $session_data = [
        'name' => $name,
        'email' => $email,
        'password' => $hashed_password
      ];

      // Menyimpan data ke dalam session dengan nama 'registration_data'
      $this->session->set_userdata('registration_data', $session_data);

      // Redirect ke halaman biodata untuk melanjutkan proses registrasi
      redirect('auth/biodata');
    }
  }

  public function biodata()
  {
    $data['title'] = 'Registrasi';

    // Mengambil data user berdasarkan email yang ada di session
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['jabatan'] = $this->Auth_model->getAlljabatan();
    $data['pegawai'] = $this->Auth_model->getAllpegawai();

    // Mengambil data registrasi dari session
    $registration_data = $this->session->userdata('registration_data');

    // Periksa apakah session 'registration_data' ada dan tidak null
    if ($registration_data) {
      $name = $registration_data['name'];
      $email = $registration_data['email'];
      $password = $registration_data['password'];

      // Ambil data dari form
      $id_user = $this->input->post('id_user', true);
      $id_pegawai = $this->input->post('id_pegawai', true);
      $jekel = $this->input->post('jekel', true);
      $pendidikan = $this->input->post('pendidikan', true);
      $status_pegawai = $this->input->post('status_pegawai', true);
      $agama = $this->input->post('agama', true);
      $jabatan = $this->input->post('jabatan', true);
      $nohp = $this->input->post('nohp', true);
      $alamat = $this->input->post('alamat', true);
      $tgl_msk = $this->input->post('tgl_msk', true);
      $temp = $this->input->post('temp', true);

      //foto dan ktp 
      $upload_image = isset($_FILES['userfilefoto']['name']) ? $_FILES['userfilefoto']['name'] : null;
      $upload_image1 = isset($_FILES['userfilektp']['name']) ? $_FILES['userfilektp']['name'] : null;

      $fotoName = "";
      if ($upload_image) {
        $config['upload_path']          = './gambar/pegawai/';
        $config['allowed_types']        = '*';
        // $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfilefoto')) {
          $new_image = $this->upload->data('file_name');
          $fotoName = $new_image;
          $gambar_user = $new_image;
        } else {
          echo $this->upload->display_errors();
        }
      }
      //upload foto ktp
      $ktpName = "";
      if ($upload_image1) {
        $config['upload_path']          = './gambar/pegawai/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfilektp')) {
          $new_image1 = $this->upload->data('file_name');
          // $data = $this->db->set('ktp', $new_image1);
          $ktpName = $new_image1;
        } else {
          echo $this->upload->display_errors();
        }
      }

      // Validasi form
      $this->form_validation->set_rules('id_user', 'ID User', 'required');
      // ... tambahkan aturan validasi lainnya sesuai kebutuhan

      if ($this->form_validation->run() == false) {
        // Tampilkan halaman form biodata dengan pesan kesalahan validasi
        $this->load->view('backend/template/Auth_header', $data);
        $this->load->view('backend/auth/biodata', $registration_data);
        $this->load->view('backend/template/Auth_footer');
      } else {

        $data1 = [
          "id" => $id_user,
          "name" => $name, // Gunakan data 'name' dari session
          "email" => $email, // Gunakan data 'email' dari session
          "image" => $gambar_user,
          "password" => $password, // Gunakan data 'password' dari session
          'role_id' => 2,
          'is_active' => 1,
          'date_created' => time(),
          'temp' => $temp
        ];
        $this->db->insert('user', $data1);
        // Setelah selesai, unset session 'registration_data'
        $this->session->unset_userdata('registration_data');

        $data = [
          "id_pegawai" => $id_pegawai,
          "id_user" => $id_user,
          "nama_pegawai" => $name,
          "jekel" => $jekel,
          "pendidikan" => $pendidikan,
          "status_kepegawaian" => $status_pegawai,
          "agama" => $agama,
          "jabatan" => $jabatan,
          "no_hp" => $nohp,
          "alamat" => $alamat,
          "tanggal_masuk" => $tgl_msk,
          "ktp" => $ktpName,
          "foto" => $fotoName,
        ];
        $this->db->insert('tb_pegawai', $data);
        $this->session->unset_userdata('registration_data');

        // Redirect ke halaman login atau halaman lain yang sesuai
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Akun berhasil dibuat! Silahkan login
        </div>');
        redirect('auth');
      }
    } else {
      // Session 'registration_data' tidak ada, tangani kasus ini
      // Mungkin tampilkan pesan kesalahan atau arahkan kembali ke halaman registrasi
      // Redirect ke halaman registrasi jika perlu
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Akun gagal dibuat! Mohon masukkan data yang benar
        </div>');
      redirect('auth/registration');
    }
  }

  private function _sendEmail($reset_link)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'joyiseod4mban@gmail.com',
      'smtp_pass' => 'ksurnbftyxgafqku',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('joyiseod4mban@gmail.com', 'Tim HATARA');
    $this->email->to('emasku001@gmail.com');
    $this->email->subject('Tester');
    $this->email->message('Silahkan klik link ini untuk mereset password anda : ');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function forgotPassword()
  {
    $email = $this->input->post('email');
    $user = $this->Auth_model->getUserByEmail($email);

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Lupa Password';
      $this->load->view('backend/template/Auth_header', $data);
      $this->load->view('backend/auth/forgot_password');
      $this->load->view('backend/template/Auth_footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        $token = md5(uniqid(rand(), true));
        $this->Auth_model->saveResetToken($user['id'], $token);

        // Send email with reset link containing token
        $reset_link = base_url('auth/resetpassword' . $token);
        $this->_sendEmail($reset_link);
        echo "Email berhasil dikirim dengan tautan reset password.";
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diverifikasi atau belum terdaftar!
        </div>');
        redirect('auth/forgotpassword');
      }
    }
  }



  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->sess_destroy();

    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    // anda berhasil logout
    //   </div>');

    $this->session->set_flashdata('message', 'anda berhasil logout');
    redirect('auth');
  }
}
