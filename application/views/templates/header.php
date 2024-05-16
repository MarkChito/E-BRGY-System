<?php $current_page = $this->uri->segment(1); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?= site_url() ?>assets/img/123.png">
<!-- ===== Bootstrap CSS ===== -->
<link href="<?= site_url() ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<link href="<?= site_url() ?>assets/plugins/components/dropify/dist/css/dropify.min.css" rel="stylesheet" />
<link href="<?= site_url() ?>assets/plugins/components/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= site_url() ?>assets/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= site_url() ?>assets/plugins/components/datatables/dataTables.dateTime.min.css" rel="stylesheet" type="text/css" />
<link href="<?= site_url() ?>assets/plugins/components/summernote/summernote.min.css" rel="stylesheet">
<link href="<?= site_url() ?>assets/plugins/components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">

<?php if($current_page == 'dashboard'): ?>
<link href="<?= site_url() ?>assets/plugins/components/morrisjs/morris.css" rel="stylesheet">
<link href="<?= site_url() ?>assets/plugins/components/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="<?= site_url() ?>assets/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<?php endif ?>

<!-- ===== Animation CSS ===== -->
<link href="<?= site_url() ?>assets/css/animate.css" rel="stylesheet">
<!-- ===== Custom CSS ===== -->
<link href="<?= site_url() ?>assets/css/style.css" rel="stylesheet">
<!-- ===== Color CSS ===== -->
<link href="<?= site_url() ?>assets/css/colors/default-dark.css" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="<?= site_url() ?>assets/css/custom.css" rel="stylesheet">

