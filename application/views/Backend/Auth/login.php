<body class="login-body">

  <!--Login Wrapper-->

  <div class="container-fluid login-wrapper">
    <div class="login-box">
      <h1 class="text-center" style="margin-bottom: 32px;"><i class="fa fa-user text-theme"></i> SISTEM PENGGAJIAN</h1>
      <div class="row fw-bold">
        <div class="justify col-md-6 col-sm-6 col-12 login-box-info" style="background-image: linear-gradient(60deg, #2083C6, #98C73B);">
          <div class="h3 text-bold mb-3">PT. Global Printpack Indonesia</div>
          <img src="<?= base_url() ?>/assets/img/logo-gpi.png">
        </div>
        <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
          <div class="h3 text-center mb-4">Login</div>

          <strong><?= $this->session->flashdata('message'); ?></strong>
          <?= $this->session->unset_userdata('message'); ?>

          <form class="user" method="post" action="<?= base_url('auth'); ?>" class="mt-2">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>">
            </div>
            <div class="mb-3"><?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?></div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3"><?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></div>

            <div class="form-group mt-4">
              <button class="btn btn-outline-light btn-block text-light p-2 mb-1" style="background-image: linear-gradient(60deg, #2083C6, #98C73B); font-weight: 500;">Login</button>
            </div>
          </form>
          <hr>
          <!-- <div class="text-center mt-4" style="font-size: 14px;">
            Lupa password? <a class="text-primary" style="font-size: 14px;" href="<?= base_url('auth/forgot-password'); ?>">Klik disini!</a>
          </div> -->
          <!-- <div class="text-center" style="font-size: 14px;">
            Tidak mempunyai akun? <a class="text-primary" style="font-size: 14px;" href="<?= base_url('auth/registration'); ?>">Daftar akun</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>