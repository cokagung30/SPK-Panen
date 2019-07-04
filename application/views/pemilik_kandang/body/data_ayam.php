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

                <!-- DataTales Example -->
                <div class="card shadow mb-6">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Ayam
                            <?php
                            foreach ($jumlahData->result() as $item) {
                                ?>
                                <a class="btn btn-info" style="color: white; margin-left: 20px;"
                                    <?= ($item->ip < 250) ? 'hidden' : '' ?>
                                   href="<?= base_url() ?>pemilik_kandang/Data_ayam/nilaiNormalisasi/<?= $this->session->userdata('id_periode_kandang'); ?>">
                                    <i class="fa fa-brain"></i> Keputusan</a>
                            <?php }
                            ?>
                        </h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Umur</th>
                                    <th>Tanggal</th>
                                    <th>FCR</th>
                                    <th>Mortalitas</th>
                                    <th>Harga Jual</th>
                                    <th>IP</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($dataKandang->result() as $item) { ?>
                                    <tr>
                                        <td><?= $item->keterangan; ?></td>
                                        <td><?= $item->umur; ?></td>
                                        <td><?= $item->tanggal; ?></td>
                                        <td><?= round($item->fcr, 2); ?></td>
                                        <td><?= $item->mortalitas; ?></td>
                                        <td><?= $item->harga; ?></td>
                                        <td><?= $item->ip; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <?php foreach ($keputusan->result() as $value) :?>
                                    <tfoot <?= ($keputusan->num_rows() > 0) ? '' : 'hidden' ?>>
                                    <tr>
                                        <td colspan="5" class="text-center">Keputusan Panen dengan nilai Preferensi <?= $value->preferensi; ?> :</td>
                                        <td><?= $value->status; ?></td>
                                        <td>
                                            <a id="uploadData"
                                               class="btn btn-primary"
                                               data-kandang="<?= $item->id_kandang; ?>"
                                               data-pemilik="<?= $this->session->userdata('id_user'); ?>"
                                               data-ayam="<?= $item->id_data_ayam; ?>"
                                               style="color: white">
                                                <i style="color: white;" class="fa fa-upload"></i> Send
                                            </a>
                                        </td>
                                    </tr>
                                    </tfoot>
                                <?php endforeach; ?>
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
                        <input type="text" class="form-control" placeholder="Nama Periode" name="namaPeriode"
                               value="<?= $this->session->userdata('keterangan'); ?>" disabled>
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
<?php $this->load->view('pemilik_kandang/footer/footer') ?>
</body>

</html>
