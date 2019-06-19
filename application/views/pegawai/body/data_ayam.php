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
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                                <a style="color: #ffffff;" class="btn btn-primary btn-user btn-block"
                                   data-toggle="modal" data-target="#tambahAyam">
                                    Tambah Data Harian Ayam
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

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
                                    <th>Jumlah Pakan</th>
                                    <th>Harga Jual</th>
                                    <th colspan="2">
                                        <center>Action</center>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($dataKandang->result() as $item) { ?>
                                    <tr>
                                        <td><?= $item->nomor_periode; ?></td>
                                        <td><?= $item->tanggal; ?></td>
                                        <td><?= $item->umur; ?></td>
                                        <td><?= $item->berat_rata; ?></td>
                                        <td><?= $item->jml_mati; ?></td>
                                        <td><?= $item->jml_pakan; ?></td>
                                        <td><?= $item->harga; ?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-warning" data-toggle="modal"
                                                   data-target="#editDataAyam<?= $item->id_data_ayam; ?>"
                                                   style="color: white"><i style="color: white;" class="fa fa-edit"></i>
                                                    Edit</a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a class="btn btn-danger" data-toggle="modal"
                                                   data-target="#hapusDataAyam"
                                                   style="color: white"><i style="color: white;"
                                                                           class="fa fa-trash"></i>
                                                    Delete</a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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

<?php foreach ($dataKandang->result() as $data) :
    $id_data_ayam = $data->id_data_ayam;
    $umur = $data->umur;
    $jml_mati = $data->jml_mati;
    $berat_rata = $data->berat_rata;
    $jml_pakan = $data->jml_pakan;
    $tanggal = $data->tanggal;
    $harga = $data->harga;
    ?>
<div class="modal fade" id="editDataAyam<?= $id_data_ayam ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Harian Ayam</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>pegawai/Data_ayam/updateDataAyam">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Periode" name="namaPeriode"
                               value="<?= $this->session->userdata('keterangan'); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" value="<?= $tanggal; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Umur" name="umur" value="<?= $umur; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Berat rata-rata" name="beratrata" value="<?= $berat_rata; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Jumlah Ayam Mati" name="jumlahmati" value="<?= $jml_mati; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Jumlah Pakan Habis" name="jumlahpakan" value="<?= $jml_pakan ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Harga Jual" name="hargajual" value="<?= $harga; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php $this->load->view('pegawai/footer/footer') ?>
</body>

</html>
