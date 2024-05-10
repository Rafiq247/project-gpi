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

	public function PegawaiById($id)
	{
		$sql = "SELECT tb_pegawai.*, jabatan.jabatan as namjab from tb_pegawai,jabatan  where tb_pegawai.jabatan=jabatan.id_jabatan and tb_pegawai.id_user='$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
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
}
