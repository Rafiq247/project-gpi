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
 			<?php if ($absen['id_pegawai'] == 'peg') : ?>
 				<div class="col-sm-4 text-right pb-3">
 					<button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajukan Izin</button>
 				</div>
 			<?php endif ?>

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
 						<th>JENIS</th>
 						<th>TGL/WAKTU AWAL</th>
 						<th>TGL/WAKTU AKHIR</th>
 						<th>KETERANGAN</th>
 						<th>SURAT</th>
 						<th>STATUS</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $no = 1; ?>
 					<?php
						foreach ($absensi as $b) : ?>
 						<tr>
 							<td><?= $no++ ?></td>
 							<td><?= $b['jenis']; ?></td>
 							<td><?= $b['tanggal_awal']; ?></td>
 							<td><?= $b['tanggal_akhir']; ?></td>
 							<td><?= $b['keterangan']; ?></td>
 							<td><a style="color:blue" href="./../gambar/Absensi/suratdokter/<?= $b['surat']; ?>"><?= $b['surat']; ?></a></td>
 							<td><?php echo $b['acc'] == 0 ? "Belum Diizinkan" : ($b['acc'] == 1 ? "Diizinkan oleh Supervisor $b[acc_by]"   : $b["penolakan"]) ?></td>
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
 						<?php echo form_open_multipart('leader/izin-pegawai'); ?>
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
 												<?php if ($pegawai_month >= 365) : ?>
 													<option value="6">Izin Cuti</option>
 												<?php endif;  ?>
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
 											<input type="text" name="tgl_awal" placeholder="Tanggal Awal" class=" form-control mb-3" id="datepicker_tgl_awal">
 										</div>
 										<div>
 											<input type="text" name="tgl_akhir" placeholder="Tanggal Akhir" class=" form-control" id="datepicker_tgl_akhir">
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
 										- Silahkan pilih jenis izin anda*<br>
 										- Upload bukti keterangan dokter untuk "Izin Sakit"*<br>
 										- Silahkan isi keterangan alasan<br>
 										<?php if ($pegawai_month >= 365) : ?>
											- Sisa Cuti Anda: <b><?= 12 - $used_cuti ?></b>
 												<?php endif;  ?>
										
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



 		<script>
 			// var x = document.getElementById("demo");
 			getLocation();

 			function getLocation() {
 				if (navigator.geolocation) {
 					navigator.geolocation.getCurrentPosition(showPosition);
 				} else {
 					alert("Tidak support browser");
 				}
 			}

 			function showPosition(position) {
 				//  x.innerHTML = "Latitude:" + position.coords.latitude +
 				//      "<br>Longitude: " + position.coords.longitude;
 				$('#lat').val(position.coords.latitude);
 				$('#long').val(position.coords.longitude);
 				$('#lat_pul').val(position.coords.latitude);
 				$('#long_pul').val(position.coords.longitude);
 				$('#lat_lem').val(position.coords.latitude);
 				$('#long_lem').val(position.coords.longitude);
 			}
 		</script>
 		<script type="text/javascript">
 			var serverClock = jQuery("#jamServer");
 			if (serverClock.length > 0) {
 				showServerTime(serverClock, serverClock.text());
 			}

 			function showServerTime(obj, time) {
 				var parts = time.split(":"),
 					newTime = new Date();

 				newTime.setHours(parseInt(parts[0], 10));
 				newTime.setMinutes(parseInt(parts[1], 10));
 				newTime.setSeconds(parseInt(parts[2], 10));

 				var timeDifference = new Date().getTime() - newTime.getTime();

 				var methods = {
 					displayTime: function() {
 						var now = new Date(new Date().getTime() - timeDifference);
 						obj.text([
 							methods.leadZeros(now.getHours(), 2),
 							methods.leadZeros(now.getMinutes(), 2),
 							methods.leadZeros(now.getSeconds(), 2)
 						].join(":"));
 						setTimeout(methods.displayTime, 500);
 					},

 					leadZeros: function(time, width) {
 						while (String(time).length < width) {
 							time = "0" + time;
 						}
 						return time;
 					}
 				}
 				methods.displayTime();
 			}
 		</script>

 		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 		<script type='text/javascript'>
 			$(window).load(function() {
 				const MAX_CUTI = <?= 12 - $used_cuti ?>;

 				function onTglAwalChanged(event) {
 					var newDate = new Date(event.date)
 					newDate.setDate(newDate.getDate() + (MAX_CUTI - 1))
 					checkout.datepicker("setStartDate", event.date);
 					checkout.datepicker("setEndDate", newDate);
 				}

 				var checkout = $('#datepicker_tgl_akhir').datepicker();
 				var checkin = $('#datepicker_tgl_awal').datepicker();

 				$("#jenisizin").change(function() {
 					$("#datepicker_tgl_awal,#datepicker_tgl_akhir").val("");
 					checkin.off('changeDate', onTglAwalChanged);
 					// console.log($("#instansi option:selected").val());
 					if ($("#jenisizin option:selected").val() == '') {
 						$('#suratsakit').prop('hidden', 'true');

 					} else if ($("#jenisizin option:selected").val() == '4') {
 						$('#suratsakit').prop('hidden', false);
 					} else if ($("#jenisizin option:selected").val() == '5') {
 						$('#suratsakit').prop('hidden', 'true');
 					} else if ($("#jenisizin option:selected").val() == '6') {
 						$('#suratsakit').prop('hidden', 'true');
 						checkin.on('changeDate', onTglAwalChanged);
 					}
 				});


 			});
 		</script>