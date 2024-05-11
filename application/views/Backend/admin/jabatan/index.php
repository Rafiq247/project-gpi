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
 						<th>JABATAN</th>
 						<th>GAJI/HARI</th>
 						<th>NETTO INSENTIF</th>
 						<th>LEMBUR/JAM</th>
 						<th>AKSI</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $no = 1; ?>
 					<?php
						foreach ($jabatan as $b) : ?>
 						<tr>
 							<td><?= $no++ ?></td>
 							<td><?= $b['jabatan']; ?></td>
 							<td><?= rupiah($b['salary']); ?></td>
 							<td><?= $b['bonus']; ?></td>
 							<td><?= $b['overtime']; ?></td>
 							<td>
 								<a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target=".bd-example-modal<?= $b['id_jabatan']; ?>">Edit</a>
 								<a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-jabatan') ?>/<?= $b['id_jabatan']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>

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
 						<form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-jabatan' ?>" method="post" enctype="multipart/form-data">

 							<div class="modal-body">
 								<div class="form-group">
 									<label class="col-sm-12">Jabatan</label>	
									<select class="form-control" id="id_jabatan" name="id_jabatan" required>
										<option value="">- Pilih Jabatan -</option>
										<option value="1">Supervisor HRD-GA</option>
										<option value="2">Supervisor Printing</option>
										<option value="3">Supervisor QC</option>
										<option value="4">Supervisor Maintenance</option>
										<option value="5">Supervisor PPIC</option>
										<option value="6">Supervisor Laminasi</option>
										<option value="7">Supervisor Slitting</option>
										<option value="8">Supervisor Marketing</option>
										<option value="9">Supervisor Purchasing</option>
										<option value="10">Supervisor Accounting</option>
										<option value="11">Leader HRD-GA</option>
										<option value="12">Pegawai HRD-GA</option>
										<option value="21">Leader Printing</option>
										<option value="22">Pegawai Printing</option>
										<option value="23">Helper Printing</option>
										<option value="31">Leader Qc</option>
										<option value="32">Pegawai QC</option>
										<option value="33">Inspector Inspec</option>
										<option value="34">Inspector Incoming</option>
										<option value="35">Inspector Proses</option>
										<option value="36">Inspector Outgoing</option>
										<option value="41">Leader Maintanence</option>
										<option value="42">Pegawai Maintenance</option>
										<option value="43">Operator Maintenance</option>
										<option value="51">Leader PPIC</option>
										<option value="52">Pegawai PPIC</option>
										<option value="53">Pegawai FG</option>
										<option value="55">Pegawai RM</option>
										<option value="56">Helper FG</option>
										<option value="57">Helper RM</option>
										<option value="61">Leader Extru</option>
										<option value="62">Leader Dry</option>
										<option value="63">Leader Blow</option>
										<option value="64">Operator Extru</option>
										<option value="65">Operator Dry</option>
										<option value="66">Operator Blow</option>
										<option value="67">Helper Extru</option>
										<option value="68">Helper Dry</option>
										<option value="69">Helper Blow</option>
										<option value="71">Leader Slitting</option>
										<option value="72">Leader Bag Making</option>
										<option value="73">Pegawai Slitting</option>
										<option value="74">Operator Slitting</option>
										<option value="75">Operator Bag Making</option>
										<option value="76">Helper Slitting</option>
										<option value="77">Helper Bag Making</option>
										<option value="81">Leader Marketing</option>
										<option value="82">Pegawai Marketing</option>
										<option value="83">Sales</option>
										<option value="91">Leader Purchasing</option>
										<option value="92">Pegawai Purchasing</option>
										<option value="101">Leader Accounting</option>
										<option value="102">Pegawai Accounting</option>
									</select>
 								</div>
 								<div class="form-group">

 									<label class="col-sm-12">Gaji/hari</label>
 										<input type="text" name="salary" class="form-control" required>
 								</div>

 								<div class="form-group">

 									<label class="col-sm-12">Netto Insentif</label>
 										<input type="text" name="bonus" class="form-control" required>
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



 		<!-- edit modal -->

 		<?php foreach ($jabatan as $j) :
				$id_jabatan = $j['id_jabatan'];
				$jabatan = $j['jabatan'];
				$salary = $j['salary'];
				$overtime = $j['overtime'];
				$bonus = $j['bonus'];
			?>
 			<div class="modal fade bd-example-modal<?php echo $id_jabatan; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 				<div class="modal-dialog modal-lg">
 					<div class="modal-content">
 						<div class="modal-header text-center">
 							<h5 class="modal-title text-secondary"><strong> Edit Jabatan</strong></h5>
 							<button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body text-justify">
 							<form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-jabatan' ?>" method="post" enctype="multipart/form-data">
 								<input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan; ?>" />
 								<div class="modal-body">

 									<div class="form-group">

 										<label class="col-sm-12">Jabatan</label>
 										<div class="col-sm-12">
 											<input type="text" name="jabatan" value="<?= $jabatan ?>" class="form-control " readonly>
 										</div>
 									</div>
 									<div class="form-group">

 										<label class="col-sm-12">Gaji/hari</label>
 										<div class="col-sm-12">
 											<input type="text" name="salary" value="<?= $salary ?>" class="form-control" required>
 										</div>
 									</div>

 									<div class="form-group">

 										<label class="col-sm-12">Netto Insentif</label>
 										<div class="col-sm-12">
 											<input type="text" name="bonus" value="<?= $bonus ?>" class="form-control" required>
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