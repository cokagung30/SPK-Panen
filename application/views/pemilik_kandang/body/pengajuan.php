<!DOCTYPE html>
<html lang="en">

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
                                <h6 class="m-0 font-weight-bold text-primary text-center"> Data Pengajuan Panen</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Periode</th>
                                            <th>Umur</th>
                                            <th>FCR</th>
                                            <th>Mortalitas</th>
                                            <th>IP</th>
                                            <th>Status</th>
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
                                                <td><?php echo $no++ ?></td>
                                                <!--                                                <td>--><?php //echo $data->id_data_ayam; ?><!--</td>-->
                                                <td><?php echo $data->keterangan; ?></td>
                                                <td><?php echo $data->umur; ?></td>
                                                <td><?php echo $data->fcr; ?></td>
                                                <td><?php echo $data->mortalitas; ?></td>
                                                <td><?php echo $data->ip; ?></td>
                                                <td><?php echo $data->status; ?></td>
                                                <td>
                                                    <center>
                                                        <a id="deletePengajuan" data-id="<?php echo $data->id_kandang; ?>" class="btn btn-danger" style="color: white"><i style="color: white;"
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



<!--Edit Modal-->

<?php $this->load->view('pemilik_kandang/footer/footer') ?>
</body>

</html>
