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
                                <h6 class="m-0 font-weight-bold text-primary">Data Kandang</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Nomor Kandang</th>
                                            <th>Nama Pemilik</th>
                                            <th>Lokasi</th>
                                            <th>Volume</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kandang->result_array() as $data) {
                                            if ($data > 0) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $data['nama_kandang']; ?></td>
                                                    <td><?php echo $data['nama_pemilik_kandang']; ?></td>
                                                    <td><?php echo $data['lokasi']; ?></td>
                                                    <td><?php echo $data['volume']; ?></td>
                                                </tr>
                                                <?php
                                            } else if ($data == 0){ ?>
                                                <tr>
                                                    <td colspan="6">
                                                        <center>Data Periode Kosong</center>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
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


<?php $this->load->view('ppl/footer/footer') ?>
</body>

</html>
