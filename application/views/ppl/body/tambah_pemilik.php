<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <?php $this->load->view('ppl/header/header') ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('ppl/header/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('ppl/header/navbar') ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card o-hidden border-0 shadow-lg my-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambahkan Data Pemilik Kandang!</h1>
                                    </div>
                                    <form class="user" action="<?= base_url(); ?>ppl/Pemilik_kandang/validation" method="post">
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
                                            <input type="text" class="form-control form-control-user" name="emailAdress"
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
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- DataTales Example -->
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<?php $this->load->view('ppl/footer/footer') ?>
</body>

</html>
