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
                <a class="btn btn-primary" href="<?= base_url();?>pemilik_kandang/Login/logout">Logout</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>pemilik_kandang/Login/updatePemilik">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >Nama</label>
                    <input type="text" class="form-control" value="<?= $this->session->userdata('id_pemilik_kandang'); ?>" name="id_pemilik_kandang" hidden>
                    <input type="text" class="form-control" value="<?= $this->session->userdata('nama_user'); ?>" name="nama_pemilil_kandang">
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >No Telp</label>
                    <input type="text" class="form-control" value="<?= $this->session->userdata('no_telp'); ?>" name="no_telp">
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >Email</label>
                    <input type="text" class="form-control" value="<?= $this->session->userdata('email'); ?>" name="email">
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" >username</label>
                    <input type="text" class="form-control" value="<?= $this->session->userdata('username'); ?>" name="username">
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
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url();?>/assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url();?>/assets/myjs/myjs.js"></script>
<script type="text/javascript">
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    var flashdata = $('.flash-data').data('flashdata');
    if (flashdata === "berhasil"){
        Swal.fire({
            title: 'Success',
            text: 'Data Berhasil Di Tambahkan',
            fontSize : '5000px',
            type: 'success'
        });
    } else if (flashdata === "updated"){
        Swal.fire({
            title: 'Success',
            text: 'Data Berhasil Di Update',
            fontSize : '5000px',
            type: 'success'
        });
    } else if (flashdata === "failure"){
        Swal.fire({
            title: 'Failure',
            text: 'Data Gagal Di Update',
            fontSize : '5000px',
            type: 'error'
        });
    }

    $(document).on("click", "#deleteKandang", function () {
        var id_kadang = $(this).data('id');
        console.log(id_kadang);
        Swal.fire({
            title: 'Are Anda yakin?',
            text: "Apakah anda ingin menghapus data kandang ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>pemilik_kandang/Kandang/deleteKandang",
                    data: {'id_kandang':id_kadang},
                    success: function () {
                        Swal.fire('Deleted!',
                            'Your file has been deleted.',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>pemilik_kandang/Kandang/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
    $(document).on("click", "#deletePeriode", function () {
        var id_periode = $(this).data('id');
        var nomor_periode = $(this).data('periode');
        var id_kandang = $(this).data('kandang');
        console.log(id_kandang);
        Swal.fire({
            title: 'Are you sure?',
            text: "Apakah anda ingin menghapus data periode ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>pemilik_kandang/Periode/deletePeriode",
                    data: {'id_periode':id_periode, 'nomor' : nomor_periode, 'kandang' : id_kandang},
                    success: function () {
                        Swal.fire('Deleted!',
                            'Your file has been deleted.',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>pemilik_kandang/Periode/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
    $(document).on("click", "#deletePegawai", function () {
        var id_pegawai = $(this).data('id');
        console.log(id_pegawai);
        Swal.fire({
            title: 'Are you sure?',
            text: "Apakah anda ingin menghapus data pegawai ini?",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url();?>pemilik_kandang/Pegawai/deletePegawai",
                    data: {'id_pegawai': id_pegawai},
                    success: function () {
                        Swal.fire('Deleted!',
                            'Your file has been deleted.',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>pemilik_kandang/Pegawai/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });

    $(document).on("click", "#uploadData", function () {
        var id_pemilik_kandang = $(this).data('pemilik');
        const id_data_ayam = $(this).data('ayam');

        Swal.fire({
            title: 'Are you sure?',
            text: "Apakah anda ingin mengupload data ini?",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Upload'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url();?>pemilik_kandang/Pengajuan/kirimPengajuan",
                    data: {'id_pemilik_kandang': id_pemilik_kandang, 'id_data_ayam': id_data_ayam},
                    success: function () {
                        Swal.fire('Uploaded!',
                            'Your file has been uploaded.',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>pemilik_kandang/Pengajuan/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
</script>