<?php
$query = $this->db->query("SELECT * FROM system_info WHERE id=1");
$info = $query->row();

$sql = $this->db->query("SELECT * FROM barangay_info WHERE id=1");
$bg = $sql->row();

$res_id = $this->session->resident_id;
if ($res_id) {
    $notif_q = $this->db->query("SELECT id FROM request WHERE resident_id=$res_id AND `status` LIKE '%Ready%'");
    $notif = $notif_q->num_rows();
}

$current_page = $this->uri->segment(2);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url() ?>assets/img/123.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/home.css">
    <title><?= $title ?> | <?= $info->sname ?></title>
    <style>
        #wrapper {
            height: 100%;
            background-image: url("assets/img/brgy2.jpg");
            background-size: cover;
        }
    </style>
</head>

<body style="background-color:black">
    <div id="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="<?= site_url() ?>">
                        <h3><?= strtoupper($info->acronym) ?></h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item <?= empty($current_page) ? 'active' : null ?>">
                                <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url() ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item <?= $current_page == 'announcement' ? 'active' : null ?>">
                                <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('client/announcement') ?>">Announcements</a>
                            </li>
                            <li class="nav-item <?= $current_page == 'services' ? 'active' : null ?>">
                                <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('client/services') ?>">Services</a>
                            </li>
                            <li class="nav-item <?= $current_page == 'map' ? 'active' : null ?>">
                                <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('client/map') ?>">Map</a>
                            </li>
                            <li class="nav-item <?= $current_page == 'about-us' ? 'active' : null ?>">
                                <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('client/about-us') ?>">About</a>
                            </li>
                        </ul>
                        <div class="form-inline my-2 my-lg-0">
                            <ul class="navbar-nav mr-auto">
                                <?php if (isset($this->session->username) && $this->session->role == 'resident') : ?>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle nav-link font-weight-bold text-uppercase" data-toggle="dropdown">
                                            <?= ucwords($this->session->username) ?>
                                            <?= ($notif > 0) ? '<badge class="badge badge-danger">' . $notif . '</badge>' : null ?>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="<?= site_url('client/profile') ?>" class="dropdown-item">Profile</a>
                                            <a href="<?= site_url('client/transactions') ?>" class="dropdown-item">Transactions <?= ($notif > 0) ? '<badge class="badge badge-danger">' . $notif . '</badge>' : null ?></a>
                                        </div>
                                    </div>
                                    <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                        <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('auth/logout') ?>">Logout</a>
                                    </li>
                                <?php elseif (isset($this->session->username) && $this->session->role != 'resident') : ?>
                                    <?php if (!empty($this->session->avatar)) : ?>
                                        <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                            <img src="<?= preg_match('/data:image/i', $this->session->avatar) ? $this->session->avatar : site_url() . '/assets/uploads/avatar/' . $this->session->avatar ?>" class="rounded-circle mt-1" width="30">
                                        </li>
                                    <?php else : ?>
                                        <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                            <img src="<?= site_url() ?>/assets/img/person.png" class="rounded-circle mt-1" width="30" height="30">
                                        </li>
                                    <?php endif ?>
                                    <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                        <a class="nav-link font-weight-bold text-uppercase" href="javascript:void(0)">
                                            <?= ucwords($this->session->username) ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                        <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('dashboard') ?>">Dashboard</a>
                                    </li>
                                    <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                        <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('auth/logout') ?>">Logout</a>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item <?= $current_page == 'login' ? 'active' : null ?>">
                                        <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('client/login') ?>">Login</a>
                                    </li>
                                    <li class="nav-item <?= $current_page == 'register' ? 'active' : null ?>">
                                        <a class="nav-link font-weight-bold text-uppercase" href="<?= site_url('client/register') ?>">Register</a>
                                    </li>
                                <?php endif ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>

            <?= $content ?>

        </main>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= site_url() ?>assets/plugins/components/jquery-validation/jquery.validate.min.js"></script>
    <script>
        $("#register_form").validate({
            rules: {
                conpassword: {
                    equalTo: "#password"
                }
            },
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
        });
        $("#login_form").validate({
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
        });
        $("#request_form").validate({
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
        });
        // show password when toggle
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));

            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        const picker = document.getElementById('date1');
        picker.addEventListener('input', function(e) {
            var day = new Date(this.value).getUTCDay();
            if ([6, 0].includes(day)) {
                e.preventDefault();
                this.value = '';
                alert('Weekends not allowed');
            }
        });

        $('#pment_method').change(function() {
            var pment = $(this).val();

            if (pment == 'Gcash') {
                $("#ref_no").prop('required', true);
            } else {
                $("#ref_no").prop('required', false);
            }
        })
    </script>
</body>

</html>