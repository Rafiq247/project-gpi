 <!--Content right-->
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
 			<?= $this->session->unset_userdata('flash');  ?>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 				<span aria-hidden="true">&times;</span>
 			</button>
 		</div>
 	<?php endif ?>
 	<div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
 		<div class="row border-bottom mb-4">
 			<div class="col-sm-8 pt-2">
 				<h6 class="mb-4 bc-header"><?= $title ?></h6>
 			</div>

 			<div class="col-sm-4 text-right pb-3">
 				<!-- <button class="btn btn-round btn-theme" style="background-color:mediumblue" data-toggle="modal" data-target="#filterModal"><i class="fa fa-filter"></i> Filter</button> -->
 				<button class="btn btn-round btn-theme" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i> Tambah</button>
 			</div>
 		</div>

 		<form action="tampil-input" method="post">
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
 						<th>DEPARTEMEN</th>
 						<th>NAMA</th>
 						<th>ID</th>
 						<th>TGL/WAKTU</th>
 						<th>STATUS</th>
 						<th>KODE VERIFIKASI</th>
 						<th></th>
 						<th></th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $no = 1; ?>
 					<?php
						foreach ($absensi as $b) : ?>
 						<tr>
 							<td><?= $no++ ?></td>
 							<td><?= $b['departement']; ?></td>
 							<td><?= $b['name']; ?></td>
 							<td><?= $b['id_fingerprint']; ?></td>
 							<td><?= $b['datetime']; ?></td>
 							<td><?= $b['status']; ?></td>
 							<td><?= $b['verification_code']; ?></td>
 							<td>
 								<a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target="#editInput<?= $b['id']; ?>">Edit</a>
 							</td>
 							<td>
 								<a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-input-absen') ?>/<?= $b['id']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
 							</td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>

 			</table>
 		</div>

 		<?php $no = 1; ?>
 		<?php
			foreach ($absensi as $b) : ?>
 			<div class="modal fade" id="editInput<?= $b['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editInput<?= $b['id']; ?>">
 				<div class="modal-dialog modal-lg">
 					<div class="modal-content">
 						<div class="modal-header text-center">
 							<h5 class="modal-title text-secondary"><strong>Import File Absensi</strong></h5>
 							<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body text-justify">
 							<form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-absensi' ?>" method="post" enctype="multipart/form-data">
 								<div class="modal-body">
 									<div class="form-group">
 										<label class="col-sm-12">Departemen</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $b['departement']; ?>" name="departement" class="form-control " required>
 										</div>
 										<label class="col-sm-12">Nama</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $b['name']; ?>" name="name" class="form-control " required>
 										</div>
 										<label class="col-sm-12">ID Fingerprint</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $b['id_fingerprint']; ?>" name="id_fingerprint" class="form-control " required>
 										</div>
 										<label class="col-sm-12">TGL/WAKTU</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $b['datetime']; ?>" name="datetime" class="form-control " required>
 										</div>
 										<label class="col-sm-12">STATUS</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $b['status']; ?>" name="status" class="form-control " required>
 										</div>
 										<label class="col-sm-12">KODE VERIFIKASI</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $b['verification_code']; ?>" name="verification_code" class="form-control " required>
 										</div>
 										<div class="col-sm-12">
 											<input type="hidden" value="<?php echo $b['id']; ?>" name="id" class="form-control " required>
 										</div>
 									</div>
 								</div>
 						</div>
 						<div class="modal-footer">
 							<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
 							<button type="submit" class="btn btn-primary btn-flat" id="simpan">Upload</button>

 						</div>
 						</form>
 					</div>

 				</div>
 			</div>
 		<?php endforeach ?>

 		<div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel">
 			<div class="modal-dialog modal-lg">
 				<div class="modal-content">
 					<div class="modal-header text-center">
 						<h5 class="modal-title text-secondary"><strong>Import File Absensi</strong></h5>
 						<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body text-justify">
 						<form class="form-horizontal" action="<?php echo base_url() . 'admin/input-absensi' ?>" method="post" enctype="multipart/form-data">
 							<div class="modal-body">
 								<div class="form-group">
 									<label class="col-sm-12">Upload Files</label>
 									<div class="col-sm-12">
 										<input type="file" name="xlsx" class="form-control " required>
 									</div>
 								</div>
 							</div>
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
 						<button type="submit" class="btn btn-primary btn-flat" id="simpan">Upload</button>

 					</div>
 					</form>
 				</div>

 			</div>
 		</div>
 	</div>
