 <!--Content right-->

 <?php
	function rupiah($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
		return $hasil_rupiah;
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




 		<div class="row border-bottom mb-4">
 			<div class="col-sm-8 pt-2">
 				<h6 class="mb-4 bc-header"><?= $title ?></h6>
 			</div>
 			<div class="col-sm-4 text-right pb-3">
 				<button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
 				<!-- <a target="_blank" class="btn btn-round btn-danger" href="<?= base_url('admin/cetak-jadwal') ?>"><i class="fa fa-plus"></i> Report</a> -->
 			</div>



 		</div>

 		<div class="table-responsive">
 			<table id="example" class="table table-striped table-bordered">
 				<thead>
 					<tr>
 						<th>#</th>
 						<th>Jabatan</th>
 						<th>Id Jabatan</th>
                        <th>Aksi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $no = 1; ?>
 					<?php
						foreach ($jabatan as $b) : ?>
 						<tr>
 							<td><?= $no++ ?></td>
 							<td><?= $b['jabatan']; ?></td>
 							<td><?= $b['id_jabatan']; ?></td>
 							<td>
 								<a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target=".bd-example-modal<?= $b['id_jabatan']; ?>">Edit</a>
 								<a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-department') ?>/<?= $b['id_jabatan']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>

 							</td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>

 			</table>
 		</div>

 		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

 			<div class="modal-dialog modal-lg">
 				<div class="modal-content">
 					<div class="modal-header text-center">
 						<h5 class="modal-title text-secondary"><strong> Tambah Jabatan</strong></h5>
 						<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 					</div>
 					<div class="modal-body text-justify">
 						<form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-department' ?>" method="post" enctype="multipart/form-data">

 							<div class="modal-body">
                             <div class="form-group">
                                 Keterangan* <br>
                                 Jika ingin menambahkan jabatan pastikan id nya sesuai dengan ketentuan di bawah ini <br>
                                 
 								</div>
 								<div class="form-group">
                                 <label class="col-sm-12">Jabatan</label>
 										<input type="text" name="jabatan" class="form-control" required>
 								</div>
 								<div class="form-group">

 									<label class="col-sm-12">Id Jabatan</label>
 										<input type="text" name="id_jabatan" class="form-control" required>
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



 		<!-- edit modal -->

 		<?php foreach ($jabatan as $j) :
				$id = $j['id_jabatan'];
				$jabatan = $j['jabatan'];
			?>
 			<div class="modal fade bd-example-modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 				<div class="modal-dialog modal-lg">
 					<div class="modal-content">
 						<div class="modal-header text-center">
 							<h5 class="modal-title text-secondary"><strong> Edit Jabatan</strong></h5>
 							<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body text-justify">
 							<form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-department' ?>" method="post" enctype="multipart/form-data">
 								<input type="hidden" name="id" value="<?php echo $id; ?>" />
 								<div class="modal-body">

 									<div class="form-group">

 										<label class="col-sm-12">Jabatan</label>
 										<div class="col-sm-12">
 											<input type="text" name="jabatan" value="<?= $jabatan ?>" class="form-control " readonly>
 										</div>
 									</div>
                                     <div class="form-group">

                                        <label class="col-sm-12">Id Jabatan</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="id_jabatan" value="<?= $id_jabatan ?>" class="form-control " readonly>
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
 		<?php endforeach; ?>