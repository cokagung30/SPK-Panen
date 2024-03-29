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


                <!-- DataTales Example -->
                <div class="card shadow mb-6">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Ayam</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Tanggal</th>
                                    <th>Umur</th>
                                    <th>Berat Rata</th>
                                    <th>Jumlah Ayam Mati</th>
                                    <th>Jumlah Pakan </th>
                                    <th>Harga Jual</th>
                                </tr>
                                </thead>
                            </table>
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
<!-- Tambah Modal-->
<div class="modal fade" id="tambahAyam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Harian Ayam</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>pegawai/Data_ayam/insertDataAyam">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Periode" name="namaPeriode" value="<?= $this->session->userdata('keterangan'); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Tanggal" name="tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Umur" name="umur">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Berat rata-rata" name="beratrata">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Jumlah Ayam Mati" name="jumlahmati">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Jumlah Pakan Habis" name="jumlahpakan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Harga Jual" name="hargajual">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php $this->load->view('pegawai/footer/footer') ?>
</body>

</html>
