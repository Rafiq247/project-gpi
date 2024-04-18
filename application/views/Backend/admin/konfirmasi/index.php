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

 		<form action="absen-harian" method="post">
 			<div class="row ">

 				<div class="col-lg-3">

 					<select name="th" id="th" class="form-control">
 						<option value="">- PILIH TAHUN -</option>
 						<?php
							foreach ($list_th as $t) {
								if ($thn == $t['th']) {
							?>
 								<option selected value="<?php echo $t['th'];  ?>"><?php echo $t['th']; ?></option>
 							<?php
								} else {
								?>
 								<option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
 						<?php
								}
							}
							?>
 					</select>
 				</div>
 				<div class="col-lg-3">

 					<select name="bln" id="bln" class="form-control ">
 						<option value="">- PILIH BULAN -</option>
 						<?php
							foreach ($list_bln as $t) {
								if ($blnnya == $t['bln']) {
							?>
 								<option selected value="<?php $t['bln'];  ?>"><?php echo nmbulan($t['bln']); ?></option>
 							<?php
								} else {
								?>
 								<option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
 						<?php
								}
							}
							?>
 					</select>
 				</div>
 				<div class="col-lg-3">
 					&nbsp;
 					<button type="submit" class="btn btn-primary mb-3"><i class="fa fa-search"></i>Cari</button>
 					&nbsp;
 				</div>
 				<!--  -->
 			</div>
 		</form>
 		<div class="table-responsive">

 			<table id="example" class="table table-striped table-bordered">
 				<thead>
 					<tr>
 						<th>No</th>
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
 				<tbody>
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
 							<td><?php echo $b['acc'] == 0 ? "Belum Diizinkan" : "Diizinkan"; ?></td>
 							<td>
 								<?php
									if ($b['acc'] == 0) {
									?>
 									<a class="btn btn-theme ml-1" href="<?= base_url('admin/acc-izin') ?>/<?= $b['id']; ?>" style="color:white" onclick="return confirm('Yakin Ingin Menizinkan?');">Izinkan</a>
 								<?php
									} else {
									?>
 									<a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-izin') ?>/<?= $b['id']; ?>" onclick="return confirm('Yakin Ingin Membatalkan?');">Batalkan Izin</a>
 								<?php
									}
									?>
 							</td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>

 			</table>
 		</div>

 		<!-- modal -->
 		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 			<div class="modal-dialog modal-lg">
 				<div class="modal-content">
 					<div class="modal-header text-center">
 						<h5 class="modal-title text-secondary"><strong>Ajukan Cuti</strong></h5>
 						<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body text-justify ">
 						<?php echo form_open_multipart('pegawai/izin-pegawai'); ?>
 						<div class="card-body">
 							<div class="row">
 								<div class="col-md-6">
 									<input type="hidden" name="id_peg" class="form-control " value="<?= $pegawai['id_pegawai'] ?>" required>
 									<div class="form-group">
 										<label>Jenis Izin</label>
 										<div>
 											<select class="form-control" id="jenisizin" name="jenisizin">
 												<option value="">-pilih-</option>
 												<option value="4">Izin Sakit</option>
 												<option value="5">Izin Tidak Masuk</option>
 											</select>
 										</div>
 									</div>
 									<div class="form-group" name="suratsakit" id="suratsakit" hidden>
 										<label class="">Upload Surat Keterangan Sakit</label>
 										<div class="">
 											<input type="file" name="suratsakit" class="form-control" id="suratsakit">
 										</div>
 									</div>
 									<div class="form-group">
 										<label>Tanggal Izin</label>
 										<div>
 											<input type="text" name="tgl_awal" placeholder="Tanggal Awal" class="datepicker form-control mb-3" id="datepicker">
 										</div>
 										<div>
 											<input type="text" name="tgl_akhir" placeholder="Tanggal Akhir" class="datepicker form-control" id="datepicker">
 										</div>
 									</div>
 									<div class="form-group">
 										<label>Keterangan</label>
 										<div>
 											<input type="text" name="penjelasan" class="form-control " value="">
 										</div>
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="col-md-12 ">
 										Ket.<br>
 										-Silahkan pilih jenis izin anda*<br>
 										-upload bukti keterangan dokter untuk "Izin Sakit"*<br>
 										-Silahkan isi keterangan alasan<br>
 									</div>
 								</div>
 							</div>

 						</div>
 						<!-- /.card-body -->
 						<div class="modal-footer">
 							<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
 							<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
 						</div>
 						</form>
 					</div>

 				</div>
 			</div>
 		</div>
