<!DOCTYPE html>
<html>

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
			<h4 class="text-center">..::PT.PESONA MAJOLELO PROPERTY::..</h4>
			<center>
				<h6 class="text-center"><small>
						Majolelo Hotel & Townhouse<br>
						Jl.Alai Parak Kopi, Kec. Padang Utara, Kota Padang, Sumatera Barat<br>
						e-mail : perumahanmajolelo@gmail.com <br>
						Padang - Indonesia
					</small>
				</h6>
			</center>
			<hr>
			<tr height="40px">
				<td colspan=11 class="align-middle">
					<b>
						<h6><b><u>DATA PEGAWAI :</u></b></h6>
					</b>
				</td>
			</tr>
			<tr>
				<td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;NO PEGAWAI</b></td>
				<td colspan=4><b><?= strtoupper($gaji['id_pegawai']) ?></b></td>
			</tr>
			<tr>
				<td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;NAMA PEGAWAI</b></td>
				<td colspan=4><b><?= strtoupper($gaji['name']) ?></b></td>
			<tr>
				<td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;PERIODE</b></td>
				<!-- <td colspan=4> <b><?= nmbulan(substr($gaji['tanggal'], 5, 2)) ?></b></td> -->
				<td colspan=4> <b><?= nmbulan(substr($gaji['tanggal'], 0, 2)) ?></b></td>
			</tr>
			<tr>
				<td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;JABATAN</b>
				<td colspan=4><b><?= strtoupper($gaji['jabatan']) ?></b></td>
			</tr>
			<tr height="40px">
				<td colspan=11 class="align-middle">
					<b>
						<h6><b><u>PENERIMAAN :</u></b></h6>
					</b>
				</td>
			</tr>

			<tr>
				<th width=44 scope=col class="text-center">1</th>
				<th width=300 scope=col>Gaji Pokok </th>
				<th width=508 scope=col colspan="5"><?= rupiah($gaji['gaji']) ?></th>
			</tr>
			<tr>
				<th width=44 scope=col class="text-center">2</th>
				<th width=300 scope=col>Upah Lembur </th>
				<th width=508 scope=col colspan="5"> + <?= rupiah($gaji['lembur']) ?></th>
			</tr>
			<tr>
				<th width=44 scope=col class="text-center">3</th>
				<th width=300 scope=col>Bonus</th>
				<th width=508 scope=col colspan="5"> + <?= rupiah($gaji['bonus']) ?></th>
			</tr>
			<tr>
				<th width=44 scope=col class="text-center">4</th>
				<th width=300 scope=col>Pengurangan</th>
				<th width=508 scope=col colspan="5"> - <?= rupiah($gaji['pengurangan']) ?></th>
			</tr>
			<tr height="50px">
				<td colspan=10 class="align-middle">
					<center>
						<h5 class="align-middle"><b>total gaji bersih anda : <?= rupiah($gaji['gaji_bersih']) ?> </b></h5>
					</center>
				</td>
			</tr>
			<tr height="40px">
				<td colspan=11><b>
					</b>
				</td>
			</tr>

			<tr>
				<td colspan=4 align='center'><b>KETERANGAN</b></td>
				<td colspan=2 align='center' colspan="3"><b> ABSENSI/KEHADIRAN</b></td>
			</tr>
			<tr>
				<td colspan=4 rowspan="5" align='center' class="align-middle"><b><?= $gaji['keterangan'] ?></b></td>
				<!-- <td align='center' colspan="3"><b> Masuk : <?= $gaji['masuk'] ?></b></td> -->
			</tr>

			<tr>
				<td align='center' colspan="3"><b> Masuk : <?= $gaji['hadir'] ?> Hari</b></td>
			</tr>
			<tr>

				<td align='center' colspan="3"><b> Lembur : <?= $gaji['jam_lembur'] ?> Jam</b></td>
			</tr>


			<tr>
				<td align='center' colspan="3"><b> Izin Sakit : <?= $gaji['sakit'] ?> Hari</b></td>
			</tr>
			<tr>

				<td align='center' colspan="3"><b> Izin Tidak Masuk : <?= $gaji['izin'] ?> Hari</b></td>
			</tr>


		</table> <!-- tutup isi -->


		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center"><br>
					<br><b>Penanggung Jawab<br><br><br><br><br> HRD</b>
				</td>
			</tr>
		</table>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
