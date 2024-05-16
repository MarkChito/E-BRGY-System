<?php
$query2 = $this->db->query("SELECT * FROM cert_settings WHERE id=1");
$c_setting = $query2->row();
?>
<p class="m-t-40"><?= $cert->salutation ?></p>
<span class="m-t-40" style="text-indent: 40px;"><?= $cert->content ?></span>
<p style="text-indent: 40px;">Issued this <?= date('jS') ?> day of <?= date('F') ?>, <?= date('Y') ?> at <?= $info->brgy_name . ', ' . $info->town . ', ' . $info->province ?>.</p>
<div style="margin-bottom:150px"></div>
<div class="col-md-12 col-sm-12 col-xs-12 m-t-20">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6 text-center" style="margin-bottom:-30px;">
            <?php if (empty($this->session->flashdata('pic_on')) || $this->session->flashdata('pic_on') == 'pic_on') : ?>
                <?php if (!empty($cert->pic)) : ?>
                    <img src="<?= preg_match('/data:image/i', $cert->pic) ? $cert->pic : site_url() . 'assets/uploads/' . $cert->pic ?>" alt="Resident Profile" class="b-all" width="100" height="68">
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
                <img src="<?= site_url() . '/assets/uploads/' . $c_setting->signature ?>" class="m-t-40 m-b-0" width="150" style="position:absolute; top:-70px; left:20%">
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