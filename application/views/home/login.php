<div class="container text-light">
    <div class="text-center mt-3 bg-white text-dark p-5">
        <h1 class="welcome_text">Barangay <?= $info->brgy_name ?></h1>
        <div class="row  mt-5">
            <div class="col-md-4">
                <img src="<?= site_url('assets/uploads/') . $info->brgy_logo ?>" class="img-fluid brgy">
            </div>
            <div class="col-md-8 mt-5">
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-<?= $this->session->flashdata('success') ?> alert-dismissible fade show" role="alert">
                        <small><?= $this->session->flashdata('message') ?></small>
                    </div>
                <?php endif ?>
                <form method="POST" action="<?= site_url('auth/loginRes') ?>" id="login_form">
                    <div class="form-group">
                        <input class="form-control-lg w-100" placeholder="Username" required name="username" />
                    </div>
                    <div class="form-group">
                        <input class="form-control-lg w-100" id="password" name="password" type="password" required="" placeholder="Password" />
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password">Show</span>
                    </div>
                    <a class="text-left mb-2" href="#forgotPassword" data-toggle="modal">Forgot Password?</a>
                    <button class="btn btn-warning btn-lg w-100 mt-3" type="submit" style="border-radius: 1px;">LOGIN</button>
                    <p class="mt-3">Don't have an account? <a href="<?= site_url('client/register') ?>">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('home/modal') ?>