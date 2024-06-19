 <!--Main Content-->

 <div class="row main-content">
   <!--Sidebar left-->
   <div class="col-sm-3 col-xs-6 sidebar pl-0">
     <div class="inner-sidebar mr-3">
       <!--Image Avatar-->
       <div class="avatar text-center">
         <img src="<?php echo base_url() . '/gambar/pegawai/' . $user['image']; ?>" alt="" class="rounded-circle" />
         <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span> -->
         <p><strong><?= $user['name']; ?></strong></p>
         <span class="text-primary small"><strong>Selamat Datang</strong></span>
       </div>

       <!--Sidebar Navigation Menu-->
       <div class="sidebar-menu-container">
         <ul class="sidebar-menu mt-4 mb-4">
           <li class="parent">
             <a href="<?= base_url() ?>leader" class=""><i class="fa fa-dashboard mr-3"> </i>
               <span class="none">Dashboard</span>
             </a>
           </li>
           <!-- <li class="parent">
             <a href="" onclick="toggle_menu('tentang'); return false" class=""><i class="fa fa-book mr-3"> </i>
               <span class="none">Tentang<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="tentang">
               <li class="child"><a href="<?= base_url() ?>leader/visi_misi" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Visi & Misi</a></li>
               <li class="child"><a href="<?= base_url() ?>leader/sejarah" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Sejarah Perusahaan</a></li>
             </ul>
           </li> -->
           <li class="parent">
             <a href="" onclick="toggle_menu('datamaster'); return false" class=""><i class="fa fa-book mr-3"> </i>
               <span class="none">Data Pegawai<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="datamaster">
               <li class="child"><a href="<?= base_url() ?>leader/pegawai" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Informasi Pegawai</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('absensi'); return false" class=""><i class="fa fa-pencil-square-o mr-3"> </i>
               <span class="none">Pengajuan Izin Absen<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="absensi">
               <li class="child"><a href="<?= base_url() ?>leader/absen-harian" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Ambil Izin</a></li>
               <!-- <li class="child"><a href="<?= base_url() ?>leader/konfirmasi-absen" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Konfirmasi Absen</a></li> -->
             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('konfirmasi'); return false" class=""><i class="fa fa-bookmark mr-3"> </i>
               <span class="none">Data Izin Absen<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="konfirmasi">
               <li class="child"><a href="<?= base_url() ?>leader/konfirmasi_pegawai" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Konfirmasi Izin Absen Pegawai</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="#" onclick="toggle_menu('tunjangan'); return false" class=""><i class="fa fa-money mr-3"> </i>
               <span class="none">Gaji & Absen<i class="fa fa-angle-down pull-right align-bottom"></i></span>
             </a>
             <ul class="children" id="tunjangan">
               <li class="child"><a href="<?= base_url() ?>leader/laporan-tpp-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Rincian Gaji Anda</a></li>
               <li class="child"><a href="<?= base_url() ?>leader/absen-bulanan" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Rincian Absen Anda</a></li>
             </ul>
           </li>
           <li class="parent">
             <a href="<?= base_url() ?>auth/logout" class=""><i class="fa fa-power-off mr-3"> </i>
               <span class="none">Keluar</span>
             </a>
           </li>
         </ul>
       </div>

       <!--Sidebar Naigation Menu-->
     </div>
   </div>
   <!--Sidebar left-->