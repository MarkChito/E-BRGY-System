<?php
$query2 = $this->db->query("SELECT * FROM cert_settings WHERE id=1");
$certs = $query2->row();
?>
<p class="m-b-0 m-t-0">TO WHOM IT MAY CONCERN:</p>
<p class="m-b-10 m-t-0" style="text-indent: 40px;">This is to certify that:</p>
<div class="text-center m-t-0">
    <h4 class="font-bold m-b-0 m-t-0"><u><?= ucwords($permit->b_name) ?></u></h4>
    <p>Company Name/Trade Name/Applicant Name</p>
    <h4 class="font-bold m-b-0 m-t-0"><u><?= ucwords($permit->owner1) ?></u></h4>
    <p>Owner/Operator/Branch Manager</p>
    <h4 class="font-bold m-b-0 m-t-0"><u><?= ucwords($permit->o_address) ?></u></h4>
    <p>Owner/s Address</p>
</div>
<p class="mt-3" style="text-indent: 40px; line-height:1.3">Applied to operate a <b><?= ucwords($permit->nature) ?></b> with business address at <?= ucwords($permit->b_address) ?>.</p>
<p class="mt-3" style="text-indent: 40px; line-height:1.3">This further certifies that the said business is not violating any of the provisions of RA 7160 and the Local Revenue Code of the Municipality of <?= ucwords($info->brgy_name . ', ' . $info->town) ?>. That the said business will not adversely affect public order, health, condition, safety, convenience, comfort, interest and the general, welfare in the area.</p>
<p class="mt-3" style="text-indent: 40px; line-height:1.3">In view of the aforementioned observation, approval of the subject application is hereby <b>GRANTED</b>.</p>
<p class="mt-3" style="text-indent: 40px; line-height:1.3">Given this <?= date('jS') ?> day of <?= date('F') ?>, <?= date('Y') ?> at <?= ucwords($info->brgy_name . ', ' . $info->town . ', ' . $info->province) ?>, Philippines, for whatever legal purpose it may serve.</p>
<p class="mt-3" style="text-indent: 40px; line-height:1.3">Valid until : <?= date('F d, Y', strtotime($permit->expiration_date)) ?></p>
<p class="mt-5">Conformed:</p>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <h6 class="font-bold m-b-0"><u><?= ucwords($permit->owner1) ?></u></h6>
        <p>Company/Applicant Name</p>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <?php if (empty($this->session->flashdata('signature')) || $this->session->flashdata('signature') == 'On') : ?>
            <img src="<?= site_url() . '/assets/uploads/' . $certs->signature ?>" class="m-t-40 m-b-0" width="150" style="position:absolute; top:-70px; left:20%">
        <?php endif ?>
        <h6 class="font-bold m-b-0"><u><?= ucwords($captain->name) ?></u></h6>
        <p>Punong Barangay</p>
    </div>
</div>
<div class="row m-t-10">
    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <div class="row">
            <div class="col-sm-6 col-xs-6 text-right">
                <input type="radio" id="renew" name="status" <?= $permit->status == 'Renewal' ? 'checked' : null ?>>
                <label for="renew">Renewal</label>
            </div>
            <div class="col-sm-6 col-xs-6 text-left">
                <input type="radio" id="new" name="status" <?= $permit->status == 'New' ? 'checked' : null ?>>
                <label for="new">New</label>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
        <div class="text-left ml-5 pl-4">
            <small class="m-b-0" style="line-height: 1.2;">
                O.R. No.: <?= $this->session->flashdata('or') ?></br>
                Date Applied: <?= date('F d, Y', strtotime($permit->created_at)) ?></br>
                Amount: Php <?= number_format($this->session->flashdata('amount'), 2) ?>
                </p>
        </div>

    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6 col-sm-6 col-xs-6 text-left">
        <p><?= empty($this->session->flashdata('initials')) ? null : $this->session->flashdata('initials') ?></p>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 text-left">
        <?php if (!empty($this->session->flashdata('official'))) : ?>
            <div class="text-center">
                <h6 class="font-bold m-b-0 text-uppercase"><u><?= empty($this->session->flashdata('official')) ? 'Official on Duty Here' : $this->session->flashdata('official') ?></u></h6>
                <p>Barangay Official On Duty</p>
            </div>
        <?php endif ?>
    </div>
</div>