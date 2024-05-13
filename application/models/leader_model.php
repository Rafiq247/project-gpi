<?php


class leader_model extends CI_model
{
	public function konfirmasiAbsenById($id)
	{
		$tgl_skrng = date('Y-m-d');
		$sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai as nampeg from tb_pegawai,tb_presents  where tb_presents.id_pegawai=tb_pegawai.id_pegawai and tb_pegawai.id_user='$id' and tb_presents.tanggal='$tgl_skrng'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllpegawai($id_jabatan = null)
	{
		$sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai, jabatan where jabatan.id_jabatan=tb_pegawai.jabatan";
		if (!is_null($id_jabatan)) {
			$sql.= " AND tb_pegawai.jabatan IN ($id_jabatan, $id_jabatan + 10, $id_jabatan + 20, $id_jabatan + 30, $id_jabatan + 40, $id_jabatan + 50, $id_jabatan + 60, $id_jabatan + 70, $id_jabatan + 80, $id_jabatan + 90)";
		}
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAlljabatan()
	{
		$sql = "SELECT * from jabatan";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getDetailpegawai($id)
	{
		$sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai, jabatan where jabatan.id_jabatan=tb_pegawai.jabatan and tb_pegawai.id_pegawai='$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}


	public function PegawaiById($id)
	{
		$sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai,jabatan  where tb_pegawai.jabatan=jabatan.id_jabatan and tb_pegawai.id_user='$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getPegawaiById($id)
	{
		$sql = "SELECT * FROM `db_kepegawaian`.`tb_pegawai` WHERE `id_pegawai` = '$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getPegawaiByLemburTanggal()
	{
		$tgl_skrng = date('Y-m-d');
		$sql = "SELECT tb_lembur.* from tb_lembur,tb_presents where tb_lembur.id_pegawai=tb_presents.id_pegawai and tb_presents.tanggal='$tgl_skrng'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function InsertTbLembur($id_peg)
	{
		$tgl_skrng = date('Y-m-d');
		$sql = "UPDATE tb_lembur SET status = 1 WHERE date ='$tgl_skrng' and id_pegawai='$id_peg'";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function AbsenByStatusId($id_user)
	{
		$tgl_skrng = date('Y-m-d');
		$sql = "SELECT tb_presents.*, tb_pegawai.nama_pegawai as nampeg from tb_pegawai,tb_presents  where tb_presents.id_pegawai=tb_pegawai.id_pegawai and tb_pegawai.id_user='$id_user' and tb_presents.tanggal='$tgl_skrng'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function cek_lemburById($id_peg)
	{
		$tgl_skrng = date('Y-m-d');
		$sql = "SELECT * from tb_lembur  where tb_lembur.id_pegawai='$id_peg' and tb_lembur.date='$tgl_skrng'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getAbsensiUser($id)
	{
		$sql = "SELECT * FROM `absensi_pegawai` WHERE `absensi_pegawai`.`id_pegawai` = '$id'";
		$result = $this->db->query($sql);
		if ($result->row_array() == 0) {
			return [];
		}
		$idFingerprint = $result->result_array()[0]["id_fingerprint"];
		$sql = "SELECT * FROM `absensi` WHERE `absensi`.`id_fingerprint` = '$idFingerprint'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllUserAbsensi($date1, $date2, $id)
	{
		$sql = "SELECT * FROM `absensi_pegawai` WHERE `absensi_pegawai`.`id_pegawai` = '$id'";
		$result = $this->db->query($sql);
		$idFingerprint = $result->result_array()[0]["id_fingerprint"];
		$sql = "SELECT * FROM `absensi` WHERE `absensi`.`id_fingerprint` = '$idFingerprint' AND STR_TO_DATE(`absensi`.`datetime`, '%d/%m/%Y %H:%i:%s') BETWEEN '$date1' AND '$date2'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function izinById($id)
	{
		$sql = "SELECT * FROM `izin` WHERE `izin`.`id_pegawai` = '$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getIzin()
	{
		$sql = "SELECT * FROM `izin`";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getIzinPegawai($id_jabatan = null)
	{
		$sql = "SELECT * FROM izin JOIN tb_pegawai ON izin.id_pegawai = tb_pegawai.id_pegawai WHERE izin.role_id = 4";
		if (!is_null($id_jabatan)) {
			$sql.= " AND tb_pegawai.jabatan IN ($id_jabatan, $id_jabatan + 10, $id_jabatan + 20, $id_jabatan + 30, $id_jabatan + 40, $id_jabatan + 50, $id_jabatan + 60, $id_jabatan + 70, $id_jabatan + 80, $id_jabatan + 90)";
		}
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function totalIzinById($id)
	{
		$sql = "SELECT * FROM `izin` WHERE `izin`.`id_pegawai` = '$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllLemburPegawai($tgl1, $tgl2)
	{

		// $sql = "SELECT DISTINCT tb_pegawai.nama_pegawai, jabatan.jabatan as namjab,
		//             (select COUNT(keterangan) from tb_presents where keterangan='3') as jumlem,
		//             (select COUNT(keterangan) from tb_presents where keterangan='2') as masuk,
		//             (select COUNT(keterangan) from tb_presents where keterangan='4') as sakit,
		//             (select COUNT(keterangan) from tb_presents where keterangan='5') as izin
		//              from tb_presents,jabatan, tb_pegawai  where tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan 
		//             and tb_presents.tanggal between '$tgl1' and '$tgl2' GROUP BY tb_presents.id_pegawai;
		//     ";

		$sql = "SELECT DISTINCT tb_pegawai.nama_pegawai, jabatan.jabatan as namjab,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '3') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS jumlem,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '2') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS masuk,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '4') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS sakit,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '5') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS izin
    from tb_presents,jabatan, tb_pegawai  where tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan 
    and tb_presents.tanggal between '$tgl1' and '$tgl2' GROUP BY tb_presents.id_pegawai";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllLemburPegawaiById($tgl1, $tgl2, $id_peg)
	{
		// nanti edit select COUNT(keterangan) from tb_presents where keterangan='3' and tanggal between '$tgl1' and '$tgl2' and id_pegawai='$id_peg';
		$sql = "SELECT DISTINCT tb_pegawai.nama_pegawai, jabatan.jabatan as namjab,
                (SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '3') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS jumlem,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '2') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS masuk,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '4') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS sakit,
		(SELECT COUNT(keterangan) FROM tb_presents WHERE (keterangan = '5') AND (tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan) AND (tanggal between '$tgl1' and '$tgl2')) AS izin
                 from tb_presents,jabatan, tb_pegawai  where tb_presents.id_pegawai= tb_pegawai.id_pegawai and tb_pegawai.jabatan=jabatan.id_jabatan 
                and tb_presents.tanggal between '$tgl1' and '$tgl2' and tb_presents.id_pegawai='$id_peg';
        ";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getPegawaiTotalMonth($id_user)
	{
		// $sql = ;
		$result_q = $this->db->query("SELECT * FROM `tb_pegawai` WHERE id_user = ?", [$id_user]);
		$result =  $result_q->row();
		$date1 = date_create($result->tanggal_masuk);
		$date2 = date_create();
		$diff = date_diff($date1, $date2);
		return $diff->format("%a");
	}

	public function getIdPegawaiByIdUser($id_user)
	{
		$result_q = $this->db->query("SELECT * FROM `tb_pegawai` WHERE id_user = ?", [$id_user]);
		$result =  $result_q->row();
		return $result->id_pegawai;
	}
	
	public function getUsedCuti(string $id_user)
	{
		$idPegawai = $this->getIdPegawaiByIdUser($id_user);
		$result_q = $this->db->query("SELECT id, id_pegawai, SUM(DATEDIFF(tanggal_akhir, tanggal_awal) + 1) AS jumlah_hari FROM `izin` where id_pegawai= ? and jenis = 'cuti' and YEAR(tanggal_awal) = YEAR(CURRENT_DATE()) AND YEAR(tanggal_akhir) = YEAR(CURRENT_DATE());", [$idPegawai]);
		$result =  $result_q->row();
		return $result->jumlah_hari;
	}
}
