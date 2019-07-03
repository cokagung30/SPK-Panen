<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <?php $this->load->view('pemilik_kandang/header/header') ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('pemilik_kandang/header/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('pemilik_kandang/header/navbar') ?>
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
                                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <div class="col-md-4">
                                            <form>
                                                <div class="form-group">
                                                    <a style="color: #ffffff;" class="btn btn-sm btn-primary"
                                                       data-toggle="modal" data-target="#addPegawai">
                                                        Tambah Pegawai
                                                    </a>
                                                </div>
                                            </form>

                                        </div>
                                        <tr>
                                            <th>Nama Kandang</th>
                                            <th>Nama Pegawai</th>
                                            <th>NO Telp</th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($sql1->result_array() as $data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['nama_kandang']; ?></td>
                                                <td><?php echo $data['nama_pegawai']; ?></td>
                                                <td><?php echo $data['no_telp']; ?></td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-warning" data-toggle="modal"
                                                           data-target="#editPegawai<?= $data['id_pegawai']; ?>" style="color: white"><i
                                                                    style="color: white;"
                                                                    class="fa fa-edit"></i> Edit</a>
                                                        <a id="deletePegawai" data-id="<?php echo $data['id_pegawai']; ?>"
                                                           class="btn btn-danger" style="color: white"><i
                                                                    style="color: white;"
                                                                    class="fa fa-trash-alt"></i> Delete</a>
                                                    </center>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
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
        <?php $this->load->view('pemilik_kandang/footer/hakcipta') ?>
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
<div class="modal fade" id="addPegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url()?>pemilik_kandang/Pegawai/tambahPegawai" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <select class="form-control" name="nama_kandang">
                            <?php foreach ($kandang->result() as $data) { ?>
                                <option value="<?php echo $data->id_kandang; ?>"><?php echo $data->nama_kandang; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Pegawai" name="namaPegawai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="noTelp"
                               id="exampleInputEmail" maxlength="13" placeholder="No Telp."
                               onkeypress="return hanyaAngka(event);" value="<?php echo set_value('noTelp') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Password" name="Password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit"> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    foreach ($sql1->result() as $data):
        $id_pegawai = $data->id_pegawai;
        $id_kandang = $data->id_kandang;
        $nama_pegawai = $data->nama_pegawai;
        $no_telp = $data->no_telp;
        $username = $data->username;
        $password = $data->password;
?>
        <div class="modal fade" id="editPegawai<?= $id_pegawai; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pegawai</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= base_url()?>pemilik_kandang/Pegawai/editPegawai" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" >Nama Kandang</label>
                                <input value="<?= $id_pegawai; ?>" name="id_pegawai" hidden>
                                <select class="form-control" name="id_kandang">
                                    <?php foreach ($kandang->result() as $data) { ?>
                                        <option value="<?= $data->id_kandang; ?>" <?= ($id_kandang == $data->id_kandang)? "selected" : ""; ?>>
                                            <?php echo $data->nama_kandang; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" >Nama Pegawai</label>
                                <input type="text" class="form-control" placeholder="Nama Pegawai" value="<?= $nama_pegawai; ?>" name="namaPegawai">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" >No Telp</label>
                                <input type="text" class="form-control form-control-user" name="noTelp"
                                       id="exampleInputEmail" maxlength="13" placeholder="No Telp."
                                       onkeypress="return hanyaAngka(event);" value="<?= $no_telp; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" >Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="Username" value="<?= $username; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" >Password</label>
                                <input type="text" class="form-control" placeholder="Password" name="Password" value="<?= $password; ?>">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit"> Simpan</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php endforeach; ?>

<?php $this->load->view('pemilik_kandang/footer/footer') ?>
</body>

</html>
