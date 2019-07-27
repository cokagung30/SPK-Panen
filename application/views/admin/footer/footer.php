<!--End Footer area-->
<script src="<?php echo base_url(); ?>assets/home/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/home/js/nav.js"></script>
<!--waypoint js-->
<script src="<?php echo base_url(); ?>assets/home/vendores/waypoint/waypoints.min.js"></script>
<!--counter js-->
<script src="<?php echo base_url(); ?>assets/home/vendores/couterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/home/vendores/typedjs/typed.min.js"></script>
<script src="<?php echo base_url(); ?>assets/home/vendores/ripples/jquery.ripples-min.js"></script>
<script type="<?php echo base_url(); ?>assets/home/text/javascript" src="<?= base_url();?>assets/home/js/scrollIt.min.js"></script>
<script type="<?php echo base_url(); ?>assets/home/text/javascript" src="<?= base_url();?>assets/home/js/wow.js"></script>
<script src="<?php echo base_url(); ?>assets/home/js/custom.js"></script>
<script>
    $(function () {
        $.scrollIt();
    });
</script>
<script>
    new WOW().init();
</script>
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

    var flashdata = $('.flash').data('flash');
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

    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $(document).on("click", ".hapusDataAyam", function () {
        var id_pemilik_kandang = $(this).data('pemilik');

        Swal.fire({
            title: 'Are you sure?',
            text: "Apakah anda ingin menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
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