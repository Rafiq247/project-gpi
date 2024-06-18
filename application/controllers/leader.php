<?php
defined('BASEPATH') or exit('No direct script access allowed');

class leader extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk_leader') != TRUE) {
			$url = base_url('auth');
			redirect($url);
		};
		$this->load->library('form_validation');
		$this->load->model('leader_model');
		$this->load->model('supervisor_model');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konfirmasi_absen'] = $this->leader_model->konfirmasiAbsenById($data['user']['id']);


		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/dashboard/index', $data);
		$this->load->view('backend/l_template/footer');
	}

	public function visi_misi()
	{
		$data['title'] = 'Visi dan Misi';
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/dashboard/visimisi', $data);
		$this->load->view('backend/l_template/footer');
	}

	public function sejarah()
	{
		$data['title'] = 'Sejarah Perusahaan';
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/dashboard/sejarah', $data);
		$this->load->view('backend/l_template/footer');
	}
	public function edit_profil($id)
	{
		$data['title'] = 'Edit Profil';
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$nama = $this->input->post('nama', true);


		//foto dan ktp 
		$upload_image = $_FILES['userfilefoto']['name'];
		if ($upload_image) {
			$config['upload_path']          = './gambar/pegawai/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|PNG';
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
			redirect('leader');
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
			redirect('leader');
		}
		// 
	}
	public function edit_password($id)
	{
		$data['title'] = 'Edit Password';
		// mengambil data leader berdasarkan email yang ada di session
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
				redirect('leader');
			} else {
				$this->session->set_flashdata('flash', 'Konfirmasi Password Berbeda!');
				redirect('leader');
			}
		} else {
			$this->session->set_flashdata('flash', 'Password Lama Salah!');
			redirect('leader');
		}
	}

	public function absen_harian()
	{
		$data['title'] = 'Dashboard';
		$months = (int)$this->leader_model->getPegawaiTotalMonth($this->session->userdata('id')); // hitung berapa lama pegawai dari tanggal masuk ke sekarang
		$used_cuti = (int)$this->leader_model->getUsedCuti($this->session->userdata('id')); // hitung berapa lama pegawai dari tanggal masuk ke sekarang
		// mengambil data user berdasarkan email yang ada di session
		$data['used_cuti'] = $used_cuti;
		$data['pegawai_month'] = $months;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pegawai'] = $this->leader_model->PegawaiById($data['user']['id']);
		$data['absensi'] = $this->leader_model->izinById($data['pegawai']['id_pegawai']);

		$isi = $this->leader_model->AbsenByStatusId($data['user']['id']);

		if ($isi) {
			$data['absen'] = $isi;
		} else {
			$data['absen']['keterangan'] = "";
			$data['absen']['id_pegawai'] = "peg";
		}
		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/absensekarang/index', $data);
		$this->load->view('backend/l_template/footer');
	}

	public function konfirmasi_absen()
	{
		$data['title'] = 'Konfirmasi Absen';
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konfirmasi_absen'] = $this->leader_model->konfirmasiAbsenById($data['user']['id']);

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/konfirmasi_absen/index', $data);
		$this->load->view('backend/l_template/footer');
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
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$thn = $this->input->post('th');
		$bln = $this->input->post('bln');
		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;
		$data['pegawai'] = $this->db->get_where('tb_pegawai', ['id_user' => $data['user']['id']])->row_array();
		$id_peg = $data['pegawai']['id_pegawai'];
		// $data['petugas'] = $this->db->get_where('leader')->result_array();
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
			$data['absen'] = $this->leader_model->getAbsensiUser($id_peg);
		} else {
			$data['absen'] = $this->leader_model->getAllUserAbsensi($thnpilihan1, $thnpilihan2, $id_peg);
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


		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/absen_bulanan/index', $data);
		$this->load->view('backend/l_template/footer', $data);
	}
	public function detail_absen($id)
	{
		$data['title'] = 'Detail Absensi';
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail_absensi'] = $this->Admin_model->getDetailAbsen($id);

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/absen_bulanan/detail', $data);
		$this->load->view('backend/l_template/footer', $data);
	}

	public function ambil_absen()
	{
		$data['title'] = 'Dashboard';
		// mengambil data leader berdasarkan email yang ada di session
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
			redirect('leader/absen-harian');
		} else {
			$this->session->set_flashdata('s_absenggl', 'Absen Gagal, Anda Terlalu Jauh Dari Kantor');
			redirect('leader/absen-harian');
		}
	}

	public function ambil_absen_pulang()
	{
		$data['title'] = 'Dashboard';
		// mengambil data leader berdasarkan email yang ada di session
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
			redirect('leader/absen-harian');
		} else {
			echo 'Anda Terlalu Jauh Dari Kantor';
		}
	}
	public function ambil_absen_lembur()
	{
		$data['title'] = 'Dashboard';
		// mengambil data leader berdasarkan email yang ada di session
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
			redirect('leader/absen-harian');
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
		// mengambil data leader berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id_peg = $this->input->post('id_peg', true);
		$jenis_izin = $this->input->post('jenisizin', true);
		$jenis_izin = ($jenis_izin == 4) ? 'Sakit' : (($jenis_izin == 5) ? 'Izin' :  'Cuti');
		$keterangan = $this->input->post('penjelasan', true);


		$tglAwal = date('Y/m/d', strtotime($this->input->post('tgl_awal', true)));
		$tglAkhir = date('Y/m/d', strtotime($this->input->post('tgl_akhir', true)));

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
			"role_id" => $this->session->userdata('role_id'),
			"tanggal_akhir" => $tglAkhir,
			"acc" => false,
		];

		$this->db->insert('izin', $data);
		$this->session->set_flashdata('flash', 'Izin Anda Akan Diproses');
		redirect('leader/absen-harian');
	}


	public function laporan_tpp_bulanan()
	{
		$data['title'] = 'Payrol Bulanan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
			$data['absensi'] = $this->supervisor_model->getAbsensi();
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
					if (strcmp("Sun", $dayNow) == 0) {
						$overtime = $hours + 3; // Menambahkan waktu 3 jam di hari Minggu
					} else {
						$overtime = $hours; // Jumlah jam kerja pada Sabtu
					}
				} else {
					$overtime = $hours - 8;
					$hadirLembur  = ($hours - 8 > 0) ? " Lembur" : "";
				}

				$dataEmployee = $this->Admin_model->getPegawaibyFingerId($value['id_fingerprint'])[0];
				$jabatan_loop[$dataEmployee['id_pegawai']] = $this->Admin_model->getJabatanById($dataEmployee['jabatan']);

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
				$jabatan = $jabatan_loop[$pegawai];
				$hasilJamSos = $this->Admin_model->getBpjs_jamsos_total($pegawai);
				$hasilKes = $this->Admin_model->getBpjs_kes_total($pegawai);
				if (count($data['gaji'][$date]) == 0) {
					$totalIzin = $this->Admin_model->totalIzinById($pegawai);
					$sakit = 0;
					$valueTotalIzin = 0;
					$izin = 0;
					$cuti = 0;
					$valueTotalSakit = 0;
					foreach ($totalIzin as $value) {
						if ($value['acc'] == 1) {
							if (strcmp($value['jenis'], "Sakit") == 0) {
								$sakit += 1;
								$valueTotalSakit += 1;
							} elseif (strcmp($value['jenis'], "Izin") == 0) {
								$izin += 1;
								$valueTotalIzin += 1;
							} else {
								$cuti += 1;
							}
						}
					}
					// $pengurangan = ($jabatan['salary'] / 30) * $valueTotalIzin;
					// check id pegawainya ada gak $pegawai
					if (empty($this->db->from("bpjs_kes")->where("id_pegawai", $pegawai)->get()->row_array())) {
						$pengurangan = ($jabatan['salary'] / 30) * $valueTotalSakit + ($jabatan['salary'] / 30) * $valueTotalIzin;
					} else {
						$pengurangan = ($jabatan['salary'] / 30) * $valueTotalIzin;
					}
					$dataPenggajian = [
						"id_pegawai" => $recapValue['id_pegawai'],
						"name" => $recapValue['name'],
						"jabatan" => $jabatan['jabatan'],
						"gaji_pokok" => $jabatan['salary'],
						"total_iuran_sos" => $hasilJamSos,
						"total_iuran_kes" => $hasilKes,
						"lembur" => $recapValue['overtime'] * $jabatan['overtime'],
						"Tanggal" => $date,
						"jam_lembur" => $recapValue['overtime'],
						"value_pengurangan" => ($jabatan['salary'] / 30),
						"pengurangan" => $pengurangan,
						"gaji_total" => "",
						"hadir" => 1,
						"tidak_hadir" => 0,
						"bonus" => $jabatan['bonus'],
						"sakit" => $sakit,
						"izin" => $izin,
						"cuti" => $cuti,
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
								$valueTotalIzin = 0;
								$izin = 0;
								$cuti = 0;
								$valueTotalSakit = 0;
								foreach ($totalIzin as $value) {
									if ($value['acc'] == 1) {
										if (strcmp($value['jenis'], "Sakit") == 0) {
											$sakit += 1;
											$valueTotalSakit += 1;
										} elseif (strcmp($value['jenis'], "Izin") == 0) {
											$izin += 1;
											$valueTotalIzin += 1;
										} else {
											$cuti += 1;
										}
									}
								}
								// $pengurangan = ($jabatan['salary'] / 30) * $valueTotalIzin;
								// check id pegawainya ada gak $pegawai
								if (empty($this->db->from("bpjs_kes")->where("id_pegawai", $pegawai)->get()->row_array())) {
									$pengurangan = ($jabatan['salary'] / 30) * $valueTotalSakit + ($jabatan['salary'] / 30) * $valueTotalIzin;
								} else {
									$pengurangan = ($jabatan['salary'] / 30) * $valueTotalIzin;
								}
								$dataPenggajian = [
									"id_pegawai" => $recapValue['id_pegawai'],
									"name" => $recapValue['name'],
									"jabatan" => $jabatan['jabatan'],
									"gaji_pokok" => $jabatan['salary'],
									"total_iuran_sos" => $hasilJamSos,
									"total_iuran_kes" => $hasilKes,
									"lembur" => $recapValue['overtime'] * $jabatan['overtime'],
									"Tanggal" => $date,
									"jam_lembur" => $recapValue['overtime'],
									"value_pengurangan" => ($jabatan['salary'] / 30),
									"pengurangan" => $pengurangan,
									"gaji_total" => "",
									"hadir" => 1,
									"tidak_hadir" => 0,
									"bonus" => $jabatan['bonus'],
									"sakit" => $sakit,
									"izin" => $izin,
									"cuti" => $cuti,
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
		// 
		foreach ($data['gaji'] as $key => $value) {
			$workingDaysCount = $this->getWorkingDaysInMonth(intval(substr($key, 3, 5)), intval(substr($key, 1, 1)));
			foreach ($data['gaji'][$key] as $dateKey => $valueDate) {
				$data['gaji'][$key][$dateKey]['tidak_hadir'] = $workingDaysCount - $valueDate['hadir'] >= 0 ? $workingDaysCount - $valueDate['hadir'] : 0;
				$data['gaji'][$key][$dateKey]['pengurangan'] += ($data['gaji'][$key][$dateKey]['tidak_hadir'] * $valueDate['value_pengurangan']);
			}
		}

		// return;
		// $this->checkData($data['gaji']);

		// return;

		$data['blnnya'] = $bln;
		$data['thn'] = $thn;

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/laporan/laporan_tpp', $data);
		$this->load->view('backend/l_template/footer', $data);
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


		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/laporan/detail_laporan_tpp', $data);
		$this->load->view('backend/l_template/footer', $data);
	}
	public function cetak_payrol_pegawai($id_pegawai, $bln, $thn)
	{
		$data['title'] = 'Lembur Bulanan';
		// mengambil data leader berdasarkan email yang ada di session

		$data['blnselected'] = $bln;
		$data['thnselected'] = $thn;

		// $data['petugas'] = $this->db->get_where('leader')->result_array();
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
		$this->load->view('backend/leader/laporan/cetak', $data);
	}

	// Konfirmasi Izin Pegawai
	public function konfirmasi_pegawai()
	{
		$data['title'] = 'Tampil Konfirmasi';
		$data['user'] = $this->db->query('SELECT user.*,tb_pegawai.id_pegawai,tb_pegawai.devisi, tb_pegawai.jabatan from user, tb_pegawai where tb_pegawai.id_user=user.id and user.email = ?', [$this->session->userdata('email')])->first_row("array");
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if (isset($data['user']['devisi'])) {
			$id_jabatan = $data['user']['devisi'];
			$data['absensi'] = $this->leader_model->getIzinPegawai($id_jabatan);
			// var_dump($this->session->userdata());
			// exit;
			foreach ($data['absensi'] as $key => $value) {
				$data['absensi'][$key]['pegawai'] = $this->leader_model->getPegawaiById($value['id_pegawai']);
				// $this->checkData($data['absensi'][$key]['pegawai'][0]);
			}
		}

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/konfirmasi_pegawai/index', $data);
		$this->load->view('backend/l_template/footer');
	}

	public function konfirmasi_izin_pegawai($id)
	{
		$data['title'] = 'Lembur Hari Ini';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data = [
			"status" => 1,
		];
		$this->db->where('id_presents', $id);
		$this->db->update('tb_presents', $data);
		$this->session->set_flashdata('flash', 'Absen Masuk Berhasil Dikonfirmasi');
		redirect('leader/tampil-konfirmasi');
	}

	public function konfirmasi_absen_pulang($id)
	{
		$data['title'] = 'Lembur Hari Ini';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data = [
			"status" => 2,
		];
		$this->db->where('id_presents', $id);
		$this->db->update('tb_presents', $data);
		$this->session->set_flashdata('flash', 'Absen Pulang Berhasil Dikonfirmasi');
		redirect('leader/tampil-konfirmasi');
	}

	public function konfirmasi_absen_lembur($id, $id_peg)
	{
		$data['title'] = 'Lembur Hari Ini';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$lembur = $this->leader_model->getPegawaiByLemburTanggal($id_peg);
		$id_lembur = $lembur['id_lembur'];
		// var_dump($id_lembur);
		// die;
		$data = [
			"status" => 3,
			"id_lembur" => $id_lembur,
		];
		$this->db->where('id_presents', $id);
		$this->db->update('tb_presents', $data);
		$this->leader_model->InsertTbLembur($id_peg);
		$this->session->set_flashdata('flash', 'Data Lembur Berhasil Dikonfirmasi');
		redirect('leader/tampil-konfirmasi');
	}

	public function konfirmasi_absen_izin_sakit($id)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data = [
			"status" => 4,
		];
		$this->db->where('id_presents', $id);
		$this->db->update('tb_presents', $data);

		$this->session->set_flashdata('flash', 'Data Lembur Berhasil Dikonfirmasi');
		redirect('leader/tampil-konfirmasi');
	}
	public function konfirmasi_absen_izin_tdkmsk($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data = [
			"status" => 5,
		];
		$this->db->where('id_presents', $id);
		$this->db->update('tb_presents', $data);
		$this->session->set_flashdata('flash', 'Data Lembur Berhasil Dikonfirmasi');
		redirect('leader/tampil-konfirmasi');
	}

	public function izinStatusAcc($id)
	{
		// anuan get jabatan
		$data = array(
			"acc" => "4",
			"acc_by" => $this->session->userdata('name'),
		);
		$this->db->where('id', $id);
		$this->db->update('izin', $data);
		redirect('leader/tampil-konfirmasi');
	}

	public function izinStatusDenied($id)
	{

		$data = array(
			"acc" => "6",
			"acc_by" => $this->session->userdata('name'),
		);
		$this->db->where('id', $id);
		$this->db->update('izin', $data);
		redirect('leader/tampil-konfirmasi');
	}

	public function izinStatusDelete($id)
	{
		$keteranganTolak = $this->input->get('keterangan', true);
		$data = array(
			"acc" => "9",
			"penolakan" => $keteranganTolak,
			"acc_by" => $this->session->userdata('name'),
		);
		$this->db->where('id', $id);
		$this->db->update('izin', $data);
		redirect('leader/tampil-konfirmasi');
	}

	public function pegawai()
	{
		$data['title'] = 'Data Pegawai';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->query('SELECT user.*,tb_pegawai.id_pegawai,tb_pegawai.devisi, tb_pegawai.jabatan from user, tb_pegawai where tb_pegawai.id_user=user.id and user.email = ?', [$this->session->userdata('email')])->first_row("array");

		if (isset($data['user']['devisi'])) {
			$id_jabatan = $data['user']['devisi'];
			$data['pegawai'] = $this->leader_model->getAllpegawai($id_jabatan);
			foreach ($data['pegawai'] as $key => $value) {
				$data['pegawai'][$key]['pegawai'] = $this->leader_model->getAlljabatan($value['id_pegawai']);
				// $this->checkData($data['pegawai'][$key]['jabatan'][0]);
			}
		}
		$data['jekel'] = ['L', 'P'];
		$data['stapeg'] = [1, 0];
		$data['agama'] = ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Budha', 'Khonghucu'];
		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/pegawai/index', $data);
		$this->load->view('backend/l_template/footer');
	}

	public function detail_pegawai($id)
	{
		$data['title'] = 'Data Pegawai';
		// mengambil data user berdasarkan email yang ada di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail_pegawai'] = $this->leader_model->getDetailpegawai($id);
		// echo json_encode($data['detail_pegawai']); exit;

		$this->load->view('backend/l_template/header', $data);
		$this->load->view('backend/l_template/topbar', $data);
		$this->load->view('backend/l_template/sidebar', $data);
		$this->load->view('backend/leader/pegawai/detail', $data);
		$this->load->view('backend/l_template/footer');
	}
}
