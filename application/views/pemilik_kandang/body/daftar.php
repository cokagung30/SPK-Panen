<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('pemilik_kandang/header/header') ?>

</head>

<body class="bg-dark">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Daftar!</h1>
                        </div>
                        <form class="user" action="<?= base_url(); ?>pemilik_kandang/Daftar/tambahPemilik" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="namaUser"
                                           id="exampleFirstName" placeholder="Nama" value="<?php echo set_value('namaUser')?>">
                                    <span class="text-danger"><?php echo form_error('namaUser'); ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="username"
                                           id="exampleLastName" placeholder="Username" value="<?php echo set_value('username')?>">
                                    <span class="text-danger"><?php echo form_error('username'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="emailAdress"
                                       id="exampleInputEmail" placeholder="Email Address" value="<?php echo set_value('emailAdress')?>">
                                <span class="text-danger"><?php echo form_error('emailAdress'); ?></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="noTelp"
                                       id="exampleInputEmail" maxlength="13" placeholder="No Telp."
                                       onkeypress="return hanyaAngka(event);" value="<?php echo set_value('noTelp')?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="alamat"
                                       id="exampleInputEmail" placeholder="Alamat" value="<?php echo set_value('alamat')?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                           id="exampleInputPassword" placeholder="Password" value="<?php echo set_value('password')?>">
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="repatPassword"
                                           id="exampleRepeatPassword" placeholder="Repeat Password" value="<?php echo set_value('repatPassword')?>">
                                    <span class="text-danger"><?php echo form_error('repatPassword'); ?></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>pemilik_kandang/Login/index">"Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('pemilik_kandang/footer/footer') ?>

</body>

</html>
