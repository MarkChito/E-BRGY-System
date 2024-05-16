<?php
$query1 = $this->db->query("SELECT sname FROM system_info WHERE id=1");
$ss = $query1->row();

$query2 = $this->db->query("SELECT * FROM cert_settings WHERE id=1");
$certs = $query2->row();
?>
<?php $current_page = $this->uri->segment(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header') ?>
    <title><?= $title ?> | <?= $ss->sname ?></title>
</head>

<body class="fix-header mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <?php $this->load->view('templates/topbar') ?>
        <!-- ===== Top-Navigation-End ===== -->

        <!-- ===== Left-Sidebar ===== -->
        <?php $this->load->view('templates/sidebar') ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alertSuccess" id="success">
                            <i class="icon-check"></i> <span id="msg"></span> <a href="#" class="closed">×</a>
                        </div>

                        <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alertError">
                            <i class="icon-info"></i> <span id="alertErrorMessage"></span> <a href="#" class="closed">&times;</a>
                        </div>

                        <?php if ($this->session->flashdata('errors') !== null) : ?>
                            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alertSuccess" style="display:block">
                                <i class="icon-check"></i> <?= $this->session->flashdata('errors'); ?> <a href="#" class="closed">×</a>
                            </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('message') !== null) : ?>
                            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alertSuccess" style="display:block">
                                <i class="icon-check"></i> <?= $this->session->flashdata('message'); ?> <a href="#" class="closed">×</a>
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                                <h2 class="m-0">Generate <?= ($title) ?></h2>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right m-b-10">
                                <?php if ($current_page == 'generate_brgy_cert') : ?>
                                    <button onclick="openBrgCert_Pment()" class="btn btn-info btn-outline" type="button"> <span><i class="fa fa-check"></i> Payment</span> </button>
                                <?php elseif ($current_page == 'generate_indi_cert') : ?>
                                    <button onclick="openIndiCert_Pment()" class="btn btn-info btn-outline" type="button"> <span><i class="fa fa-check"></i> Payment</span> </button>
                                <?php elseif ($current_page == 'generate_resi_cert') : ?>
                                    <button onclick="openResiCert_Pment();" class="btn btn-info btn-outline" type="button"> <span><i class="fa fa-check"></i> Payment</span> </button>
                                <?php elseif ($current_page == 'generate_cert') : ?>
                                    <button onclick="openCustomCert_Pment()" class="btn btn-info btn-outline" type="button"> <span><i class="fa fa-check"></i> Payment</span> </button>
                                <?php elseif ($current_page == 'generate_business_permit') : ?>
                                    <button onclick="openPermit_Pment()" class="btn btn-info btn-outline" type="button"> <span><i class="fa fa-check"></i> Payment</span> </button>
                                <?php endif ?>

                                <?php if ($this->session->flashdata('paid') !== null || $current_page == 'view_cert') : ?>
                                    <button id="print" class="btn btn-danger btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="white-box printableArea">
                            <div class="row" style="margin-bottom:2px;">
                                <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                                    <img src="<?= site_url() . 'assets/uploads/' . $info->city_logo ?>" class="img-fluid" width="120">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                    <h5 class="m-b-0" style="line-height:1.2">Republic of the Philippines <br>Province of <?= ucwords($info->province) ?> <br> <?= $info->town ?></h5>
                                    <h3 class="font-bold m-b-0 m-t-0"><?= ucwords($info->brgy_name) ?></i></h2>
                                        <p class="m-t-0 font-12 font-bold">Contact No. <?= $info->number ?>/Email:<?= $info->email ?></p>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                                    <img src="<?= site_url() . 'assets/uploads/' . $info->brgy_logo ?>" class="img-fluid" width="120">
                                </div>
                            </div>
                            <div class="row" id="cert_cont">
                                <div class="col-md-4 col-sm-4 col-xs-4 text-center" style="background-color: <?= $certs->color_bg ?> !important" id="cert_sidebar">
                                    <h5 class="font-bold m-b-0 m-t-20">SANGUNIANG <?= ucwords($info->brgy_name) ?> </h5>
                                    <h5 class="font-bold"><?= $info->starts . '-' . $info->end ?></h5>
                                    <?php if (!empty($captain->avatar)) : ?>
                                        <img src="<?= site_url() . 'assets/uploads/avatar/' . $captain->avatar ?>" alt="Captain Profile" class="b-all m-t-10" width="100" height="100">
                                    <?php endif ?>
                                    <h5 class="m-t-10 font-bold m-b-0"><?= strtoupper($captain->name) ?></h5>
                                    <p class="text-dark">Punong Barangay</p>
                                    <h5 class="m-t-30 m-b-20 font-bold">SANGUNIANG BARANGAY KAGAWAD</h5>
                                    <?php if (!empty($kagawad)) : ?>
                                        <?php foreach ($kagawad as $row) : ?>
                                            <h5 class="m-b-20 font-bold m-t-0"><?= strtoupper($row['name']) ?></h5>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    <h6 class="m-t-40"></h6>
                                    <?php if (!empty($selected_off)) : ?>
                                        <?php foreach ($selected_off as $row) : ?>
                                            <h5 class="m-t-20 font-bold m-b-0"><?= strtoupper($row['name']) ?></h5>
                                            <p class="text-dark"><?= $row['position'] ?></p>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8" id="cert_body">
                                    <img src="<?= site_url() . 'assets/uploads/' . $certs->watermark ?>" class="img-fluid" width="400" id="brgy_logo">
                                    <div id="cert_content">
                                        <div class="text-center">
                                            <h5 class="m-t-20 m-b-0 font-bold">OFFICE OF THE PUNONG BARANGAY</h5>
                                        </div>
                                        <div class="text-center">
                                            <h2 class="m-t-10 font-bold"><?= strtoupper($title) ?></h2>
                                        </div>

                                        <!-- page content -->
                                        <?= $content ?>

                                    </div>
                                    <?php if ($current_page == 'generate_brgy_cert' || $current_page == 'generate_indi_cert' || $current_page == 'generate_resi_cert') : ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 text-center" style="margin-bottom:-30px;" style="<?= $current_page == 'generate_brgy_cert' ? null : 'visibility:hidden' ?>">
                                                    <?php if (empty($this->session->flashdata('pic_on')) || $this->session->flashdata('pic_on') == 'pic_on') : ?>
                                                        <?php if (!empty($resident->picture)) : ?>
                                                            <img src="<?= preg_match('/data:image/i', $resident->picture) ? $resident->picture : site_url() . 'assets/uploads/resident_profile/' . $resident->picture ?>" alt="Resident Profile" class="b-all" width="100" height="68">
                                                        <?php else : ?>
                                                            <img src="<?= site_url() . 'assets/img/person.png' ?>" alt="Resident Profile" class="b-all" width="100" height="100">
                                                        <?php endif ?>
                                                    <?php endif ?>

                                                    <div class="m-t-40">
                                                        <?php if (empty($this->session->flashdata('res_sig_on')) || $this->session->flashdata('res_sig_on') == 'res_sig_on') : ?>
                                                            <p style="border-top: 1px solid black;">signature</p>
                                                        <?php endif ?>
                                                    </div>

                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6 text-center" style="position:relative; top:30px">
                                                    <?php if (empty($this->session->flashdata('signature')) || $this->session->flashdata('signature') == 'On') : ?>
                                                        <img src="<?= site_url() . '/assets/uploads/' . $certs->signature ?>" class="m-t-40 m-b-0" width="150" style="position:absolute; top:-70px; left:20%">
                                                    <?php endif ?>
                                                    <div class="p-2 text-bottom mt-5">
                                                        <h6 class="font-bold m-b-0 "><?= strtoupper($captain->name) ?></h6>
                                                        <p class="">PUNONG BARANGAY</p>
                                                    </div>
                                                    <?php if ($this->session->flashdata('official')) : ?>
                                                        <p class="m-b-0 text-left m-t-20">By:</p>
                                                        <div class="text-center">
                                                            <h6 class="font-bold m-b-0 text-uppercase"><u><?= $this->session->flashdata('official') ?></u></h6>
                                                            <p class="m-b-0">Barangay Official On Duty</p>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6 text-left m-t-20">
                                                    <p><?= empty($this->session->flashdata('initials')) ? null : $this->session->flashdata('initials') ?></p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 text-left" style="margin-top:-20px">

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <span style="position: absolute;bottom:0; right:10px"><?= !empty($this->session->flashdata('valid')) ? 'Valid Until: ' . date('F d, Y', strtotime($this->session->flashdata('valid'))) : null ?> </span>
                                </div>
                            </div>
                            <div class="row b-l b-r b-b m-b-0" id="cert_remarks">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h6>Remarks: <br><b><?= empty($this->session->flashdata('remarks')) ? null : $this->session->flashdata('remarks') ?></b></h6>

                                    <img src="<?= site_url() . '/assets/uploads/' . $certs->flag ?>" class="img-fluid" width="160" id="flag">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                    <img src="<?= site_url() . '/assets/uploads/' . $certs->motto ?>" class="m-t-30 img-fluid" width="200">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer t-a-c"> © <?= date('Y') ?> <?= $ss->sname ?></footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('modal/brgy_info.php') ?>
    <?php $this->load->view('modal/modals.php') ?>
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php $this->load->view('templates/footer') ?>
    <?php $this->load->view('payments/modal') ?>

</body>

</html>