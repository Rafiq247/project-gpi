<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">

        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
                <?= $this->session->unset_userdata('flash');  ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>
        <div class="row border-bottom mb-4">
            <div class="col-sm-8 pt-2">
                <h6 class="mb-4 bc-header"><?= $title ?></h6>
            </div>

            <div class="col-sm-4 text-right pb-3">
                <!-- <button class="btn btn-round btn-theme" style="background-color:mediumblue" data-toggle="modal" data-target="#filterModal"><i class="fa fa-filter"></i> Filter</button> -->
                <button class="btn btn-round btn-theme" data-toggle="modal" data-target="#inputBpjsJamsos"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </div>

        <div class="table-responsive">

            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID PEGAWAI</th>
                        <th>NAMA KARYAWAN</th>
                        <th>DEVISI</th>
                        <th>DATA UPAH</th>
                        <th>IURAN JKK</th>
                        <th>IURAN JKM</th>
                        <th>IURAN JHT TK</th>
                        <th>IURAN JHT</th>
                        <th>TOTAL IURAN</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>P-001</td>
                        <td>Aang Mulyana</td>
                        <td>Helper Cylinder</td>
                        <td>Rp. 10.000.000</td>
                        <td>Rp. 8.000</td>
                        <td>Rp. 7.000</td>
                        <td>Rp. 50.000</td>
                        <td>Rp. 40.000</td>
                        <td>Rp. 105.000</td>
                        <td>
                            <a class="btn btn-theme ml-1" href="" data-toggle="modal" data-target="#editBpjsJamsos">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger ml-1" href="<?= base_url('admin/hapus-bpjs-jamsos') ?>" onclick="return confirm('Yakin Ingin Menghapus?');">Hapus</a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="modal fade" id="editBpjsJamsos" tabindex="-1" role="dialog" aria-labelledby="editBpjsJamsos">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong>Edit BPJS Jamsostek</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-bpjs-jamsostek' ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-sm-12">ID KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="id_pegawai" name="id_pegawai">
                                                <option value="">-pilih-</option>
                                                <option value="id_pegawai">P-001</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">NAMA KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="Aang Mulyana(BERDASARKAN ID KARYAWAN)" name="name" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DEVISI</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="Rp. 5.000.000(BERDASARKAN DATA JABATAN)" name="jabatan" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DATA UPAH</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="Rp. 10.000.000(BERDASARKAN GAJI BERSIH TPP)" name="salary" class="form-control " readonly>
                                        </div>
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

        <div class="modal fade" id="inputBpjsJamsos" tabindex="-1" role="dialog" aria-labelledby="inputBpjsJamsosLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title text-secondary"><strong>Tambah Data Pegawai BPJS Jamsostek</strong></h5>
                        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body text-justify">
                        <form class="form-horizontal" action="<?php echo base_url() . 'admin/input-bpjs-jamsostek' ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-sm-12">ID KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="id_pegawai" name="id_pegawai">
                                                <option value="">-pilih-</option>
                                                <option value="id_pegawai">P-001</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">NAMA KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="Aang Mulyana(BERDASARKAN ID KARYAWAN)" name="name" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DEVISI</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="Rp. 5.000.000(BERDASARKAN DATA JABATAN)" name="jabatan" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DATA UPAH</label>
                                        <div class="col-sm-12">
                                            <input type="text" value="Rp. 10.000.000(BERDASARKAN GAJI BERSIH TPP)" name="salary" class="form-control " readonly>
                                        </div>
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