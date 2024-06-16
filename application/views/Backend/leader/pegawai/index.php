 <!--Content right-->

 <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    ?>

 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
     <?php if ($this->session->flashdata('flash')) : ?>
         <div class="alert alert-info alert-dismissible fade show" role="alert">
             <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
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
         </div>

         <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>NAMA PEGAWAI</th>
                         <th>STATUS KEPEGAWAIAN</th>
                         <th>TANGGAL MASUK</th>
                         <th>JABATAN</th>
                         <th>NO.HP</th>
                         <!-- <th>AKSI</th> -->
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1; ?>
                     <?php if (isset($pegawai) && is_array($pegawai))
                            foreach ($pegawai as $b) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $b['nama_pegawai']; ?></td>
                             <td>
                                 <?php if ($b['status_kepegawaian'] == 1) : ?>
                                     aktif
                                 <?php else : ?>
                                     tidak aktif
                                 <?php endif ?>
                             <td><?= $b['tanggal_masuk']; ?></td>
                             <td><?= $b['namjab']; ?></td>
                             <td><?= $b['no_hp']; ?></td>
                             <!-- <td width="120px">
                                 <div class="row">
                                     <a href="<?= base_url('leader/detail-pegawai') ?>/<?= $b['id_pegawai']; ?>" class="ml-2">
                                         <button type="button" class="btn btn-theme">
                                             <i class="fa fa-eye"></i>
                                         </button>
                                     </a>
                                 </div>
                             </td> -->
                         </tr>
                     <?php endforeach ?>
                 </tbody>

             </table>
         </div>