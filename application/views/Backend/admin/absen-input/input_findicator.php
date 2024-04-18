 <!--Content right-->

 <div class="col-sm-12 col-xs-12 content pt-3 pl-0">
 	<?php if ($this->session->flashdata('flashFinger')) : ?>
 		<div class="alert alert-info alert-dismissible fade show" role="alert">
 			<p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flashFinger'); ?></strong></p>
 			<?= $this->session->unset_userdata('flashFinger');  ?>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 				<span aria-hidden="true">&times;</span>
 			</button>
 		</div>
 	<?php endif ?>
 	<div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
 		<div class="row border-bottom mb-4">
 			<div class="col-sm-8 pt-2">
 				<h6 class="mb-4 bc-header">Finger Print</h6>

 			</div>
 			<div class="col-sm-4 text-right pb-3">
 				<button class="btn btn-round btn-theme" data-toggle="modal" data-target="#inputfingerprintmodal"><i class="fa fa-plus"></i> Tambah</button>
 			</div>



 		</div>
 		<div class="table-responsive">
 			<table id="fingerprint" class="table table-striped table-bordered">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>ID KARYAWAN</th>
 						<th>ID FINGERPRINT</th>
 						<th></th>
 						<th></th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $no = 1; ?>
 					<?php
						foreach ($fingerprint as $b) : ?>
 						<tr>
 							<td><?= $no++ ?></td>
 							<td><?= $b['id_pegawai']; ?></td>
 							<td><?= $b['id_fingerprint']; ?></td>
 							<td>
 								<a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target="#editfingerprintmodal<?= $b['id']; ?>">Edit</a>
 							</td>
 							<td>
 								<a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-fingerprint') ?>/<?= $b['id']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
 							</td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>

 			</table>
 		</div>
 		<div class="modal fade" id="inputfingerprintmodal" tabindex="-1" role="dialog" aria-labelledby="inputfingerprintmodal">
 			<div class="modal-dialog modal-lg">
 				<div class="modal-content">
 					<div class="modal-header text-center">
 						<h5 class="modal-title text-secondary"><strong>Tambah Data Fingerprint</strong></h5>
 						<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body text-justify">
 						<form class="form-horizontal" action="<?php echo base_url() . 'admin/input-fingerprint' ?>" method="post" enctype="multipart/form-data">
 							<div class="modal-body">
 								<div class="form-group">
 									<label class="col-sm-12">ID Pegawai</label>
 									<div class="col-sm-12">
 										<select class="form-control" name="id_pegawai">
 											<?php
												foreach ($pegawai as $value) : ?>
 												<option value="<?php echo $value['id_pegawai']; ?>"><?php echo $value['id_pegawai']; ?></option>
 											<?php endforeach ?>
 										</select>
 										<!-- <input type="text" name="id_pegawai" class="form-control " required> -->
 									</div>
 									<label class="col-sm-12">ID Fingerprint</label>
 									<div class="col-sm-12">
 										<input type="text" name="id_fingerprint" class="form-control " required>
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

 		<?php
			foreach ($fingerprint as $value) : ?>
 			<div class="modal fade" id="editfingerprintmodal<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editfingerprintmodal<?= $value['id']; ?>">
 				<div class="modal-dialog modal-lg">
 					<div class="modal-content">
 						<div class="modal-header text-center">
 							<h5 class="modal-title text-secondary"><strong>Edit Data Fingerprint</strong></h5>
 							<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body text-justify">
 							<form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-fingerprint' ?>" method="post" enctype="multipart/form-data">
 								<div class="modal-body">
 									<div class="form-group">
 										<label class="col-sm-12">ID Pegawai</label>
 										<div class="col-sm-12">
 											<select class="form-control" name="id_pegawai">
 												<?php
													foreach ($pegawai as $valuePegawai) : ?>
 													<option <?php echo strcmp($value['id_pegawai'], $valuePegawai['id_pegawai']) ? "" : "selected" ?> value="<?php echo $valuePegawai['id_pegawai']; ?>"><?php echo $valuePegawai['id_pegawai']; ?></option>
 												<?php endforeach ?>
 											</select>
 											<!-- <input type="text" name="id_pegawai" class="form-control " required> -->
 										</div>
 										<label class="col-sm-12">ID Fingerprint</label>
 										<div class="col-sm-12">
 											<input type="text" value="<?php echo $value['id_fingerprint']; ?>" name="id_fingerprint" class="form-control " required>
 										</div>
 										<div class="col-sm-12">
 											<input type="hidden" value="<?php echo $value['id']; ?>" name="id" class="form-control " required>
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
 		<?php endforeach ?>
