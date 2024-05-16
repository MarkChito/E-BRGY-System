<?php  
    $query1 = $this->db->query("SELECT sname FROM system_info WHERE id=1");
    $info = $query1->row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header') ?>
    <title><?= $title ?> | <?= $info->sname ?></title>
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

                        <?php if($this->session->flashdata('errors') !== null): ?>
                            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alertSuccess" style="display:block"> 
                                <i class="icon-check"></i> <?= $this->session->flashdata('errors'); ?> <a href="#" class="closed">×</a> 
                            </div>
                        <?php endif ?>

                        <?php if($this->session->flashdata('message') !== null): ?>
                            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alertSuccess" style="display:block"> 
                                <i class="icon-check"></i> <?= $this->session->flashdata('message'); ?> <a href="#" class="closed">×</a> 
                            </div>
                        <?php endif ?>

                        <!-- page content -->
					    <?= $content ?> 
                        
                        
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer t-a-c"> © <?= date('Y') ?> <?= $info->sname ?></footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php  $this->load->view('modal/brgy_info.php') ?>
    <?php  $this->load->view('modal/modals.php') ?>
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php $this->load->view('templates/footer') ?>
</body>

</html>
