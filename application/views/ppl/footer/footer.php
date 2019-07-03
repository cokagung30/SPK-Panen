
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
                <a class="btn btn-primary" href="<?= base_url();?>ppl/Login/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pplModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>ppl/Login/updatePpl">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12" >Nama</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('id_ppl'); ?>" name="id_ppl" hidden>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama_user'); ?>" name="nama_ppl">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5 col-sm-5 col-xs-12" >No Telp</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('no_telp'); ?>" name="no_telp">
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
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>
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
</script>