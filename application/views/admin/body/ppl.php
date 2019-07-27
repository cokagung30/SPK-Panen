<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('admin/header/header') ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('admin/header/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('admin/header/navbar') ?>
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
                                <h6 class="m-0 font-weight-bold text-primary text-center"> Data PPL</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <div class="col-md-4">
                                            <form>
                                                <div class="form-group">
                                                    <a style="color: #ffffff;" class="btn btn-sm btn-primary"
                                                       data-toggle="modal" data-target="#tambahppl">
                                                        Tambah PPL
                                                    </a>
                                                </div>
                                            </form>

                                        </div>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama PPL</th>
                                            <th>No Telp PPL</th>
                                            <th>Alamat PPL</th>
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($sql1->result() as $data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data->nama_ppl; ?></td>
                                                <td><?php echo $data->no_telp; ?></td>
                                                <td><?php echo $data->alamat; ?></td>
                                                <td><?php echo $data->username; ?></td>
                                                <td class="text-right"><?php echo $data->volume; ?></td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#editPpl<?= $data->id_ppl; ?>" style="color: white"><i style="color: white;"
                                                                                                                                                                                   class="fa fa-edit"></i> Edit</a>
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
        <?php $this->load->view('admin/footer/hakcipta') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Tambah Modal-->
<div class="modal fade" id="tambahppl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kandang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/PPL/tambahPpl">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama PPL" name="nama_ppl">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="No Telp" name="no_telp">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Edit Modal-->
<?php $this->load->view('pemilik_kandang/footer/footer') ?>
</body>

</html>
