 <!--Content right-->

 <?php

	function hariIndo($hariInggris)
	{
		switch ($hariInggris) {
			case 'Sunday':
				return 'Minggu';
			case 'Monday':
				return 'Senin';
			case 'Tuesday':
				return 'Selasa';
			case 'Wednesday':
				return 'Rabu';
			case 'Thursday':
				return 'Kamis';
			case 'Friday':
				return 'Jumat';
			case 'Saturday':
				return 'Sabtu';
			default:
				return 'hari tidak valid';
		}
	}

	$hariBahasaInggris = date('l');
	$hari = hariIndo($hariBahasaInggris);

	?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script type="text/javascript" src="jamServer.js"></script>
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
 	<?php if ($this->session->flashdata('flash')) : ?>
 		<div class="alert alert-info alert-dismissible fade show" role="alert">
 			<p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 				<span aria-hidden="true">&times;</span>
 			</button>
 			<?= $this->session->unset_userdata('flash'); ?>
 		</div>
 	<?php endif ?>
 	<?php if ($this->session->flashdata('s_absenggl')) : ?>
 		<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			<p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('s_absenggl'); ?></strong></p>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 				<span aria-hidden="true">&times;</span>
 			</button>
 			<?= $this->session->unset_userdata('s_absenggl'); ?>
 		</div>
 	<?php endif ?>
 	<div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
 		<div class="row border-bottom mb-4">
 			<div class="col-sm-8 pt-2">
 				<h6 class="mb-4 bc-header"><?= $title ?></h6>
 			</div>
 			<!-- <?php if ($absen['id_pegawai'] == 'peg') : ?>
 				<div class="col-sm-4 text-right pb-3">
 					<button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajukan Sakit</button>
 				</div>
 			<?php endif ?> -->

 		</div>


 		<div class="table-responsive">

 			<table id="example" class="table table-striped table-bordered">
 				<thead>
 					<tr>
 						<th>NO.</th>
 						<th>NAMA</th>
 						<th>JENIS</th>
 						<th>TGL/WAKTU AWAL</th>
 						<th>TGL/WAKTU AKHIR</th>
 						<th>KETERANGAN</th>
 						<th>SURAT</th>
 						<th>STATUS</th>
 						<th>AKSI</th>
 					</tr>
 				</thead>
 				<tbody id="table_data">
 					<?php $no = 1; ?>
 					<?php
						foreach ($absensi as $b) : ?>
 						<tr>
 							<td><?= $no++ ?></td>
 							<td><?= $b['pegawai'][0]['nama_pegawai']; ?></td>
 							<td><?= $b['jenis']; ?></td>
 							<td><?= $b['tanggal_awal']; ?></td>
 							<td><?= $b['tanggal_akhir']; ?></td>
 							<td><?= $b['keterangan']; ?></td>
 							<td><a style="color:blue" href="./../gambar/Absensi/suratdokter/<?= $b['surat']; ?>"><?= $b['surat']; ?></a></td>
 							<td>
 								<?php
									if ($b['acc'] == 0) {
										echo "Belum Diizinkan";
									} elseif ($b['acc'] == 1) {
										echo "Diizinkan oleh HRD $b[acc_by]";
									} elseif ($b['acc'] == 3) {
										echo "Di izinkan oleh SPV $b[acc_by] progress to HRD";
									} elseif ($b['acc'] == 4) {
										echo "Di izinkan oleh Leader $b[acc_by] progress to SPV";
									} elseif ($b['acc'] == 5) {
										echo "Izin dibatalkan oleh SPV $b[acc_by]";
									} elseif ($b['acc'] == 6) {
										echo "Izin dibatalkan oleh Leader $b[acc_by]";
									} elseif ($b['acc'] == 7) {
										echo "Izin dibatalkan oleh HRD $b[acc_by]";
									} elseif ($b['acc'] == 8) {
										echo "Izin ditolak oleh SPV $b[acc_by] karena ", $b["penolakan"];
									} elseif ($b['acc'] == 9) {
										echo "Izin ditolak oleh Leader $b[acc_by] karena ", $b["penolakan"];
									} else {
										echo "Ditolak oleh $b[acc_by] karena ", $b["penolakan"];
									}
									?>
 							</td>
 							<td>
 								<div class="d-flex justify-content-start">
 									<?php
										if ($b['acc'] == 7 || $b['acc'] == 4 || $b['acc'] == 5 || $b['acc'] == 6 || $b['acc'] == 9) {
										?>
 										<a class="btn btn-theme" href="<?= base_url('supervisor/acc-izin-pegawai') ?>/<?= $b['id']; ?>" style="color:white" onclick="return confirm('Yakin Ingin Menizinkan?');"><i class="fas fa-check"></i></a>
 										<a class="btn btn-danger ml-3 trigger-tolak" data-id-izin="<?= $b['id']; ?>" style="color:white"><i class="fas fa-ban"></i></a>
 									<?php
										} elseif ($b['acc'] == 3) {
										?>
 										<a class="btn btn-danger" href="<?= base_url('supervisor/hapus-izin-pegawai') ?>/<?= $b['id']; ?>" onclick="return confirm('Yakin Ingin Membatalkan?');"><i class="fas fa-times text-light"></i></a>
 									<?php
										} elseif ($b['acc'] == 1) {
										?>
 									<?php
										}
										?>
 								</div>
 							</td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>

 			</table>
 		</div>


 		<script>
 			$(document).ready(function() {
 				$("#table_data").on("click", ".trigger-tolak", function() {
 					const keterangan = prompt("Keterangan Tolak");
 					if (!keterangan) return;
 					const idIzin = $(this).data("id-izin");
 					const targetUrl = `<?= base_url('supervisor/tolak-izin-pegawai') ?>/${idIzin}?keterangan=` + keterangan;
 					console.log(targetUrl);
 					window.location.href = targetUrl;
 				})
 			});
 		</script>