<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk_user') != TRUE) {
			$url = base_url('auth');
			redirect($url);
		};
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konfirmasi_absen'] = $this->User_model->konfirmasiAbsenById($data['user']['id']);




		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/dashboard/index', $data);
		$this->load->view('backend/f_template/footer');
	}

	public function visi_misi()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/dashboard/visimisi', $data);
		$this->load->view('backend/f_template/footer');
	}

	public function sejarah()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);

		$this->load->view('backend/user/dashboard/sejarah', $data);
		$this->load->view('backend/f_template/footer');
	}
	public function edit_profil($id)
	{
		$data['title'] = 'Edit Profil';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$nama = $this->input->post('nama', true);


		//foto dan ktp 
		$upload_image = $_FILES['userfilefoto']['name'];
		if ($upload_image) {
			$config['upload_path']          = './gambar/pegawai/';
			$config['allowed_types']        = 'gif|jpg|png|PNG';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('userfilefoto')) {
				$new_image = $this->upload->data('file_name');
				$new_image1 = $this->upload->data('file_name');
				$data = $this->db->set('foto', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
			$data = [
				"nama_pegawai" => $nama,

			];
			$this->db->where('id_user', $id);
			$this->db->update('tb_pegawai', $data);

			$data1 = $this->db->set('image', $new_image1);

			$data1 = [
				"name" => $nama,

			];
			$this->db->where('id', $id);
			$this->db->update('user', $data1);


			$this->session->set_flashdata('flash', 'Berhasil diperbarui');
			redirect('pegawai');
		} else {
			$data = [
				"nama_pegawai" => $nama,

			];
			$this->db->where('id_user', $id);
			$this->db->update('tb_pegawai', $data);
			$data1 = [
				"name" => $nama,

			];
			$this->db->where('id', $id);
			$this->db->update('user', $data1);
			$this->session->set_flashdata('flash', 'Berhasil diperbarui');
			redirect('pegawai');
		}
		// 
	}
	public function edit_password($id)
	{
		$data['title'] = 'Edit Password';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$password_lama = $this->input->post('password_lama', true);
		$password_baru = $this->input->post('password_baru', true);
		$password_baru1 = $this->input->post('password_baru1', true);
		if (password_verify($password_lama, $data['user']['password'])) {
			if ($password_baru == $password_baru1) {
				$data = [
					"password" => password_hash($password_baru, PASSWORD_DEFAULT),
				];
				$this->db->where('id', $id);
				$this->db->update('user', $data);
				$this->session->set_flashdata('flash', 'Password Berhasil Diubah!');
				redirect('pegawai');
			} else {
				$this->session->set_flashdata('flash', 'Konfirmasi Password Berbeda!');
				redirect('pegawai');
			}
		} else {
			$this->session->set_flashdata('flash', 'Password Lama Salah!');
			redirect('pegawai');
		}
	}

	public function absen_harian()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->User_model->PegawaiById($data['user']['id']);
		$data['absensi'] = $this->User_model->izinById($data['pegawai']['id_pegawai']);

		$isi = $this->User_model->AbsenByStatusId($data['user']['id']);

		if ($isi) {
			$data['absen'] = $isi;
		} else {
			$data['absen']['keterangan'] = "";
			$data['absen']['id_pegawai'] = "peg";
		}
		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/absensekarang/index', $data);
		$this->load->view('backend/f_template/footer');
	}
	public function konfirmasi_absen()
	{
		$data['title'] = 'Konfirmasi Absen';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konfirmasi_absen'] = $this->User_model->konfirmasiAbsenById($data['user']['id']);

		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/konfirmasi_absen/index', $data);
		$this->load->view('backend/f_template/footer');
	}

	public function checkData($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
	public function absen_bulanan()
	{
		$data['title'] = 'Absen Bulanan';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$thn = $this->input->post('th');
		$bln = $this->input->post('bln');
		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;
		$data['pegawai'] = $this->db->get_where('tb_pegawai', ['id_user' => $data['user']['id']])->row_array();
		$id_peg = $data['pegawai']['id_pegawai'];
		// $data['petugas'] = $this->db->get_where('user')->result_array();
		// 



		$data['list_th'] = $this->Admin_model->getTahunAbsensi();
		$data['list_bln'] = $this->Admin_model->getBlnAbsensi();
		$data['pegawai'] = $this->db->get_where('tb_pegawai', ['id_user' => $data['user']['id']])->row_array();
		$isi = $this->Admin_model->getAllpegawaiByid($id_peg);
		if ($isi == null) {
			$data['detail_pegawai']['nama_pegawai'] = '';
			$data['detail_pegawai']['namjab'] = '';
		} else {
			$data['detail_pegawai'] = $isi;
		}

		$thn = $this->input->post('th');
		$bln = $this->input->post('bln');
		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;

		if ($bln < 10) {
			$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01' . ' 00:00:00';
			$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31' . ' 23:59:59';
		} else {
			$thnpilihan1 = $thn . '-' . $bln . '-' . '01' . ' 00:00:00';
			$thnpilihan2 = $thn . '-' . $bln . '-' . '31' . ' 23:59:59';
		}
		if (empty($this->input->post('th'))) {
			$data['absen'] = $this->User_model->getAbsensiUser($id_peg);
		} else {
			$data['absen'] = $this->User_model->getAllUserAbsensi($thnpilihan1, $thnpilihan2, $id_peg);
		}
		$data['blnnya'] = $bln;
		$data['thn'] = $thn;

		$entryDate = "";
		$onCheck = false;
		$pass = false;
		$lembur = false;
		$data['recap'] = [];

		foreach ($data['absen'] as $key => $value) {
			if (!$onCheck) {
				if (strcmp($value['status'], "Lembur Masuk") == 0) {
					$lembur = true;
				}
			}
			if ($onCheck) {
				if ($lembur) {
					if (strcmp($value['status'], "Lembur Keluar") == 0) {
						$pass = true;
					}
				} else {
					if (strcmp($value['status'], "C/Keluar") == 0) {
						$pass = true;
					}
				}
			}
			if ($pass) {
				$exitDate = $value['datetime'];
				$date1 = DateTime::createFromFormat('d/m/Y H:i:s', $entryDate, new DateTimeZone('Asia/Jakarta'));
				$date2 = DateTime::createFromFormat('d/m/Y H:i:s', $exitDate, new DateTimeZone('Asia/Jakarta'));
				$dayNow = $date1->format('D'); // Extracting day of the week directly from $date1

				$dateInterval = $date1->diff($date2);
				$hours = $dateInterval->h;

				$hadirLembur  = "Lembur";
				if (strcmp("Sat", $dayNow) == 0 || strcmp("Sun", $dayNow) == 0) {
					$overtime = $hours;
				} else {
					$overtime = $hours - 8;
					$hadirLembur  = ($hours - 8 > 0) ? " Lembur" : "";
				}

				$dataEmployee = $this->Admin_model->getPegawaibyFingerId($value['id_fingerprint'])[0];
				$dataRecap = [
					"hadir" =>  "hadir" . $hadirLembur,
					"name" => $dataEmployee['nama_pegawai'],
					"id_pegawai" => $dataEmployee['id_pegawai'],
					"kode_verifikasi" => $value['verification_code'],
					"overtime" => $overtime,
					"date" => $entryDate . " - " . $exitDate,
					"day" => $dayNow
				];
				array_push($data['recap'], $dataRecap);
				$entryDate = "";
				$onCheck = false;
				$pass = false;
			} else if (!$onCheck) {
				$entryDate = $value['datetime'];
				$onCheck = true;
			}
		}


		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/absen_bulanan/index', $data);
		$this->load->view('backend/f_template/footer', $data);
	}
	public function detail_absen($id)
	{
		$data['title'] = 'Detail Absensi';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail_absensi'] = $this->Admin_model->getDetailAbsen($id);

		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/absen_bulanan/detail', $data);
		$this->load->view('backend/f_template/footer', $data);
	}

	public function ambil_absen()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$lat = $this->input->post('lat', true);
		$long = $this->input->post('long', true);
		$id_peg = $this->input->post('id_peg', true);
		$keterangan = $this->input->post('keterangan', true);
		$lat_kantor = -0.9498457511622372;
		$long_kantor =   100.42637899475633;
		date_default_timezone_set('Asia/Jakarta');
		$tgl_skrng = date('Y-m-d');
		$waktu =  date('H:i:s');
		//Upload foto selfie
		$jarak = $this->distance($lat, $long, $lat_kantor, $long_kantor, "K");
		if ($jarak <= 10000) {
			$upload_image = $_FILES['userfotoselfie']['name'];
			if ($upload_image) {
				$config['upload_path']          = './gambar/Absensi/';
				$config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('userfotoselfie')) {
					$new_image = $this->upload->data('file_name');
					$data = $this->db->set('foto_selfie_masuk', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				"id_pegawai" => $id_peg,
				"tanggal" => $tgl_skrng,
				"waktu" => $waktu,
				"keterangan" => $keterangan,
				"status" => 0,

			];

			$this->db->insert('tb_presents', $data);
			$this->session->set_flashdata('flash', 'Absen Masuk Anda Berhasil Masuk');
			redirect('pegawai/absen-harian');
		} else {
			$this->session->set_flashdata('s_absenggl', 'Absen Gagal, Anda Terlalu Jauh Dari Kantor');
			redirect('pegawai/absen-harian');
		}
	}

	public function ambil_absen_pulang()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$lat = $this->input->post('lat', true);
		$long = $this->input->post('long', true);
		$id_peg = $this->input->post('id_peg', true);
		$id_presents = $this->input->post('id_presents', true);
		$keterangan = $this->input->post('keterangan', true);
		$lat_kantor = -0.9498457511622372;
		$long_kantor =   100.42637899475633;
		date_default_timezone_set('Asia/Jakarta');
		$tgl_skrng = date('Y-m-d');
		$waktu =  date('H:i:s');
		//Upload foto selfie
		$jarak = $this->distance($lat, $long, $lat_kantor, $long_kantor, "K");
		if ($jarak <= 10000) {
			$upload_image = $_FILES['userfotoselfie']['name'];
			if ($upload_image) {
				$config['upload_path']          = './gambar/Absensi/';
				$config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('userfotoselfie')) {
					$new_image = $this->upload->data('file_name');
					$data = $this->db->set('foto_selfie_pulang', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				"id_pegawai" => $id_peg,
				"tanggal" => $tgl_skrng,
				"waktu" => $waktu,
				"keterangan" => $keterangan,
				"status" => 1,

			];

			$this->db->where('id_presents', $id_presents);
			$this->db->update('tb_presents', $data);
			$this->session->set_flashdata('flash', 'Absen Masuk Anda Berhasil Masuk');
			redirect('pegawai/absen-harian');
		} else {
			echo 'Anda Terlalu Jauh Dari Kantor';
		}
	}
	public function ambil_absen_lembur()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$lat = $this->input->post('lat', true);
		$long = $this->input->post('long', true);
		$id_peg = $this->input->post('id_peg', true);
		$id_presents = $this->input->post('id_presents', true);
		$keterangan = $this->input->post('keterangan', true);
		$lat_kantor = -0.9498457511622372;
		$long_kantor =   100.42637899475633;
		date_default_timezone_set('Asia/Jakarta');
		$tgl_skrng = date('Y-m-d');
		$waktu =  date('H:i:s');
		//Upload foto selfie
		$jarak = $this->distance($lat, $long, $lat_kantor, $long_kantor, "K");
		if ($jarak <= 10000) {
			$upload_image = $_FILES['userfotoselfie']['name'];
			if ($upload_image) {
				$config['upload_path']          = './gambar/Absensi/';
				$config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('userfotoselfie')) {
					$new_image = $this->upload->data('file_name');
					$data = $this->db->set('foto_selfie_pulang', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				"id_pegawai" => $id_peg,
				"tanggal" => $tgl_skrng,
				"waktu" => $waktu,
				"keterangan" => $keterangan,
			];

			$this->db->where('id_presents', $id_presents);
			$this->db->update('tb_presents', $data);
			$this->session->set_flashdata('flash', 'Absen Lembur Anda Berhasil Masuk');
			redirect('pegawai/absen-harian');
		} else {
			echo 'Anda Terlalu Jauh Dari Kantor';
		}
	}

	function distance($lat1, $lon1, $lat2, $lon2, $unit)
	{
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
			cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}


	public function cuti_pegawai()
	{
		$data['title'] = 'Dashboard';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id_peg = $this->input->post('id_peg', true);
		$jenis_izin = $this->input->post('jenisizin', true);
		$jenis_izin = $jenis_izin == 4 ? 'Sakit' : 'Izin';
		$keterangan = $this->input->post('penjelasan', true);


		$tglAwal = $this->input->post('tgl_awal', true);
		$tglAkhir = $this->input->post('tgl_akhir', true);

		$upload_image = $_FILES['suratsakit']['name'];
		if ($upload_image) {
			$config['upload_path']          = './gambar/Absensi/suratdokter/';
			$config['allowed_types']        = 'gif|jpg|png|PNG|jpeg';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('suratsakit')) {
				$new_image = $this->upload->data('file_name');
				$data = $this->db->set('surat', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$data = [
			"id_pegawai" => $id_peg,
			"jenis" => $jenis_izin,
			"keterangan" => $keterangan,
			"tanggal_awal" => $tglAwal,
			"tanggal_akhir" => $tglAkhir,
			"acc" => false,
		];

		$this->db->insert('izin', $data);
		$this->session->set_flashdata('flash', 'Izin Anda Akan Diproses');
		redirect('pegawai/absen-harian');
	}


	public function laporan_tpp_bulanan()
	{
		$data['title'] = 'Cetak Payrol Bulanan';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$userData = $this->db->get_where('tb_pegawai', ['id_user' => $data['user']['id']])->row_array();

		$data['fingerprint'] = $this->Admin_model->getFingerPrintAbsensi();
		$data['pegawai'] = $this->Admin_model->getPegawai();
		$data['list_th'] = $this->Admin_model->getTahunAbsensi();
		$data['list_bln'] = $this->Admin_model->getBlnAbsensi();

		$thn = $this->input->post('th');
		$bln = $this->input->post('bln');
		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;

		if ($bln < 10) {
			$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01' . ' 00:00:00';
			$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31' . ' 23:59:59';
		} else {
			$thnpilihan1 = $thn . '-' . $bln . '-' . '01' . ' 00:00:00';
			$thnpilihan2 = $thn . '-' . $bln . '-' . '31' . ' 23:59:59';
		}
		if (empty($this->input->post('th'))) {
			$data['absensi'] = $this->Admin_model->getAbsensi();
		} else {
			$data['absensi'] = $this->Admin_model->getAbsensibyDate($thnpilihan1, $thnpilihan2);
		}
		$data['blnnya'] = $bln;
		$data['thn'] = $thn;

		$entryDate = "";
		$onCheck = false;
		$pass = false;
		$lembur = false;
		$data['recap'] = [];
		foreach ($data['absensi'] as $key => $value) {
			if (!$onCheck) {
				if (strcmp($value['status'], "Lembur Masuk") == 0) {
					$lembur = true;
				}
			}
			if ($onCheck) {
				if ($lembur) {
					if (strcmp($value['status'], "Lembur Keluar") == 0) {
						$pass = true;
					}
				} else {
					if (strcmp($value['status'], "C/Keluar") == 0) {
						$pass = true;
					}
				}
			}
			if ($pass) {
				$exitDate = $value['datetime'];
				$date1 = DateTime::createFromFormat('d/m/Y H:i:s', $entryDate, new DateTimeZone('Asia/Jakarta'));
				$date2 = DateTime::createFromFormat('d/m/Y H:i:s', $exitDate, new DateTimeZone('Asia/Jakarta'));
				$dayNow = $date1->format('D');
				$dateInterval = $date1->diff($date2);
				$hours = $dateInterval->h;

				$hadirLembur  = "Lembur";
				if (strcmp("Sat", $dayNow) == 0 || strcmp("Sun", $dayNow) == 0) {
					$overtime = $hours;
				} else {
					$overtime = $hours - 8;
					$hadirLembur  = ($hours - 8 > 0) ? " Lembur" : "";
				}

				$dataEmployee = $this->Admin_model->getPegawaibyFingerId($value['id_fingerprint'])[0];
				$jabatan = $this->Admin_model->getJabatanById($dataEmployee['jabatan']);
				$dataRecap = [
					"hadir" =>  "hadir" . $hadirLembur,
					"name" => $dataEmployee['nama_pegawai'],
					"id_pegawai" => $dataEmployee['id_pegawai'],
					"kode_verifikasi" => $value['verification_code'],
					"overtime" => $overtime,
					"date" => $entryDate . " - " . $exitDate,
					"day" => $dayNow
				];
				array_push($data['recap'], $dataRecap);
				$entryDate = "";
				$onCheck = false;
				$pass = false;
			} else if (!$onCheck) {
				$entryDate = $value['datetime'];
				$onCheck = true;
			}
		}

		$data['gaji'] = [];

		// $this->checkData($data['recap']);

		foreach ($data['recap'] as $key => $recapValue) {
			$date = substr($recapValue['date'], 3, 7);
			if (count($data['gaji']) == 0) {
				$data['gaji'][$date] = [];
			} else {
				foreach ($data['gaji'] as $keyGaji => $gajiValue) {
					if (strcmp($keyGaji, $date) == 0) {
						break;
					} else {
						$data['gaji'][$date] = [];
					}
				}
			}

			$dataPenggajian = [];
			foreach ($data['gaji'] as $keyPegawai => $pegawaiValue) {
				$pegawai = $recapValue['id_pegawai'];
				if (count($data['gaji'][$date]) == 0) {
					$totalIzin = $this->Admin_model->totalIzinById($pegawai);
					$sakit = 0;
					$valueTotalIzin = 0;
					$izin = 0;
					foreach ($totalIzin as $value) {
						if ($value['acc'] == 1) {
							if (strcmp($value['jenis'], "Sakit") == 0) {
								$sakit += 1;
							} else {
								$izin += 1;
							}
							$valueTotalIzin += 1;
						}
					}
					$dataPenggajian = [
						"id_pegawai" => $recapValue['id_pegawai'],
						"name" => $recapValue['name'],
						"jabatan" => $jabatan['jabatan'],
						"gaji_pokok" => $jabatan['salary'],
						"lembur" => $recapValue['overtime'] * $jabatan['overtime'],
						"Tanggal" => $date,
						"jam_lembur" => $recapValue['overtime'],
						"value_pengurangan" => ($jabatan['salary'] / 30),
						"pengurangan" => ($jabatan['salary'] / 30) * $valueTotalIzin,
						"gaji_total" => "",
						"hadir" => 1,
						"tidak_hadir" => 0,
						"bonus" => $jabatan['bonus'],
						"sakit" => $sakit,
						"izin" => $izin,
						"gaji_bersih" => "-",
						"keterangan" => $valueTotalIzin,
					];
					array_push($data['gaji'][$date], $dataPenggajian);
				} else {
					foreach ($data['gaji'][$date] as $keyGajiDate => $valGajiDate) {
						if (strcmp($valGajiDate['id_pegawai'], $pegawai) == 0) {
							$data['gaji'][$date][$keyGajiDate]['jam_lembur'] += $recapValue['overtime'];
							$data['gaji'][$date][$keyGajiDate]['lembur'] += $recapValue['overtime'] * $jabatan['overtime'];
							$data['gaji'][$date][$keyGajiDate]['hadir'] += 1;
						} else {
							if ($keyGajiDate == count($data['gaji'][$date]) - 1) {
								$totalIzin = $this->Admin_model->totalIzinById($pegawai);
								$sakit = 0;
								$izin = 0;
								$valueTotalIzin = 0;
								foreach ($totalIzin as $value) {
									if ($value['acc'] == 1) {
										if (strcmp($value['jenis'], "Sakit") == 0) {
											$sakit += 1;
										} else {
											$izin += 1;
										}
										$valueTotalIzin += 1;
									}
								}
								$dataPenggajian = [
									"id_pegawai" => $recapValue['id_pegawai'],
									"name" => $recapValue['name'],
									"jabatan" => $jabatan['jabatan'],
									"gaji_pokok" => $jabatan['salary'],
									"lembur" => $recapValue['overtime'] * $jabatan['overtime'],
									"Tanggal" => $date,
									"jam_lembur" => $recapValue['overtime'],
									"value_pengurangan" => ($jabatan['salary'] / 30),
									"pengurangan" => ($jabatan['salary'] / 30) * $valueTotalIzin,
									"gaji_total" => "",
									"hadir" => 1,
									"tidak_hadir" => 0,
									"bonus" => $jabatan['bonus'],
									"sakit" => $sakit,
									"izin" => $izin,
									"keterangan" => $valueTotalIzin,
									"gaji_bersih" => "-",
								];
								array_push($data['gaji'][$date], $dataPenggajian);
							}
						}
					}
				}
			}
		}
		// $this->checkData($data['gaji'][$date]);
		// // 
		$dataFinal = [];

		$counter = 0;
		foreach ($data['gaji'] as $key => $value) {
			$workingDaysCount = $this->getWorkingDaysInMonth(intval(substr($key, 3, 5)), intval(substr($key, 1, 1)));
			foreach ($data['gaji'][$key] as $dateKey => $valueDate) {
				$data['gaji'][$key][$dateKey]['tidak_hadir'] = $workingDaysCount - $valueDate['hadir'] >= 0 ? $workingDaysCount - $valueDate['hadir'] : 0;
				$data['gaji'][$key][$dateKey]['pengurangan'] += ($data['gaji'][$key][$dateKey]['tidak_hadir'] * $valueDate['value_pengurangan']);
				if (strcmp($userData['id_pegawai'], $data['gaji'][$key][$dateKey]['id_pegawai'])) {
					array_push($dataFinal, $data['gaji'][$key][$dateKey]);
					$dataFinal[$counter]['date'] = $key;
					$counter += 1;
				}
			}
		}
		// $this->checkData($dataFinal);
		$data['dataFinal'] = $dataFinal;
		// return;

		$data['blnnya'] = $bln;
		$data['thn'] = $thn;

		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/laporan/laporan_tpp', $data);
		$this->load->view('backend/f_template/footer', $data);
	}

	public function getWorkingDaysInMonth($year, $month)
	{
		$totalDays = cal_days_in_month(CAL_GREGORIAN, intval($month), intval($year));

		$workingDaysCount = 0;

		for ($day = 1; $day <= $totalDays; $day++) {
			$date = "$year-$month-$day";
			$dayOfWeek = date('N', strtotime($date));

			if ($dayOfWeek >= 6) {
				continue;
			}

			// if ($this->isIndonesiaHoliday($date)) {
			// 	continue;
			// }

			$workingDaysCount++;
		}

		return $workingDaysCount;
	}

	//use if api avail
	public function isIndonesiaHoliday($date)
	{
		$year = date('Y', strtotime($date));
		$holidays = $this->Admin_model->getIndonesiaHolidays($year);
		foreach ($holidays as $holiday) {
			if ($holiday['date'] === $date) {
				return true;
			}
		}

		return false;
	}
	public function detail_laporan_tpp_bulanan($id_pegawai, $bln, $thn)
	{
		$data['title'] = 'detail Laporan Payrol Bulanan';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pegawai'] = $this->Admin_model->getAllpegawai();
		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;
		$data['id_pegawai'] = $id_pegawai;

		if ($bln < 10) {
			$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
			$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
		} else {
			$thnpilihan1 = $thn . '-' . $bln . '-' . '01';
			$thnpilihan2 = $thn . '-' . $bln . '-' . '31';
		}


		// var_dump($thnpilihan2);
		// die;
		// 
		$data['gaji'] = $this->Admin_model->getAllGajiByDateID($thnpilihan1, $thnpilihan2, $id_pegawai);
		$data['absen'] = $this->Admin_model->getAllLemburPegawaiById($thnpilihan1, $thnpilihan2, $id_pegawai);
		// var_dump($data['gaji']);
		// die;


		$this->load->view('backend/f_template/header', $data);
		$this->load->view('backend/f_template/topbar', $data);
		$this->load->view('backend/f_template/sidebar', $data);
		$this->load->view('backend/user/laporan/detail_laporan_tpp', $data);
		$this->load->view('backend/f_template/footer', $data);
	}
	public function cetak_payrol_pegawai($id_pegawai, $bln, $thn)
	{
		$data['title'] = 'Lembur Bulanan';
		// mengambil data user berdasarkan email yang ada di session

		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;

		// $data['petugas'] = $this->db->get_where('user')->result_array();
		// 


		if ($bln < 10) {
			$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
			$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
		} else {
			$thnpilihan1 = $thn . '-' . $bln . '-' . '01';
			$thnpilihan2 = $thn . '-' . $bln . '-' . '31';
		}
		// 
		$data['gaji'] = $this->Admin_model->getAllGajiByDateID($thnpilihan1, $thnpilihan2, $id_pegawai);
		$data['absen'] = $this->Admin_model->getAllLemburPegawaiById($thnpilihan1, $thnpilihan2, $id_pegawai);
		// var_dump($data['absen']);
		// die;

		$data['blnnya'] = $bln;
		$data['thn'] = $thn;
		$this->load->view('backend/admin/laporan/cetak', $data);
	}
}
