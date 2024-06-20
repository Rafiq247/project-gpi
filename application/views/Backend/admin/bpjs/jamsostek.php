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
                        <th>NO.</th>
                        <th>ID PEGAWAI</th>
                        <th>NAMA KARYAWAN</th>
                        <th>DEVISI</th>
                        <th>DATA UPAH</th>
                        <th>IURAN JKK</th>
                        <th>IURAN JKM</th>
                        <th>IURAN JHT TK</th>
                        <th>IURAN JHT</th>
                        <th>TOTAL IURAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($bpjs_jamsos as $b) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b['id_pegawai']; ?></td>
                            <td><?= $b['nama_pegawai']; ?></td>
                            <td><?= $b['jabatan']; ?></td>
                            <td><?= $b['salary']; ?></td>
                            <td><?= $b['iuran_jjk']; ?></td>
                            <td><?= $b['iuran_jkm']; ?></td>
                            <td><?= $b['iuran_jht_tk']; ?></td>
                            <td><?= $b['iuran_jht']; ?></td>
                            <td><?= $b['total_iuran_sos']; ?></td>
                            <td>
                                <a href="javascript:void(0)" class="ml-1 trigger-edit-modal" href="" data-id-sos="<?= $b['id_bpjs_sos'] ?>" data-id-pegawai="<?= $b['id_pegawai'] ?>">
                                    <button type=" button" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>
                                </a>

                                <a href="<?= base_url('admin/hapus-bpjs-jamsostek/' . $b['id_bpjs_sos']) ?>" onclick="return confirm('Yakin Ingin Menghapus?');" class="ml-1 mr-1">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
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
                            <input type="hidden" name="id_bpjs_sos" id="modal__id_bpjs_sos">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-sm-12">ID KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="select__id_pegawai_edit" name="id_pegawai">
                                                <option>-pilih-</option>
                                                <?php foreach ($pegawai_list as $pegawai) : ?>
                                                    <option value="<?= $pegawai['id_pegawai'] ?>"><?= $pegawai['id_pegawai'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">NAMA KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="nama_pegawai" id="modal_add_nama_karyawan_edit" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DEVISI</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="jabatan" id="modal_add_jabatan_edit" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DATA UPAH</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="salary" id="modal_add_salary_edit" class="form-control " readonly>
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
                                            <select class="form-control" id="select__id_pegawai" name="id_pegawai">
                                                <option>-pilih-</option>
                                                <?php foreach ($pegawai_list as $pegawai) : ?>
                                                    <option value="<?= $pegawai['id_pegawai'] ?>"><?= $pegawai['id_pegawai'] ?></option>
                                                <?php endforeach ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">NAMA KARYAWAN</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="nama_pegawai" id="modal_add_nama_karyawan" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DEVISI</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="jabatan" id="modal_add_jabatan" class="form-control " readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">DATA UPAH</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="salary" id="modal_add_salary" class="form-control " readonly>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#select__id_pegawai").on("change", function() {
                    $.post('<?= base_url('admin/ajax_pegawai') ?>', {
                        id_pegawai: $(this).val()
                    }).then(function(response) {
                        console.log(response);
                        $("#modal_add_nama_karyawan").val(response.nama_pegawai);
                        $("#modal_add_jabatan").val(response.jabatan);
                        $("#modal_add_salary").val(response.salary);
                    })
                })
                $("#select__id_pegawai_edit").on("change", function() {
                    $.post('<?= base_url('admin/ajax_pegawai') ?>', {
                        id_pegawai: $(this).val()
                    }).then(function(response) {
                        console.log(response);
                        $("#modal_add_nama_karyawan_edit").val(response.nama_pegawai);
                        $("#modal_add_jabatan_edit").val(response.jabatan);
                        $("#modal_add_salary_edit").val(response.salary);
                    })
                })

                $(".trigger-edit-modal").on("click", function() {
                    $("#modal__id_bpjs_sos").val($(this).data("id-sos"));
                    $("#select__id_pegawai_edit").val($(this).data("id-pegawai")).trigger('change');
                    $("#editBpjsJamsos").modal("show");
                })
                // trigger-edit-modal" data-id-pegawai
                // data-toggle="modal" data-target="#editBpjsJamsos"


            });
        </script>