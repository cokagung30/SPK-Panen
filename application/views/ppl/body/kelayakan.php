<!DOCTYPE html>
<html lang="en">

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
                                <h6 class="m-0 font-weight-bold text-primary text-center">Kelayakan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>

                                            <th>Batas Atas</th>
                                            <th>Batas Bawah</th>
                                            <th>Keterangan</th>
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

                                                <td><?php echo $data->batas_atas; ?></td>
                                                <td><?php echo $data->batas_bawah; ?></td>
                                                <td><?php echo $data->status; ?></td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#editKandang<?= $data->id_kelayakan; ?>" style="color: white"><i style="color: white;"
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

<!--Edit Modal-->
<?php
    foreach ($sql1->result() as $data):
        $id_kelayakan = $data->id_kelayakan;
        $batas_atas = $data->batas_atas;
        $batas_bawah = $data->batas_bawah;
        $status = $data->status;

?>
<div class="modal fade" id="editKandang<?= $id_kelayakan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kelayakan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>ppl/Kelayakan/updateKelayakan">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $id_kelayakan; ?>" name="id_kelayakan" hidden>
                        <input value="<?= $status; ?>" name="status" hidden>
                        <input type="text" class="form-control" value="<?= $batas_atas; ?>" name="batas_atas">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $batas_bawah; ?>" name="batas_bawah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Edit</button>
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
