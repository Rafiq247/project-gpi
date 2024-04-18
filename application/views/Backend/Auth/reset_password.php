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
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Buat Password Baru Anda</h1>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="<?= base_url('auth/updatepassword'); ?>">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">

                                        <label>Password Baru</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" style="padding: 20px 15px;" id="password1" name="password1" placeholder="Password" required>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <label>Ulangi Password Baru</label>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" style="padding: 20px 15px;" id="password2" name="password2" placeholder="Ulangi Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-outline-light btn-block text-light p-2 mb-1" style="background-image: linear-gradient(60deg, #2083C6, #98C73B); font-weight: 500;">
                                            Reset Password
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>