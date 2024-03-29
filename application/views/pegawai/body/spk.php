<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SPK</title>
    <!--    favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/image/fav-icon.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/home/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/animate.css">
    <!--css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/home/css/style.css">
    <!-- HTmL5 shim and Respond.js for IE8 support of HTmL5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<section class="hero-area-fix">
    <div class="hero-area" id="water">
        <div class="container">
            <div class="row">
                <div class="hero-text">
                    <h1>SISTEM PENDUKUNG KEPUTUSAN</h1>
                    <div id="typed-strings">
                        <h3>Panen Ayam Ras Pedaging</h3>
                        <h3>Ayam Broiler</h3>
                    </div>
                    <h3><span id="typed"></span></h3>
                    <h4>Andalan Ternak Makmur</h4>
                    <a href="<?= base_url();?>pegawai/Login/index" class="btn view-demo">Login</a>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-landing pro_d" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <h2 class="title">Home onepage Demos</h2>
            <div class="col-md-2 col-sm-6 col-xs-12">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="<?php echo base_url(); ?>assets/home/theme/index.html" target="_blank">
                    <div class="item-imag">
                        <img src="<?php echo base_url(); ?>assets/home/image/product/index-1.png" class="img-responsive radius" alt="">
                        <p class="product-title">OnePage - 01</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="<?php echo base_url(); ?>assets/home/theme/index-2.html" target="_blank">
                    <div class="item-imag">
                        <img src="<?php echo base_url(); ?>assets/home/image/product/index-2.png" class="img-responsive radius" alt="">
                        <p class="product-title">OnePage - 02</p>
                    </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
            </div>
        </div>
    </div>
</section>
<footer class="footer-area">
    <div class="container">
        <div class="row text-center">
            <p>SPK Panen ayam Broiler <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Widya</a></p>
        </div>
    </div>
</footer>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/scrollIt.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/home/js/wow.js"></script>
<script src="<?php echo base_url(); ?>assets/home/js/custom.js"></script>
<script>
    $(function() {
        $.scrollIt();
    });
</script>
<script>
    new WOW().init();
</script>
</body>

</html>
