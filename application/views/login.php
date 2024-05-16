<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header') ?>
    <title><?= $title ?> | <?= $info->sname ?></title>
    
</head>

<body class="mini-sidebar fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    
    <section id="wrapper" class="login-register">
    <div class="text-center m-t-30">
        <h2 class="text-white font-bold"><?= $info->sname ?></h2>
    </div>
        <div class="login-box">
            <div class="white-box">

                <?php if($this->session->flashdata('errors') !== null): ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span><?= $this->session->flashdata('errors'); ?></span>
                    </div>
                <?php endif ?>

                <form class="form-horizontal form-material" id="loginform" action="<?= site_url('auth/loginSubmit') ?>" method="POST">
                    <div class="text-center">
                        <img class="img img-fluid m-b-30 m-t-20" src="<?= site_url() ?>assets/img/123.png" width="70">
                        <!-- <h3 class="box-title m-b-20">Sign In</h3> -->
                    </div>
                   
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-40">
                        <div class="col-sm-12 text-center">
                            <p>Powered by: <a href="javascript:void(0)" class="text-primary m-l-5"><b><?= $info->powered_b ?></b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <?php $this->load->view('templates/footer') ?>
</body>

</html>