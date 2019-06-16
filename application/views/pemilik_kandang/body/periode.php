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
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                                <a style="color: #ffffff;" class="btn btn-primary btn-user btn-block"
                                   data-toggle="modal" data-target="#tambahPeriode">
                                    Tambah Periode
                                </a>
                            </div>
                        </form>

                    </div>

                </div>

                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
                <div class="row">
                    <!-- DataTales Example -->
                    <div class="col-md-12">
                        <div class="card shadow mb-6">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Periode</h6>
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
                                            <th class="text-center">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($periode->result_array() as $data) {
                                            if ($data > 0) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url()."pemilik_kandang/Periode/changePage/".$data['id_periode']; ?>">
                                                            <?php echo $data['nomor_periode']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $data['nama_kandang']; ?></td>
                                                    <td><?php echo $data['volume']; ?></td>
                                                    <td><?php echo $data['keterangan']; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-warning" data-toggle="modal"
                                                               data-target="#editPeriode<?= $data['id_periode']; ?>"
                                                               style="color: white"><i style="color: white;" class="fa fa-edit"></i> Edit</a>
                                                            <a id="deletePeriode"
                                                               data-id="<?php echo $data['id_periode']; ?>"
                                                               data-periode="<?= $data['nomor_periode']; ?>"
                                                               data-kandang="<?= $data['id_kandang']; ?>"
                                                               class="btn btn-danger" style="color: white">
                                                                 <i style="color: white;" class="fa fa-trash-alt"></i>
                                                                Delete
                                                            </a>
                                                        </center>
                                                    </td>
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

<!-- Tambah Periode Modal-->
<div class="modal fade" id="tambahPeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Periode</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>pemilik_kandang/Periode/tambahPeriode" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" name="nama_kandang" id="nama_kandang" onchange="getVolume()">
                            <?php foreach ($kandang->result() as $data) { ?>
                                <option value="<?php echo $data->id_kandang; ?>"><?php echo $data->nama_kandang; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="keterangan" placeholder="Keterangan....."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Periode Modal-->
<?php
foreach ($periode->result_array() as $data):
    $id_periode = $data['id_periode'];
    $id_kandang = $data['id_kandang'];
    $keteragan = $data['keterangan'];

    ?>
    <div class="modal fade" id="editPeriode<?= $id_periode; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Periode</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>pemilik_kandang/Periode/editPeriode" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" value="<?= $id_periode ?>" name="id_kandang" hidden/>
                            <select class="form-control" name="nama_kandang" id="nama_kandang" onchange="getVolume()" disabled>
                                <?php foreach ($kandang->result() as $data) { ?>
                                    <option value="<?php echo $id_kandang; ?>"
                                        <?php echo ($id_kandang == $data->id_kandang) ? "selected" : "";?>>
                                        <?php echo $data->nama_kandang; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan....."><?php echo $keteragan; ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?php $this->load->view('pemilik_kandang/footer/footer') ?>
<script src="<?php echo base_url();?>/assets/myjs/myjs.js"></script>
</body>

</html>
