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
                <div class="approve" data-approve="<?= $this->session->flashdata('approve'); ?>"></div>
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
                                            <th>No</th>
                                            <th>Periode</th>
                                            <th>Pemilik Kandang</th>
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
                                                <td><?php echo $data->keterangan; ?></td>
                                                <td><?php echo $data->nama_pemilik_kandang; ?></td>
                                                <td><?php echo $data->umur; ?></td>
                                                <td><?php echo $data->fcr; ?></td>
                                                <td><?php echo $data->mortalitas; ?></td>
                                                <td><?php echo $data->ip; ?></td>
                                                <td><?php echo $data->status; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url(); ?>pemilik_kandang/Persetujuan/reports/<?= $data->id_pengajuan; ?>"
                                                       class="btn btn-success" style="color: white"><i style="color: white;" class="fa fa-print">
                                                        </i> Print</a>
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



<!--Tambah Modal-->

<?php
foreach ($sql1->result() as $data):
    $id_pengajuan = $data->id_pengajuan;
    $umur = $data->umur;
    $keterangan = $data->keterangan;
    $fcr = $data->fcr;
    $mortalitas = $data->mortalitas;
    $ip = $data->ip;
    $status_kelayakan = $data->status;

    ?>
    <div class="modal fade" id="viewpengajuan<?= $id_pengajuan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url(); ?>ppl/Pengajuan/aprovePengajuan/<?= $id_pengajuan; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" >Status</label>
                            <input type="radio"  name="persetujuan" value="Setuju">Setuju
                            <input type="radio"  name="persetujuan" value="Tidak Setuju" > Tidak Setuju
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" >Catatan</label>
                            <textarea class="form-control" placeholder="Catatan Anda..." name="catatan"></textarea>
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
