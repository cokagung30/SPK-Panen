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

                <!-- Content Row -->
                <div class="row">
                    <!-- Grow In Utility -->
                </div>
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
                <div class="row">
                    <!-- DataTales Example -->
                    <div class="col-md-12">
                        <div class="card shadow mb-6">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">Data Pemilik Kandang</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-md-12 text-right">
                                        <a href="<?= base_url(); ?>ppl/Pemilik_kandang/formPemilik" style="color: #ffffff; margin-bottom: 20px;" class="btn btn-sm btn-primary">
                                            Tambah Pemilik Kandang
                                        </a>
                                    </div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Pemilik Kandang</th>
                                            <th>Alamat</th>
                                            <th>NO Telp</th>
                                            <th>Email</th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        $jumlah_data = $pemilik_kandang->num_rows();
                                        if ($jumlah_data == 0){
                                            ?>
                                            <tr class="text-center">
                                                <td colspan="6">Data Pemilik Kandang Kosong</td>
                                            </tr>
                                        <?php } else {
                                        foreach ($pemilik_kandang->result() as $value):
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->nama_pemilik_kandang; ?></td>
                                            <td><?= $value->alamat; ?></td>
                                            <td><?= $value->no_telp; ?></td>
                                            <td><?= $value->email; ?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning" data-toggle="modal"
                                                       data-target="#viewPemilik<?= $value->id_pemilik_kandang; ?>" style="color: white">Preview<i
                                                                style="color: white;"
                                                </center>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php
                                        endforeach;
                                        } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php $this->load->view('ppl/footer/hakcipta') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="tambahpemilik1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemilik Kandang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url() ?>ppl/Pemilik_kandang/tambahPemilikKandang" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Pemilik Kandang"
                               name="nama_pemilik_kandang" value="<?php echo set_value('nama_pemilik_kandang') ?>">
                        <span class="text-danger"><?php echo form_error('nama_pemilik_kandang'); ?></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username"
                               name="username" value="<?php echo set_value('username') ?>">
                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Email" name="email"
                                   value="<?php echo set_value('email') ?>">
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control form-control-user" name="no_telp"
                                   id="exampleInputEmail" maxlength="13" placeholder="No Telp."
                                   onkeypress="return hanyaAngka(event);" value="<?php echo set_value('no_telp') ?>">
                            <span class="text-danger"><?php echo form_error('no_telp'); ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Password" name="password"
                                   value="<?php echo set_value('password') ?>">
                            <span class="text-danger"><?php echo form_error('password'); ?></span>

                        </div>

                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Repeat Password" name="repassword"
                                   value="<?php echo set_value('repassword') ?>">
                            <span class="text-danger"><?php echo form_error('repassword'); ?></span>

                        </div>

                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="alamat"
                                  placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
                        <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"> Simpan</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--modal Edit-->
<?php
foreach ($pemilik_kandang->result() as $data):
    $id_pemilik_kandang = $data->id_pemilik_kandang;
    $nama_pemilik_kandang = $data->nama_pemilik_kandang;
    $no_telp = $data->no_telp;
    $alamat = $data->alamat;
    $email = $data->email;
    $username = $data->username;
    $password = $data->password;
    ?>
    <div class="modal fade" id="viewPemilik<?= $id_pemilik_kandang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pemilik Kandang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url(); ?>ppl/Pemilik_kandang/viewPemilik">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $id_pemilik_kandang; ?>"
                                   name="id_pemilik_kandang" hidden>
                            <input type="text" class="form-control" value="<?= $nama_pemilik_kandang; ?>"
                                   name="nama_pemilik_kandang" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $no_telp; ?>" name="no_telp"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $alamat; ?>" name="alamat" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $email; ?>" name="email" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $username; ?>" name="username"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $password; ?>" name="password"
                                   readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->load->view('ppl/footer/footer') ?>

</body>

</html>
