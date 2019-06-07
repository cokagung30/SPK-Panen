<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <?php $this->load->view('pegawai/header/header') ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('pegawai/header/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('pegawai/header/navbar') ?>
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
                                <h6 class="m-0 font-weight-bold text-primary">Data Periode Kandang</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nomor Periode</th>
                                            <th>Nama Kandang</th>
                                            <th>Volume Kandang</th>
                                            <th>Keterangan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($periode->result_array() as $data) {
                                            if ($data > 0) {
                                                ?>
                                                <tr>
                                                    <td><a href="<?php
                                                            echo base_url(); ?>pegawai/Periode/pindahPage/<?= $data['nomor_periode']; ?>">
                                                            <?php echo $no++ ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data['nomor_periode']; ?></td>
                                                    <td><?php echo $data['nama_kandang']; ?></td>
                                                    <td><?php echo $data['volume']; ?></td>
                                                    <td><?php echo $data['keterangan']; ?></td>
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
        <?php $this->load->view('pegawai/footer/hakcipta') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<?php $this->load->view('pegawai/footer/footer') ?>
</body>

</html>
