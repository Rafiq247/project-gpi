 <!--Content right-->
 <!--Content right-->
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

 <?php
	function nmbulan($angka)
	{

		switch ($angka) {
			case 1:
				return "Januari";
			case 2:
				return "Februari";
			case 3:
				return "Maret";
			case 4:
				return "April";
			case 5:
				return "Mei";
			case 6:
				return "Juni";
			case 7:
				return "Juli";
			case 8:
				return "Agustus";
			case 9:
				return "September";
			case 10:
				return "Oktober";
			case 11:
				return "November";
			case 12:
				return "Desember";
		}
	}
	?>

 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
 	<?php if ($this->session->flashdata('flash')) : ?>
 		<div class="alert alert-info alert-dismissible fade show" role="alert">
 			<p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
 			<?= $this->session->unset_userdata('flash'); ?>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 				<span aria-hidden="true">&times;</span>
 			</button>
 		</div>
 	<?php endif ?>
 	<div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">

 		<div class="row">
 			<div class="col-md-12">

 				<div class="row border-bottom mb-4">
 					<div class="col-sm-8 pt-2">
 						<h6 class="mb-4 bc-header"><?= $title ?></h6>
 					</div>
 					<!-- <div class="col-sm-4 text-right pb-3">
 						<button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
 					</div> -->
 				</div>
 				<div class="text-center mb-3">

 					<h3 class="mb-0"><b>DATA PAYROL PEGAWAI</b></h3>

 					<hr>

 				</div>
 				<!-- PENCARIAN BERDASARKAN BULAN DAN TAHUN-->
 				<div class="table-responsive">
 					<table id="example" class="table table-striped table-bordered">
 						<thead>
 							<tr>
 								<th>#</th>
 								<th>ID KARYAWAN</th>
 								<th>NAMA KARYAWAN</th>
 								<th>TANGGAL</th>
 								<th>JABATAN</th>
 								<th>GAJI POKOK</th>
 								<th>BONUS</th>
 								<th>JAM LEMBUR</th>
 								<th>LEMBUR</th>
 								<th>HADIR</th>
 								<th>TIDAK HADIR</th>
 								<th>Izin</th>
 								<th>sakit</th>
 								<th>Pengurangan</th>
 								<th>GAJI BERSIH</th>
 								<th>AKSI</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $no = 1; ?>
 							<?php
								foreach ($gaji as $key => $a) : ?>
 								<?php
									foreach ($a as $b) : ?>
 									<tr>
 										<td><?= $no++ ?></td>
 										<td><?= $b['id_pegawai']; ?></td>
 										<td><?= $b['name']; ?></td>
 										<td><?= $key; ?></td>
 										<td><?= $b['jabatan']; ?></td>
 										<td><?php echo 'Rp ' . number_format($b['gaji_pokok'], 2, ',', '.'); ?></td>
 										<td><?php echo 'Rp ' . number_format($b['bonus'], 2, ',', '.'); ?></td>
 										<td><?= $b['jam_lembur']; ?></td>
 										<td><?php echo 'Rp ' . number_format($b['lembur'], 2, ',', '.'); ?></td>
 										<td><?= $b['hadir']; ?></td>
 										<td><?= $b['tidak_hadir']; ?></td>
 										<td><?= $b['izin']; ?></td>
 										<td><?= $b['sakit']; ?></td>
 										<td><?php echo 'Rp ' . number_format($b['pengurangan'], 2, ',', '.'); ?></td>
 										<td><?php echo 'Rp ' . number_format($b['gaji_pokok'] - $b['pengurangan'] + $b['lembur'] + $b['bonus'], 2, ',', '.'); ?></td>
 										<td>
 											<form action="<?= base_url() ?>admin/input-data-tpp" method="post">
 												<input type="hidden" name="id" value="<?= $b['id_pegawai']; ?>">
 												<input type="hidden" name="name" value="<?= $b['name']; ?>">
 												<input type="hidden" name="tanggal" value="<?= $key; ?>">
 												<input type="hidden" name="jabatan" value="<?= $b['jabatan']; ?>">
 												<input type="hidden" name="gaji" value="<?= $b['gaji_pokok']; ?>">
 												<input type="hidden" name="bonus" value="<?= $b['bonus']; ?>">
 												<input type="hidden" name="jam_lembur" value="<?= $b['jam_lembur']; ?>">
 												<input type="hidden" name="lembur" value="<?= $b['lembur']; ?>">
 												<input type="hidden" name="izin" value="<?= $b['izin']; ?>">
 												<input type="hidden" name="hadir" value="<?= $b['hadir']; ?>">
 												<input type="hidden" name="tidak_hadir" value="<?= $b['tidak_hadir']; ?>">
 												<input type="hidden" name="sakit" value="<?= $b['sakit']; ?>">
 												<input type="hidden" name="pengurangan" value="<?= $b['pengurangan']; ?>">
 												<input type="hidden" name="gaji_bersih" value="<?= $b['gaji_pokok'] - $b['pengurangan'] + $b['lembur'] + $b['bonus']; ?>">
 												<button type="submit" class="btn btn-primary btn-flat" id="simpan">Tambah Data</button>
 											</form>
 										</td>
 									</tr>
 								<?php endforeach ?>

 							<?php endforeach ?>
 						</tbody>

 					</table>
 				</div>
 			</div>
 		</div>
 		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 			<div class="modal-dialog modal-lg">
 				<div class="modal-content">
 					<div class="modal-header text-center">
 						<h5 class="modal-title text-secondary"><strong>GAJI PEGAWAI</strong></h5>
 						<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body text-justify ">

 						<form class="form-horizontal" action="<?php echo base_url() . 'admin/simpan-gaji' ?>" method="post">
 							<input type="hidden" name="bulanpilih" value="<?= $blnselected ?>">
 							<input type="hidden" name="tahunpilih" value="<?= $thnselected ?>">
 							<div class="modal-body">
 								<div class="form-group col-sm-12">
 									<div class="flash"></div>
 								</div>
 								<div class="form-group">
 									<label class="col-sm-12">Nama Pegawai</label>
 									<div class="col-sm-12">
 										<select class="form-control" id="id_pegawai_c" name="id_pegawai">
 											<option value="">-pilih-</option>
 											<?php foreach ($pegawai as $j) : ?>
 												<option value="<?= $j['id_pegawai'] ?>"> <?= $j['nama_pegawai']; ?></option>
 											<?php endforeach; ?>
 										</select>
 									</div>
 								</div>

 								<div class="row col-lg-12">
 									<div class="form-group col-lg-5">
 										<label class="">Tahun</label>
 										<div class="">
 											<select name="th1" id="thn_c" class="form-control">
 												<option value="">- PILIH TAHUN -</option>
 												<?php
													foreach ($list_th as $t) { ?>
 													<option value="<?php echo $t['th']; ?>"><?php echo $t['th']; ?></option>
 												<?php
													}
													?>
 											</select>
 										</div>
 									</div>
 									<div class="form-group col-lg-5">
 										<label class="">Bulan</label>
 										<div class="">
 											<select name="bln1" id="bln_c" class="form-control ">
 												<option value="">- PILIH BULAN -</option>
 												<?php
													foreach ($list_bln as $t) { ?>
 													<option value="<?php echo $t['bln']; ?>"><?php echo nmbulan($t['bln']); ?></option>
 												<?php
													}
													?>
 											</select>
 										</div>
 									</div>
 									<div class="form-group col-lg-2">
 										<label class="">_</label>
 										<div class="">
 											<button type="button" onclick="cari()" class="btn btn-success">Akumulasi</button>
 										</div>
 									</div>
 								</div>
 								<div class="form-group col-lg-12" name="lain_nya" id="lain_nya" hidden>
 									<div class="row col-lg-12">
 										<div class="form-group col-lg-6">
 											<label class="">Gaji Pokok</label>
 											<div class="">
 												<input type="text" name="gapok1" id="gapok1" class="form-control" readonly required>
 												<input type="hidden" name="gapok" id="gapok" class="form-control" readonly required>

 											</div>
 										</div>
 										<div class="form-group col-lg-6">
 											<label class="">Lembur</label>
 											<div class="">
 												<input type="text" name="lembur1" id="lembur1" class="form-control " value="" readonly required>
 												<input type="hidden" name="lembur" id="lembur" class="form-control " value="" readonly required>
 											</div>
 										</div>
 									</div>
 									<div class="row col-lg-12">
 										<div class="form-group col-lg-6">
 											<label class="">Bonus</label>
 											<div class="">
 												<input type="text" name="bonus" class="form-control " value="">
 											</div>
 										</div>
 										<div class="form-group col-lg-6">
 											<label class="">Keterangan</label>
 											<div class="">
 												<input type="text" name="keterangan" class="form-control " value="">
 											</div>
 										</div>

 									</div>
 								</div>

 							</div>
 							<div class="modal-footer">
 								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
 								<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
 							</div>
 						</form>
 					</div>

 				</div>
 			</div>
 		</div>

 		<!-- tutup -->

 		<script>
 			const rupiah = (number) => {
 				return new Intl.NumberFormat("id-ID", {
 					style: "currency",
 					currency: "IDR"
 				}).format(number);
 			}

 			function kosong() {

 				$('#gapok').val('')
 				$('#lembur').val('')
 				// $('#isitable').load('datatable.php')

 			}

 			function cari() {
 				console.log($('#gapok').val());


 				var id_pegawai = $('#id_pegawai_c').val();
 				var thn = $('#thn_c').val();
 				var bln = $('#bln_c').val();
 				console.log(bln);
 				console.log(thn);
 				console.log(id_pegawai);

 				//  proses ajax

 				$.ajax({
 					url: '<?= base_url() ?>admin/akumulasi-gaji',
 					type: 'POST',
 					dataType: 'JSON',
 					data: {
 						'id_pegawai': id_pegawai,
 						'tahun_cari': thn,
 						'bulan_cari': bln
 					},

 					success: function(data) {
 						console.log(data);

 						if (data.flash == "Data Ditemukan") {
 							console.log('berhasil');
 							var flash = ``;
 							flash = flash + `
               <div class="alert alert-info alert-dismissible fade show" role="alert">
               <p><strong>${data.flash} <i class="fa fa-info"></i>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </strong></p>
             </div>`;
 							//  $('#flash').val(data.flash);
 							$('.flash').html(flash);
 							$('#lain_nya').prop('hidden', false);;
 							$('#lembur').val(data.gaji_lembur);
 							$('#gapok').val(data.gaji_msk);
 							$('#lembur1').val(rupiah(data.gaji_lembur));
 							$('#gapok1').val(rupiah(data.gaji_msk));

 						} else if (data.flash == "Gaji Bulan Ini Kosong") {
 							$('#lain_nya').prop('hidden', 'true');;
 							kosong();
 							var flash = ``;
 							flash = flash + `
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <p><strong>${data.flash} <i class="fa fa-info"></i>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </strong></p>
             </div>`;
 							//  $('#flash').val(data.flash);
 							$('.flash').html(flash);
 						}


 					}
 				});
 			}
 		</script>
