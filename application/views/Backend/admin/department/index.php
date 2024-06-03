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
                        <th>Department</th>
                        <!-- <th>Id Jabatan</th> -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($jabatan as $b) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b['devisi']; ?></td>
                            <!-- <td><?= $b['id_jabatan']; ?></td> -->
                            <td>
                                <button class="btn btn-theme ml-1" data-toggle="modal" data-target="#editModal<?= $b['id_department']; ?>">Edit</button>
                                <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-department') ?>/<?= $b['id_department']; ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
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
                        <h5 class="modal-title text-secondary"><strong> Tambah Department</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-department' ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                            <div class="form-group">
                                    <label class="col-sm-12">Department</label>
                                    <input type="text" name="devisi" class="form-control" required>
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
            $id_department = $j['id_department'];
            $devisi = $j['devisi'];
            ?>
            <div class="modal fade" id="editModal<?= $id_department; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $id_department; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title text-secondary"><strong> Edit Jabatan</strong></h5>
                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-justify">
                            <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-department' ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_department" value="<?php echo $id_department; ?>" />
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-12">Department</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="devisi" value="<?= $devisi ?>" class="form-control" >
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
