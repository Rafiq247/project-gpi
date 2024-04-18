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

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Isi Biodata Diri</h1>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart('auth/biodata'); ?>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <input type="hidden" name="temp" class="form-control " value="<?= $temp ?>">
                                        <input type="hidden" name="id_pegawai" class="form-control " value="<?= $id_pegawai ?>">
                                        <input type="hidden" name="id_user" class="form-control " value="<?= $id_user ?>">

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <div>
                                                <input type="text" class="form-control" style="padding: 20px 15px;" id="name" name="name" placeholder="Nama Lengkap" value="<?= $name ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div>
                                                <select class="form-control" id="jekel" name="jekel">
                                                    <option value="">-pilih-</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <div>
                                                <select class="form-control" id="agama" name="agama">
                                                    <option value="">-pilih-</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Khonghucu">Khonghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <div>
                                                <input type="text" name="pendidikan" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Kepegawaian</label>
                                            <div>
                                                <select class="form-control" id="status_pegawai" name="status_pegawai" required>
                                                    <option value="">-pilih-</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="">KTP</label>
                                            <div class="">
                                                <input type="file" name="userfilektp" class="form-control" id="userfilektp" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-12">Email</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" style="padding: 20px 15px;" id="email" name="email" placeholder="Alamat Email" value="<?= $email ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Jabatan</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" id="jabatan" name="jabatan">
                                                    <option value="">-pilih-</option>
                                                    <?php foreach ($jabatan as $j) : ?>
                                                        <option value="<?= $j['id_jabatan'] ?>"> <?= $j['jabatan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">No.Hp</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="nohp" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Alamat</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="alamat" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Tanggal Masuk</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="tgl_msk" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Foto</label>
                                            <div class="col-sm-12">
                                                <input type="file" name="userfilefoto" class="form-control" id="userfilefoto" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-light btn-block text-light p-2 mb-1" style="background-image: linear-gradient(60deg, #2083C6, #98C73B); font-weight: 500;">
                                        Simpan
                                    </button>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <a class="text-primary" href="<?= base_url('auth'); ?>">Kembali ke Login</a>
                                    </div>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>