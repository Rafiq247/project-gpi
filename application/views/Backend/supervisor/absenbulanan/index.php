 <!--Content right-->

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
         <h6 class="mb-4 bc-header">Rekap Absensi</h6>
       </div>
     </div>
     <div class="table-responsive">
       <table id="recap" class="table table-striped table-bordered">
         <thead>
           <tr>
             <th>No</th>
             <th>ID KARYAWAN</th>
             <th>NAMA</th>
             <th>KEHADIRAN</th>
             <th>OVERTIME</th>
             <th>TANGGAL/WAKTU</th>
             <th>KODE VERIFIKASI</th>
           </tr>
         </thead>
         <tbody>
           <?php $no = 1; ?>
           <?php
            foreach ($recap as $b) : ?>
             <tr>
               <td><?= $no++ ?></td>
               <td><?= $b['id_pegawai'] ?></td>
               <td><?= $b['name'] ?></td>
               <td><?= $b['hadir'] ?></td>
               <td><?= $b['overtime'] ?></td>
               <td><?= $b['date'] ?></td>
               <td><?= $b['kode_verifikasi'] ?></td>
             </tr>
           <?php endforeach ?>
         </tbody>

       </table>
     </div>
   </div>