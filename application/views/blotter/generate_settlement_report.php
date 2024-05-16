<?php if($this->session->role == 'administrator'):?>
<div class="row">
    <div class="col-sm-12">
        <ul class="list-inline pull-right">
            <li>
                <div class="card-tools">
                    <button id="print" class="btn btn-danger btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>
            </li>
            <li>
                <div class="card-tools">
                    <button class="btn btn-primary btn-outline" type="button" href="#settlementM" data-toggle="modal"> <span><i class="fa fa-edit"></i> Edit</span> </button>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php endif?>

<div class="white-box printableArea">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-2 text-center">
            <img src="<?= site_url().'assets/uploads/'.$info->city_logo ?>" class="img-responsive" width="100">
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8 text-center">
            <h6 class="m-b-0" style="line-height:1.2">Republic of the Philippines <br>Province of <?= ucwords($info->province) ?>  <br> <?= ucwords($info->town) ?></h6>
            <h4 class="font-bold m-b-0 m-t-0"><?= ucwords($info->brgy_name) ?></i></h2>
            <p class="m-t-0 font-12 font-bold">Contact No. <?= $info->number ?>/Email:<?= $info->email ?></p>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 text-center">
            <img src="<?= site_url().'assets/uploads/'.$info->brgy_logo ?>" class="img-fluid" width="100">
        </div>
    </div>
    <div class="text-center">
        <h3 class="font-bold">OFFICE OF THE PUNONG TAGAPAMAYAPA</h3>
    </div>
    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <?php if(!empty($complainants)): ?>
            <?php foreach($complainants as $row):?>
                <h6 class="font-bold m-b-0 m-t-0"><?= strtoupper($row['name']) ?>,</h6>
            <?php endforeach ?>
            <?php endif ?>
            
            <p>Complainants</p>
            <p class="m-t-10 m-b-10">- against - </p>
            <h6 class="font-bold m-b-0 m-t-0"><?= !empty($blotter_info->respondent) ? strtoupper($blotter_info->respondent) : '' ?></h6>
            <p class="m-t-0">Respondent,</p>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7">
            <p class="m-t-0 m-b-0">Barangay Case No. <b><?= !empty($blotter_info->case_no) ? $blotter_info->case_no : 'Case No. empty' ?></b></p>
            <p class="m-t-0 m-b-0">For: <b><?= empty($this->session->flashdata('reason')) ? 'Reason Here' : $this->session->flashdata('reason') ?></b></p>
        </div>
    </div>
    <div class="text-center">
        <h3 class="font-bold">AMICABLE SETTLEMENT</h3>
    </div>
    <p class="font-bold" style="text-indent: 40px;">AFTER hearing the testimonies given and careful examination of the evidence presented in this case, award is hereby made as follows:</p>
    <p><?= empty($this->session->flashdata('body')) ? '<b>==================Message Here=================</b>' : $this->session->flashdata('body') ?></p>
    <p style="text-indent: 40px;">Both parties complainant and respondent agreed to settle this case and will sign in the presence of Hon. <?= empty($this->session->flashdata('official')) ? 'Official on Duty Here' : $this->session->flashdata('official') ?>, on <?= date('F d  , Y' , strtotime($settled->date)) ?> and will bind themselves to comply honestly and faithfully with the above terms of settlement.</p>
    <p style="text-indent: 40px;">Entered into this <?= date('jS', strtotime($settled->date)) ?> day of <?= date('F', strtotime($settled->date)) ?>, <?= date('Y', strtotime($settled->date)) ?>.</p>

    <div class="text-center">
        <h3 class="font-bold">ATTESTATION</h3>
    </div>
    <h6 class="font-bold">I hereby certify that the foregoing amicable settlement was entered into by the parties freely and voluntary after I had explained to them the nature and consequence of such settlement.</h6>
    <div class="row m-t-40">
        <div class="col-md-6 col-sm-6 col-xs-6 text-left">
            <p>Attested By:</p>
            <div class="p-2 text-bottom text-center">
                <h6 class="font-bold m-b-0"><?= strtoupper($captain->name) ?></h6>
                <p>PUNONG BARANGAY</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <p style="visibility:hidden">Attested By:</p>
            <div class="text-center">
                <h6 class="font-bold m-b-0"><?= empty($this->session->flashdata('official')) ? 'Official on Duty Here' : strtoupper($this->session->flashdata('official')) ?></h6>
                <p>Barangay Kagawad On Duty</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="settlementM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Settlement Report</h5>
            </div>
            <form method="POST" action="<?= site_url('blotter/process_settlement') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Blotter Reason</label>
                    <input type="text" class="form-control" name="reason" placeholder="Enter Blotter Reason" required value="<?= empty($this->session->flashdata('reason')) ? '' : $this->session->flashdata('reason') ?>">
                </div>
                <div class="form-group">
                    <label>Brgy Kagawad on Duty</label>
                    <input type="text" class="form-control" name="kagawad" placeholder="Enter Brgy Kagawad on Duty" required value="<?= empty($this->session->flashdata('official')) ? '' : $this->session->flashdata('official') ?>">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea id="summernote" name="body" required>
                        <p>"Kami, <?= ucwords($complainants[0]['name']) ?> ag <?= !empty($complainants[1]['name']) ? ucwords($complainants[1]['name']) : null ?>, complainants and <?= !empty($blotter_info->respondent) ? $blotter_info->respondent : '' ?>, respondent hay nagkaeasugot nga ayuson ro among gusot o di pagkakaunawaan sa mga masunod nga pamaagi, pagkatapos it maid-id nga inbestigasyon/eksaminasyon ag pag-eaygay sa daywang panig/partido:</p>
                        <p>Para sa ikatawhay it bilang isaea hay iurong o withdraw it bilog, totally settle ro caso iya sa LGU <?= ucwords($info->brgy_name) ?>.</p>
                        <p>Ako, <?= !empty($blotter_info->respondent) ? $blotter_info->respondent : '' ?>, hay gapangayo it pasensya ag indi eon magtsimis agud indi eon mauman ro natabo.</p>
                        <p>Gina pasensiya ko si <?= !empty($blotter_info->respondent) ? $blotter_info->respondent : '' ?> sa ratong hitabo ag naga hinyo nga indi eon pag umanon para sa ika tawhay it among palibot, dahil magkaeapit malang haeos kami, indi eon mag obra it issue o tsismis para malinong eon ro tanan."</p>
                    </textarea>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>