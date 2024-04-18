<?php

// $koneksi = mysqli_connect('localhost', 'root', '', 'db_kepegawaian');
// //nanti ubah lagi databasenya yg sesuai
// //
// $query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar FROM user");
// $data = mysqli_fetch_array($query);
// $kodeAnggota = $data['kodeTerbesar'];
// $sub_kd = substr($kodeAnggota, -3);
// $urutan = $sub_kd;
// $urutan++;
// $huruf = "P";
// $kodeAnggota = $huruf . sprintf("%03s", $urutan);

$koneksi = mysqli_connect('localhost', 'root', '', 'db_kepegawaian');
$query = mysqli_query($koneksi, "SELECT max(temp) as kodeTerbesar FROM user");
$data = mysqli_fetch_array($query);
$id_user = $data['kodeTerbesar'];
$urutan = (int) ($id_user);
$urutan++;
$huruf_pegawai = "P-00";
$huruf_user = "U-00";
$temp = $urutan;
$id_user = $huruf_user . $urutan;
$id_pegawai = $huruf_pegawai . $urutan;

?>

<body class="login-body">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center mb-3">
                                        <span class="h2"><i class="bi bi-shield-lock"></i> Lupa Password</span>
                                    </div>
                                    <div class="card-body">
                                        <?= $this->session->flashdata('message'); ?>
                                        <?= $this->session->unset_userdata('message'); ?>
                                        <p class="mb-3" style="font-size: large; font-weight: 500;">Kami akan mengirimkan sebuah link ke email anda untuk mengatur ulang password anda yang akan memberikan akses menuju ke halaman ganti ulang password. Pastikan email tersebut sudah terdaftar</p>
                                        <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-user" style="padding: 20px 15px;" id="email" name="email" placeholder="Masukkan Email Anda" required>
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <button type="submit" class="btn btn-outline-light btn-block text-light p-2" style="background-image: linear-gradient(60deg, #2083C6, #98C73B); font-weight: 500;">
                                                Kirim
                                            </button>
                                        </form>
                                        <hr>
                                        <div class="text-center mt-4">
                                            <a class="text-primary" href="<?= base_url('auth'); ?>">Kembali ke Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>