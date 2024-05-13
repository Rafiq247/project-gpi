<!DOCTYPE html>
<html>

<?php
// Mendapatkan tanggal saat ini dalam format 'Y-m-d'
$tanggal = date('Y-m-d');

// Membuat objek DateTime dari tanggal saat ini
$tanggal_objek = new DateTime($tanggal);

// Mendapatkan nama bulan dalam bentuk teks dengan format 'F'
$nama_bulan = $tanggal_objek->format('F');

// Mendapatkan tanggal dengan format 'd'
$tanggal_angka = $tanggal_objek->format('d');

// Mendapatkan tahun dengan format 'Y'
$tahun = $tanggal_objek->format('Y');

// Menggabungkan semua komponen untuk membentuk format yang diinginkan
$hasil = $tanggal_angka . ' ' . $nama_bulan . ' ' . $tahun;
?>


<?php
// $this->load->view('backend/template/header');
function rupiah($angka)
{

	$hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.') . "-,";
	return $hasil_rupiah;
}

function nmbulan($angka)
{

	switch ($angka) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
?>

<head>
	<title>CETAK PAYROL PEGAWAI</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body <?php if ($this->uri->segment(2) === 'cetak-payrol-pegawai') : ?> onload="window.print()" <?php else : endif; ?>>
	<center>
		<!-- isi -->
		<table id="" class="table table-bordered">
			<h5 class="text-center">Slip Gaji</h5>
			<hr>
			<tr height="40px">
				<td colspan=11 class="align-middle">
					<b>
						<h6><b>Nama    : </b><?= strtoupper($gaji['name']) ?></h6>
						<h6><b>Devisi  : </b><?= strtoupper($gaji['jabatan']) ?></h6>
						<h6><b>Periode : </b><?= nmbulan(substr($gaji['tanggal'], 0, 2 )) . ' ' . substr($gaji['tanggal'], 3, 4) ?></h6>
					</b>
				</td>
			</tr>
						<tr height="40px">
				<td colspan=11 class="align-middle" style="vertical-align: middle;">
						<h6><b>PENERIMAAN :</b></h6>
				</td>
			</tr>

			<tr>
				<th width=300 scope=col style="vertical-align: middle;">Gaji Pokok </th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"><?= rupiah($gaji['gaji']) ?></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">Pengurangan Gaji Pokok</th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"> - <?= rupiah($gaji['pengurangan']) ?></th>
			</tr>
			<tr height="40px">
				<th width=300 scope=col style="vertical-align: middle;"></th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"><?= rupiah($gaji['gaji'] - $gaji['pengurangan']) ?></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">Upah Lembur </th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"> + <?= rupiah($gaji['lembur']) ?></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">Rapel Bonus</th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"> + <?= rupiah($gaji['bonus']) ?></th>
			</tr>
			<tr height="40px">
				<th width=300 scope=col style="vertical-align: middle;"></th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"><?= rupiah(($gaji['gaji'] - $gaji['pengurangan']) + $gaji['lembur'] + $gaji['bonus']) ?></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">BPJS Ketenagakerjaan </th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">BPJS Kesehatan</th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">BPJS Kes Tamb Kel</th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"></th>
			</tr>
			<tr>
				<th width=300 scope=col style="vertical-align: middle;">PPH</th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"></th>
			</tr>
			<tr height="60px">
				<th width=300 scope=col style="vertical-align: middle;">Total Gaji Bersih Anda </th>
				<th width=508 scope=col colspan="5" style="vertical-align: middle;"><?= rupiah($gaji['gaji_bersih']) ?></th>
			</tr>
		</table> <!-- tutup isi -->


		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center"><br>
					<br><b>Jakarta, <?php echo $hasil; ?><br><br><br><br><br> HRD</b>
				</td>
			</tr>
		</table>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
