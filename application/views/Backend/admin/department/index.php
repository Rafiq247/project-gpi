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
                                    Keterangan* <br>
                                    Jika ingin menambahkan jabatan pastikan id nya sesuai dengan ketentuan di bawah ini untuk memisahkan role yang ada<br>
                                    1. Id Jabatan harus penumlahan kelipatan 10 dari Id Jabatan parent <br>
                                    Contoh 1 : Supervisor (devisi A), id = 1 -> Leader (devisi A), = 11 (1+10) -> pegawai (devisi A),id = 21 (1 + 20) <br>
                                    Contoh 2 : Supervisor (devisi B), id = 2 -> Leader (devisi B), = 12 (2+10) -> pegawai (devisi B),id = 22 (2 + 20) <br>
                                    2. Ketika menginput Id Jabatan ataupun Jabatan tidak bisa Double data
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
                                            <input type="text" name="jabatan" value="<?= $jabatan ?>" class="form-control " readonly>
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
