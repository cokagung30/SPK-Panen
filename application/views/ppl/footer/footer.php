<div class="modal fade" id="logoutModalPPL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                <a class="btn btn-primary" href="<?= base_url(); ?>ppl/Login/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateppl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>ppl/Login/updateppl">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Nama</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('id_ppl'); ?>"
                               name="id_ppl" hidden>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama_ppl'); ?>"
                               name="nama_ppl">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12">No Telp</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('no_telp_ppl'); ?>"
                               name="no_telp">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Alamat</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('alamat_ppl'); ?>"
                               name="alamat">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Username</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('username_ppl'); ?>"
                               name="username">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12">Password</label>
                        <input id="password" type="password" class="form-control"
                               value="<?= $this->session->userdata('password_ppl'); ?>" name="password">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck"
                                   onclick="showPassword();">
                            <label class="custom-control-label" for="customCheck">Show Password</label>
                        </div>
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
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/sweetalert/sweetalert2.all.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script>
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

    var flashdata = $('.flash-update-ppl').data('flashupdateppl');
    if (flashdata === "berhasil") {
        Swal.fire({
            title: 'Success',
            text: 'Data Berhasil Di Edit',
            fontSize: '5000px',
            type: 'success'
        });
    } else if (flashdata === "updated") {
        Swal.fire({
            title: 'Success',
            text: 'Data Berhasil Di Update',
            fontSize: '5000px',
            type: 'success'
        });
    } else if (flashdata === "failure") {
        Swal.fire({
            title: 'Failure',
            text: 'Data Gagal Di Update',
            fontSize: '5000px',
            type: 'error'
        });
    }

    var approve = $('.approve').data('approve');
    if (approve === "approved") {
        Swal.fire(
            'Berhasil',
            'Data berhasil ditambahkan',
            'success').then((willDelete) => {
            window.location.href = '<?= base_url(); ?>ppl/Persetujuan/index';
        });
    } else if (approve === "not_approved") {
        Swal.fire({
            title: 'Failure',
            text: 'Data Gagal Di Update',
            fontSize: '5000px',
            type: 'error'
        });
    }



</script>