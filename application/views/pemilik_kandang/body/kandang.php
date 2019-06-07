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
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                                <a style="color: #ffffff;" class="btn btn-primary btn-user btn-block"
                                   data-toggle="modal" data-target="#tambahKandang">
                                    Tambah Kandang
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
                                <h6 class="m-0 font-weight-bold text-primary text-center"> Data Kandang</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kandang</th>
                                            <th>Lokasi Kandang</th>
                                            <th>Volume Kandang</th>
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
                                                <td><a href="<?= base_url(); ?>"><?php echo $no++; ?></a></td>
                                                <td><?php echo $data->nama_kandang; ?></td>
                                                <td><?php echo $data->lokasi; ?></td>
                                                <td class="text-right"><?php echo $data->volume; ?></td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#editKandang<?= $data->id_kandang; ?>" style="color: white"><i style="color: white;"
                                                                                      class="fa fa-edit"></i> Edit</a>
                                                        <a id="deleteKandang" data-id="<?php echo $data->id_kandang; ?>" class="btn btn-danger" style="color: white"><i style="color: white;"
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

<!-- Tambah Modal-->
<div class="modal fade" id="tambahKandang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kandang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>pemilik_kandang/Kandang/insertKandang">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Kandang" name="namaKandang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Alamat Kandang" name="alamatKandang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Volume Kandang" name="volumeKandang"
                               onkeypress="return hanyaAngka(event);">
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
<?php
    foreach ($sql1->result() as $data):
        $id_kandang = $data->id_kandang;
        $nama_kandang = $data->nama_kandang;
        $alamat = $data->lokasi;
        $volume = $data->volume;

?>
<div class="modal fade" id="editKandang<?= $id_kandang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kandang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>pemilik_kandang/Kandang/updateKandang">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $id_kandang; ?>" name="id_kandang" hidden>
                        <input type="text" class="form-control" value="<?= $nama_kandang; ?>" name="namaKandang">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="alamatKandang"><?= $alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $volume; ?>" name="volumeKandang"
                               onkeypress="return hanyaAngka(event);">
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
<?php $this->load->view('pemilik_kandang/footer/footer') ?>
</body>

</html>
