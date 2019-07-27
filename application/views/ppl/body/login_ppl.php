<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SPK</title>
    <!--    favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/vendor/image/fav-icon.png" type="image/x-icon">
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
<div class="row">
    <div class="col-sm-8">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-sm-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!--                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                    <div class="col-md-11">
                        <div class="p-5">
                            <div class="text-center">
                                <br><br>
                                <br><br>
                                <br>
                            </div>
                            <form class="user" action="<?= base_url(); ?>ppl/Login/login" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                           id="exampleInputEmail" aria-describedby="emailHelp"
                                           placeholder="Enter Username...." name="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                           id="password" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" onclick="showPassword();">
                                        <label class="custom-control-label" for="customCheck">Show Password</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <?php echo $this->session->flashdata("error"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/footer/footer'); ?>
</body>

</html>
