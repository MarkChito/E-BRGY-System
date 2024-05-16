<p class="m-t-10 m-b-10">TO WHOM IT MAY CONCERN:</p>
<p class="m-t-0 m-b-0" style="text-indent: 40px; line-height:1.4">This is to CERTIFY that the person whose name appearing herein has requested a <b><?= strtoupper($title) ?></b> from this office and the result(s) is/are listed below:</p>
<div class="m-l-20 m-t-10 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">First Name </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->firstname) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Middle Name </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->middlename) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Last Name </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->lastname) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Address </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->address) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Birthdate </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= date('F m, Y', strtotime($resident->birthdate)) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Place of Birth </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->birthplace) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Gender </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->gender) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Citizenship </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->citizenship) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Civil Status </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= strtoupper($resident->civilstatus) ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-0">Date Issued </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= date("l, F d, Y") ?></b></p>
    </div>
</div>
<div class="m-l-20 row" style="margin-bottom:0">
    <div class="col-sm-3 col-xs-3">
        <p class="m-b-10">Valid until </p>
    </div>
    <div class="col-sm-9 col-xs-9">
        <p class="m-b-0"><b>: <?= empty($this->session->flashdata('date')) ? date('F d, Y', strtotime('+6 months')) : date("F d, Y", strtotime($this->session->flashdata('date'))) ?></b></p>
    </div>
</div>
<p style="text-indent: 40px; line-height:1.4">This is to <b>CERTIFY</b> further that <b><?= strtoupper($resident->firstname . ' ' . $resident->middlename . ' ' . $resident->lastname) ?></b>, has no derogatory record filed and/or pending case against him/her before this office. Provided however, that any complaint against his/her application and purpose found valid shall be sufficient cause for revocation of this clearance.</p>
<p class="m-b-20" style="text-indent: 40px;">This <b>CLEARANCE</b> is issued for <b><?= $this->session->flashdata('purpose') ?></b>.</p>