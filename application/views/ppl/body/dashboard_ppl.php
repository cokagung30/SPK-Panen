<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('ppl/header/header') ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('ppl/header/sidebar')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('ppl/header/navbar')?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4 text-center"  >
                        <a href="<?= base_url(); ?>ppl/kandang/index">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="col-auto text-center">
                                    <i class="fas fa-home fa-2x text-gray-300"></i>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemilik Kandang
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Jumlah Pemilik Kandang
                                                : <?= $jumlah_kandang; ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
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

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url();?>pegawai/Login/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('ppl/footer/footer') ?>
</body>

</html>
