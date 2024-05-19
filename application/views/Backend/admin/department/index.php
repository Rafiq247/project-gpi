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
                    <?php foreach ($jabatan as $b) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b['jabatan']; ?></td>
                            <td><?= $b['id_jabatan']; ?></td>
                            <td>
                                <button class="btn btn-theme ml-1" data-toggle="modal" data-target="#editModal<?= $b['id_jabatan']; ?>">Edit</button>
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
                                    Keterangan* -> Id Jabatan Admin = 0 <br>
                                    Jika ingin menambahkan jabatan pastikan id nya sesuai dengan ketentuan di bawah ini untuk memisahkan role yang ada<br>
                                    1. Id Jabatan untuk 1 - 10 = Supervisor, 11 - 20 = Leader & 21 - 30 = Pegawai <br>
                                    2. Id Jabatan harus penjumlahan kelipatan 10 dari Id Jabatan parent <br>
                                    Contoh 1 : Supervisor (devisi A), id = 1 -> Leader (devisi A), = 11 (1+10) -> Pegawai (devisi A),id = 21 (1 + 20) <br>
                                    Contoh 2 : Supervisor (devisi B), id = 2 -> Leader (devisi B), = 12 (2+10) -> Pegawai (devisi B),id = 22 (2 + 20) <br>
									3. Untuk Id Jabatan bisa Double data <br>
									Contoh 1 : Supervisor (devisi A), id = 1 -> Leader (devisi PRINTING A), = 11 (1+10) -> Leader (devisi PRINTING B),id = 11 (1 + 10) <br>
									Contoh 1 : Supervisor (devisi A), id = 1 -> Pegawai (devisi PRINTING A), = 21 (1+20) -> Pegawai (devisi PRINTING B),id = 11 (1 + 20) <br>
									4. Dari ketentuan pertama Supervisor per jabatan hanya terdapat 10 jabatan saja, jika ingin ditambahkan maka <br>
									Kita bisa menggunakan Id Jabatan di atas 40 <br>
									Id Jabatan untuk 31 - 40 = Supervisor (Jika Jabatan SPV melebih 10 pada ketentuan pertama), 41 - 50 = Leader & 51 - 60 = Pegawai <br>
									Jika memang masih melebihi juga maka bisa Id Jabatan bisa di isi dari 61 - 70 lalu sisanya mengikuti. <br>
									5. Jika Jabatan & Role salah Input maka harus di delete terlebih dahulu lalu input kembali <br>
									6. Hanya Id Jabatan yang bisa di rubah
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Id Jabatan</label>
                                    <input type="text" name="id_jabatan" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-12">Role</label>
									<select class="form-control" id="role_group" name="role_group">
										<option value="">- Pilih -</option>
										<option value="1">Admin</option>
										<option value="2">Supervisor</option>
										<option value="3">Leader</option>
										<option value="4">Pegawai</option>
									</select>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-12">Gaji/hari</label>
                                            <input type="text" name="salary" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Netto Insentif</label>
                                            <input type="text" name="bonus" class="form-control ">
                                    </div>	
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Jabatan Modal -->
        <?php foreach ($jabatan as $j) : ?>
            <?php
            $id_jabatan = $j['id_jabatan'];
            $jabatan = $j['jabatan'];
            ?>
            <div class="modal fade" id="editModal<?= $id_jabatan; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $id_jabatan; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title text-secondary"><strong> Edit Jabatan</strong></h5>
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-justify">
                            <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-department' ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan; ?>" />
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-12">Jabatan</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="jabatan" value="<?= $jabatan ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Id Jabatan</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="id_jabatan" value="<?= $id_jabatan ?>" class="form-control ">
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
    </div>
</div>
