    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    /*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method

*/




    // backend riri
    // halaman login
    // $route['Login'] = 'auth/index';
    // dashboard
    $route['admin/dashboard'] = 'admin/index';
    // jabatan
    $route['admin/jabatan'] = 'admin/jabatan';
    $route['admin/tambah-jabatan'] = 'admin/tambah_jabatan';
    $route['admin/hapus-jabatan/(:any)'] = 'admin/hapus_jabatan/$1';
    $route['admin/edit-jabatan'] = 'admin/edit_jabatan';
    // Pegawai
    $route['admin/pegawai'] = 'admin/pegawai';
    $route['admin/tambah-pegawai'] = 'admin/tambah_pegawai';
    $route['admin/edit-pegawai'] = 'admin/edit_pegawai';
    $route['admin/hapus-pegawai/(:any)/(:any)'] = 'admin/hapus_pegawai/$1/$2';
    $route['admin/detail-pegawai/(:any)'] = 'admin/detail_pegawai/$1';
    //akun
    $route['admin/akun-pegawai'] = 'admin/akun_pegawai';
    $route['admin/reset-password/(:any)'] = 'admin/reset_password/$1';
    //lembur pegawai

    $route['admin/tampil-konfirmasi'] = 'admin/tampil_konfirmasi';
    $route['admin/konfirmasi-absen/(:any)'] = 'admin/konfirmasi_absen/$1';
    $route['admin/konfirmasi-absen-pulang/(:any)'] = 'admin/konfirmasi_absen_pulang/$1';
    $route['admin/konfirmasi-absen-lembur/(:any)/(:any)'] = 'admin/konfirmasi_absen_lembur/$1/$2';
    $route['admin/konfirmasi-absen-izinsakit/(:any)'] = 'admin/konfirmasi_absen_izin_sakit/$1';
    $route['admin/konfirmasi-absen-izin-tidak-masuk/(:any)'] = 'admin/konfirmasi_absen_izin_tdkmsk/$1';
    $route['admin/acc-izin/(:any)'] = 'admin/izinStatusAcc/$1';
    $route['admin/hapus-izin/(:any)'] = 'admin/izinStatusDenied/$1';


    $route['admin/tampil-input'] = 'admin/tampilInput';
    $route['admin/input-absensi'] = 'admin/inputAbsensi';
    $route['admin/input-fingerprint'] = 'admin/inputFingerPrintId';
    $route['admin/hapus-fingerprint/(:any)'] = 'admin/deleteFingerPrintId/$1';
    $route['admin/hapus-input-absen/(:any)'] = 'admin/deleteInputAbsensi/$1';
    $route['admin/edit-absensi'] = 'admin/editAbsensi';
    $route['admin/edit-fingerprint'] = 'admin/editFingerprint';


    $route['admin/tambah-lembur'] = 'admin/lembur_pegawai';
    $route['admin/simpan-lembur'] = 'admin/simpan_lembur_pegawai';
    $route['admin/edit-lembur'] = 'admin/edit_lembur_pegawai';
    $route['admin/hapus-lembur/(:any)'] = 'admin/hapus_lembur_pegawai/$1';
    $route['admin/tambah-lembur'] = 'admin/lembur_pegawai';



    $route['admin/absen-bulanan'] = 'admin/absen_bulanan';
    $route['admin/cetak-absen-bulanan/(:any)/(:any)/(:any)'] = 'admin/cetak_absen_bulanan/$1/$2/$3';
    $route['admin/detail-absen/(:any)'] = 'admin/detail_absen/$1';


    // lembur bulanan
    $route['admin/lembur-bulanan'] = 'admin/lembur_bulanan';
    $route['admin/cetak-absen-lembur/(:any)/(:any)'] = 'admin/cetak_absen_lembur/$1/$2';
    // TPP GAJI
    $route['admin/tpp-bulanan'] = 'admin/tpp_bulanan';
    $route['admin/input-data-tpp'] = 'admin/inputPayrol';
    $route['admin/laporan-tpp-bulanan'] = 'admin/laporan_tpp_bulanan';
    $route['admin/detail-laporan-tpp/(:any)/(:any)/(:any)'] = 'admin/detail_laporan_tpp_bulanan/$1/$2/$3';
    // $route['admin/cetak-payrol-pegawai/(:any)/(:any)/(:any)'] = 'admin/cetak_payrol_pegawai/$1/$2/$3';
    $route['admin/cetak-payrol-pegawai/(:any)'] = 'admin/cetak_payrol_pegawai/$1';
    $route['admin/hapus-payrol/(:any)'] = 'admin/hapusPayrol/$1';



    $route['admin/akumulasi-gaji'] = 'admin/akumulasi_gaji';
    $route['admin/simpan-gaji'] = 'admin/simpan_gaji';
    $route['admin/edit-gaji'] = 'admin/edit_gaji';
    $route['admin/hapus-gaji/(:any)'] = 'admin/hapus_gaji/$1';
    // $route['admin/cetak-absen-lembur/(:any)/(:any)'] = 'admin/cetak_absen_lembur/$1/$2';

    // $route['admin/detail-absen/(:any)'] = 'admin/detail_absen/$1';


    // Route Supervisor
     // jabatan
     $route['supervisor/jabatan'] = 'supervisor/jabatan';
     $route['supervisor/tambah-jabatan'] = 'supervisor/tambah_jabatan';
     $route['supervisor/hapus-jabatan/(:any)'] = 'supervisor/hapus_jabatan/$1';
     $route['supervisor/edit-jabatan'] = 'supervisor/edit_jabatan';
     // Pegawai
     $route['supervisor/pegawai'] = 'supervisor/pegawai';
     $route['supervisor/tambah-pegawai'] = 'supervisor/tambah_pegawai';
     $route['supervisor/edit-pegawai'] = 'supervisor/edit_pegawai';
     $route['supervisor/hapus-pegawai/(:any)/(:any)'] = 'supervisor/hapus_pegawai/$1/$2';
     $route['supervisor/detail-pegawai/(:any)'] = 'supervisor/detail_pegawai/$1';
     //akun
     $route['supervisor/akun-pegawai'] = 'supervisor/akun_pegawai';
     $route['supervisor/reset-password/(:any)'] = 'supervisor/reset_password/$1';
     //lembur pegawai
 
     $route['supervisor/tampil-konfirmasi'] = 'supervisor/tampil_konfirmasi';
     $route['supervisor/konfirmasi-absen/(:any)'] = 'supervisor/konfirmasi_absen/$1';
     $route['supervisor/konfirmasi-absen-pulang/(:any)'] = 'supervisor/konfirmasi_absen_pulang/$1';
     $route['supervisor/konfirmasi-absen-lembur/(:any)/(:any)'] = 'supervisor/konfirmasi_absen_lembur/$1/$2';
     $route['supervisor/konfirmasi-absen-izinsakit/(:any)'] = 'supervisor/konfirmasi_absen_izin_sakit/$1';
     $route['supervisor/konfirmasi-absen-izin-tidak-masuk/(:any)'] = 'supervisor/konfirmasi_absen_izin_tdkmsk/$1';
     $route['supervisor/acc-izin/(:any)'] = 'supervisor/izinStatusAcc/$1';
     $route['supervisor/hapus-izin/(:any)'] = 'supervisor/izinStatusDenied/$1';
 
 
     $route['supervisor/tampil-input'] = 'supervisor/tampilInput';
     $route['supervisor/input-absensi'] = 'supervisor/inputAbsensi';
     $route['supervisor/input-fingerprint'] = 'supervisor/inputFingerPrintId';
     $route['supervisor/hapus-fingerprint/(:any)'] = 'supervisor/deleteFingerPrintId/$1';
     $route['supervisor/hapus-input-absen/(:any)'] = 'supervisor/deleteInputAbsensi/$1';
     $route['supervisor/edit-absensi'] = 'supervisor/editAbsensi';
     $route['supervisor/edit-fingerprint'] = 'supervisor/editFingerprint';
 
 
     $route['supervisor/tambah-lembur'] = 'supervisor/lembur_pegawai';
     $route['supervisor/simpan-lembur'] = 'supervisor/simpan_lembur_pegawai';
     $route['supervisor/edit-lembur'] = 'supervisor/edit_lembur_pegawai';
     $route['supervisor/hapus-lembur/(:any)'] = 'supervisor/hapus_lembur_pegawai/$1';
     $route['supervisor/tambah-lembur'] = 'supervisor/lembur_pegawai';
 
 
 
     $route['supervisor/absen-bulanan'] = 'supervisor/absen_bulanan';
     $route['supervisor/cetak-absen-bulanan/(:any)/(:any)/(:any)'] = 'supervisor/cetak_absen_bulanan/$1/$2/$3';
     $route['supervisor/detail-absen/(:any)'] = 'supervisor/detail_absen/$1';
 
 
     // lembur bulanan
     $route['supervisor/lembur-bulanan'] = 'supervisor/lembur_bulanan';
     $route['supervisor/cetak-absen-lembur/(:any)/(:any)'] = 'supervisor/cetak_absen_lembur/$1/$2';
     // TPP GAJI
     $route['supervisor/tpp-bulanan'] = 'supervisor/tpp_bulanan';
     $route['supervisor/input-data-tpp'] = 'supervisor/inputPayrol';
     $route['supervisor/laporan-tpp-bulanan'] = 'supervisor/laporan_tpp_bulanan';
     $route['supervisor/detail-laporan-tpp/(:any)/(:any)/(:any)'] = 'supervisor/detail_laporan_tpp_bulanan/$1/$2/$3';
     // $route['supervisor/cetak-payrol-pegawai/(:any)/(:any)/(:any)'] = 'supervisor/cetak_payrol_pegawai/$1/$2/$3';
     $route['supervisor/cetak-payrol-pegawai/(:any)'] = 'supervisor/cetak_payrol_pegawai/$1';
     $route['supervisor/hapus-payrol/(:any)'] = 'supervisor/hapusPayrol/$1';
 
 
 
     $route['supervisor/akumulasi-gaji'] = 'supervisor/akumulasi_gaji';
     $route['supervisor/simpan-gaji'] = 'supervisor/simpan_gaji';
     $route['supervisor/edit-gaji'] = 'supervisor/edit_gaji';
     $route['supervisor/hapus-gaji/(:any)'] = 'supervisor/hapus_gaji/$1';
     // $route['supervisor/cetak-absen-lembur/(:any)/(:any)'] = 'supervisor/cetak_absen_lembur/$1/$2';
 
     // $route['supervisor/detail-absen/(:any)'] = 'supervisor/detail_absen/$1';


    // Route Leader
     // jabatan
     $route['leader/jabatan'] = 'leader/jabatan';
     $route['leader/tambah-jabatan'] = 'leader/tambah_jabatan';
     $route['leader/hapus-jabatan/(:any)'] = 'leader/hapus_jabatan/$1';
     $route['leader/edit-jabatan'] = 'leader/edit_jabatan';
     // Pegawai
     $route['leader/pegawai'] = 'leader/pegawai';
     $route['leader/tambah-pegawai'] = 'leader/tambah_pegawai';
     $route['leader/edit-pegawai'] = 'leader/edit_pegawai';
     $route['leader/hapus-pegawai/(:any)/(:any)'] = 'leader/hapus_pegawai/$1/$2';
     $route['leader/detail-pegawai/(:any)'] = 'leader/detail_pegawai/$1';
     //akun
     $route['leader/akun-pegawai'] = 'leader/akun_pegawai';
     $route['leader/reset-password/(:any)'] = 'leader/reset_password/$1';
     //lembur pegawai
 
     $route['leader/tampil-konfirmasi'] = 'leader/tampil_konfirmasi';
     $route['leader/konfirmasi-absen/(:any)'] = 'leader/konfirmasi_absen/$1';
     $route['leader/konfirmasi-absen-pulang/(:any)'] = 'leader/konfirmasi_absen_pulang/$1';
     $route['leader/konfirmasi-absen-lembur/(:any)/(:any)'] = 'leader/konfirmasi_absen_lembur/$1/$2';
     $route['leader/konfirmasi-absen-izinsakit/(:any)'] = 'leader/konfirmasi_absen_izin_sakit/$1';
     $route['leader/konfirmasi-absen-izin-tidak-masuk/(:any)'] = 'leader/konfirmasi_absen_izin_tdkmsk/$1';
     $route['leader/acc-izin/(:any)'] = 'leader/izinStatusAcc/$1';
     $route['leader/hapus-izin/(:any)'] = 'leader/izinStatusDenied/$1';
 
 
     $route['leader/tampil-input'] = 'leader/tampilInput';
     $route['leader/input-absensi'] = 'leader/inputAbsensi';
     $route['leader/input-fingerprint'] = 'leader/inputFingerPrintId';
     $route['leader/hapus-fingerprint/(:any)'] = 'leader/deleteFingerPrintId/$1';
     $route['leader/hapus-input-absen/(:any)'] = 'leader/deleteInputAbsensi/$1';
     $route['leader/edit-absensi'] = 'leader/editAbsensi';
     $route['leader/edit-fingerprint'] = 'leader/editFingerprint';
 
 
     $route['leader/tambah-lembur'] = 'leader/lembur_pegawai';
     $route['leader/simpan-lembur'] = 'leader/simpan_lembur_pegawai';
     $route['leader/edit-lembur'] = 'leader/edit_lembur_pegawai';
     $route['leader/hapus-lembur/(:any)'] = 'leader/hapus_lembur_pegawai/$1';
     $route['leader/tambah-lembur'] = 'leader/lembur_pegawai';
 
 
 
     $route['leader/absen-bulanan'] = 'leader/absen_bulanan';
     $route['leader/cetak-absen-bulanan/(:any)/(:any)/(:any)'] = 'leader/cetak_absen_bulanan/$1/$2/$3';
     $route['leader/detail-absen/(:any)'] = 'leader/detail_absen/$1';
 
 
     // lembur bulanan
     $route['leader/lembur-bulanan'] = 'leader/lembur_bulanan';
     $route['leader/cetak-absen-lembur/(:any)/(:any)'] = 'leader/cetak_absen_lembur/$1/$2';
     // TPP GAJI
     $route['leader/tpp-bulanan'] = 'leader/tpp_bulanan';
     $route['leader/input-data-tpp'] = 'leader/inputPayrol';
     $route['leader/laporan-tpp-bulanan'] = 'leader/laporan_tpp_bulanan';
     $route['leader/detail-laporan-tpp/(:any)/(:any)/(:any)'] = 'leader/detail_laporan_tpp_bulanan/$1/$2/$3';
     // $route['leader/cetak-payrol-pegawai/(:any)/(:any)/(:any)'] = 'leader/cetak_payrol_pegawai/$1/$2/$3';
     $route['leader/cetak-payrol-pegawai/(:any)'] = 'leader/cetak_payrol_pegawai/$1';
     $route['leader/hapus-payrol/(:any)'] = 'leader/hapusPayrol/$1';
 
 
 
     $route['leader/akumulasi-gaji'] = 'leader/akumulasi_gaji';
     $route['leader/simpan-gaji'] = 'leader/simpan_gaji';
     $route['leader/edit-gaji'] = 'leader/edit_gaji';
     $route['leader/hapus-gaji/(:any)'] = 'leader/hapus_gaji/$1';
     // $route['leader/cetak-absen-lembur/(:any)/(:any)'] = 'leader/cetak_absen_lembur/$1/$2';
 
     // $route['leader/detail-absen/(:any)'] = 'leader/detail_absen/$1';
    
    // Pegwai
    $route['pegawai/edit-profil/(:any)'] = 'pegawai/edit_profil/$1';
    $route['pegawai/edit-password/(:any)'] = 'pegawai/edit_password/$1';
    $route['pegawai/absen-harian'] = 'pegawai/absen_harian';
    $route['pegawai/ambilabsen'] = 'pegawai/ambil_absen';
    $route['pegawai/ambilabsen-pulang'] = 'pegawai/ambil_absen_pulang';
    $route['pegawai/ambilabsen-lembur'] = 'pegawai/ambil_absen_lembur';
    $route['pegawai/izin-pegawai'] = 'pegawai/cuti_pegawai';
    $route['pegawai/konfirmasi-absen'] = 'pegawai/konfirmasi_absen';
    $route['pegawai/absen-bulanan'] = 'pegawai/absen_bulanan';
    $route['pegawai/detail-absen/(:any)'] = 'pegawai/detail_absen/$1';
    $route['pegawai/laporan-tpp-bulanan'] = 'pegawai/laporan_tpp_bulanan';
    $route['pegawai/detail-laporan-tpp/(:any)/(:any)/(:any)'] = 'pegawai/detail_laporan_tpp_bulanan/$1/$2/$3';
    $route['pegawai/cetak-payrol-pegawai/(:any)/(:any)/(:any)'] = 'pegawai/cetak_payrol_pegawai/$1/$2/$3';


    // Auth
    $route['auth/forgot-password'] = 'auth/forgotpassword';
    // $route['forgot-password/sendToken'] = 'forgotpassword/sendToken';
    $route['auth/forgot-password/reset/(:any)'] = 'auth/forgotpassword/reset/$1';
    $route['auth/reset-password'] = 'auth/reset_password';



    $route['default_controller'] = 'auth';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;
