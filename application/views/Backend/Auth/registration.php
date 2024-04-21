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
			<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Daftar Akun Kepegawaian</h1>
								</div>
								<strong><?= $this->session->flashdata('message'); ?></strong>
								<?= $this->session->unset_userdata('message'); ?>
								<div class="card-body">
									<form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
										<input type="hidden" name="temp" class="form-control " value="<?= $temp ?>">
										<input type="hidden" name="id_pegawai" class="form-control " value="<?= $id_pegawai ?>">
										<input type="hidden" name="id_user" class="form-control " value="<?= $id_user ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user text-center" id="id_user" name="id_user" placeholder="Pegawai ID" value="<?php echo $id_user; ?>" readonly>
											<?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" style="padding: 20px 15px;" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>" required>
											<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" style="padding: 20px 15px;" id="email" name="email" placeholder="Alamat Email" required>
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group row mb-4">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="password" class="form-control form-control-user" style="padding: 20px 15px;" id="password1" name="password1" placeholder="Kata Sandi" required>
												<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
											<div class="col-sm-6">
												<input type="password" class="form-control form-control-user" style="padding: 20px 15px;" id="password2" name="password2" placeholder="Ulangi Kata Sandi" required>
											</div>
										</div>
										<button type="submit" class="btn btn-outline-light btn-block text-light p-2 mb-1" style="background-image: linear-gradient(60deg, #2083C6, #98C73B); font-weight: 500;">
											Daftar Akun
										</button>
									</form>
									<hr>
									<div class="text-center mt-4">
										Sudah punya akun? <a class="text-primary medium" href="<?= base_url('auth'); ?>">Silahkan Login!</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>