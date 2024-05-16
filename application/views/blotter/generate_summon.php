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

<div class="printableArea">
    <div class="white-box">
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
        <div class="text-center m-t-30">
            <h3 class="font-bold">OFFICE OF THE PUNONG TAGAPAMAYAPA</h3>
        </div>
        <div class="row m-t-40">
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
            <div class="col-md-5 col-sm-5 col-xs-5">
                <p class="m-t-0 m-b-0">Barangay Case No. <b><?= !empty($blotter_info->case_no) ? $blotter_info->case_no : 'Case No. empty' ?></b></p>
                <p class="m-t-0 m-b-0">For: <b><?= empty($this->session->flashdata('reason')) ? 'Reason Here' : $this->session->flashdata('reason') ?></b></p>
            </div>
        </div>
        <div class="text-center m-t-30">
            <h3 class="font-bold"><u>COMPLAINT</u></h3>
        </div>
        <p style="text-indent: 40px;">We hereby complain against the above named respondent for violating my rights and interest in the following manner:</p>
        <p><?= empty($this->session->flashdata('body')) ? '<b>=============Message Here==============</b>' : $this->session->flashdata('body') ?></p>
        <p style="text-indent: 40px;">THEREFORE, we pray that the following relief/s be granted to me in accordance with law and/or equity.</p>
        <p style="text-indent: 40px;">Made this  <?= date('jS') ?> day of  <?= date('F') ?>,  <?= date('Y') ?>.</p>
        
        <div class="row m-t-40">
            <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                <div class="p-2 text-bottom text-center">
                    <h6 class="font-bold m-b-0"><?= strtoupper($complainants[0]['name']) ?></h6>
                    <p>Complainant</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="p-2 text-center mt-3">
                    <h6 class="font-bold m-b-0 text-uppercase"><?= !empty($complainants[1]['name']) ? strtoupper($complainants[1]['name']) : null ?></h6>
                    <p>Complainant</p>
                </div>
            </div>
        </div>
        <h6 class="m-t-40 font-bold">Received and filed on <?= date('jS') ?> day of  <?= date('F') ?>, <?= date('Y') ?>. </h6>
        <div class="row m-t-40">
            <div class="col-md-6 col-sm-6 col-xs-6 text-left">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="p-2 text-center mt-3">
                    <h6 class="font-bold m-b-0"><?= empty($this->session->flashdata('official')) ? 'Official on Duty Here' : strtoupper($this->session->flashdata('official')) ?></h6>
                    <p>Barangay Kagawad On Duty</p>
                </div>
            </div>
        </div>
    </div>

    <div id="footerPage"></div>

    <div class="white-box">
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
        <div class="text-center m-t-30">
            <h3 class="font-bold">OFFICE OF THE PUNONG TAGAPAMAYAPA</h3>
        </div>
        <div class="row m-t-40">
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
            <div class="col-md-5 col-sm-5 col-xs-5">
                <p class="m-t-0 m-b-0">Barangay Case No. <b><?= !empty($blotter_info->case_no) ? $blotter_info->case_no : 'Case No. empty' ?></b></p>
                <p class="m-t-0 m-b-0">For: <b><?= empty($this->session->flashdata('reason')) ? 'Reason Here' : $this->session->flashdata('reason') ?></b></p>
            </div>
        </div>
        <div class="text-center m-t-30">
            <h3 class="font-bold"><u><?= $summon->number ?> Summon</u></h3>
        </div>
        <div class="m-t-20">
            <h6 class="font-bold m-b-0">TO: <?= !empty($blotter_info->respondent) ? strtoupper($blotter_info->respondent) : '' ?></h6>
            <p class="font-bold m-l-30 m-t-0"> <?= ucwords($blotter_info->location) ?></p>
        </div>
        <p style="text-indent: 40px;">You are hereby summoned to appear before me in person, together with your witnesses, <?= date('jS') ?> day of <?= date('l', strtotime($summon->date)) ?> the <?= date('jS', strtotime($summon->date)) ?> day of <?= date('F', strtotime($summon->date)) ?>, <?= date('Y', strtotime($summon->date)) ?>, at <?= date('h:i A', strtotime($summon->date)) ?> then and there to answer to a complaint made before me, copy of which is attached hereto, for mediation/conciliation of your dispute with complainant/s.</p>
        <p style="text-indent: 40px;">You are hereby warned that if you refuse or willfully fail to appear in obedience to this summons, you may be barred from filing any counterclaim arising from said complaint.</p>
        <p style="text-indent: 40px;">FAIL NOT or else face punishment as for contempt of court.</p>
        <p style="text-indent: 40px;">Made this <?= date('jS') ?> day of  <?= date('F') ?>, <?= date('Y') ?>.</p>

        <div class="row m-t-40">
            <div class="col-md-6 col-sm-6 col-xs-6 text-left">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="p-2 text-center mt-3">
                    <h6 class="font-bold m-b-0"><?= ucwords($captain->name) ?></h6>
                    <p>Punong Barangay</p>
                </div>
            </div>
        </div>
    </div>

    <div id="footerPage"></div>

    <div class="white-box">
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
        <div class="text-center m-t-30 m-b-40">
            <h3 class="font-bold">OFFICERS RETURN</h3>
        </div>

        <p style="text-indent: 40px;">I served this summons upon respondent Joan Zausa, on the ____th day of <?= date('F') ?>, <?= date('Y') ?> by:</p>
        <p>(Write name/s of respondent/s before mode by which he/they was/were served.)</p>
        <p style="text-indent: 40px;">Respondent/s</p>
        <p>________________________ 1. Handling to him/them said summons in person, or</p>
        <p>________________________ 2. Handling to him/them said summons and he/they refused <br><span style="margin-left:230px">To receive it, or</span></p>
        <p>________________________ 3. Leaving said summons at his/their dwelling with <br><span style="margin-left:230px">_________________________</span><br><span class="m-b-0" style="margin-left:300px">(Name)</span></p>
        <p class="m-t-0" style="margin-left:230px"> A person of suitable age and discretion residing therein, or</p>
        <p>________________________ 4. Leaving said summons at his/their office/place of business <br><span style="margin-left:230px">With _________________________</span><br><span class="m-b-0" style="margin-left:330px">(Name)</span></p>
        <p class="m-t-0" style="margin-left:230px"> A competent person in charge thereof.</p>

        <div class="row m-t-40">
            <div class="col-md-6 col-sm-6 col-xs-6">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="m-b-0">________________________</h6>
                    <p>Officer</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="m-b-0">________________________</h6>
                    <p>(Signature)</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="mb-0">________________________</h6>
                    <p>Date</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="mb-0">________________________</h6>
                    <p>(Signature)</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="mb-0">________________________</h6>
                    <p>Date</p>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="mb-0">________________________</h6>
                    <p>(Signature)</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="text-center">
                    <h6 class="mb-0">________________________</h6>
                    <p>Date</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="footerPage"></div>

    <div class="white-box">
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

        <div class="text-center m-t-30 m-b-40">
            <h4 class="font-bold">OFFICE OF THE PUNONG BARANGAY</h4>
        </div>

        <div class="text-center">
            <h3 class="font-bold m-b-0">NOTICE OF HEARING</h3>
            <h4 class="m-t-0">(MEDIATION PROCEEDINGS)</h4>
        </div>

        <div class="row m-t-40 m-b-40">
            <div class="col-md-12 ml-5">
                <p class="m-b-0">TO: </p>
                <?php if(!empty($complainants)): ?>
                    <?php foreach($complainants as $row):?>
                        <h6 class="font-bold m-t-0 m-b-0"><?= strtoupper($row['name']) ?>,</h6>
                    <?php endforeach ?>
                <?php endif ?>
                <p>Complainants</p>
            </div>
        </div>
        <p style="text-indent: 40px;">You are hereby required to appear before me on the <b><?= date('jS', strtotime($summon->date)) ?> day, <?= date('l', strtotime($summon->date)) ?> of <?= date('F', strtotime($summon->date)) ?>, <?= date('Y', strtotime($summon->date)) ?> at <?= date('h:i A', strtotime($summon->date)) ?> </b> for the hearing of your complaint.</p>
        <p style="text-indent: 40px;">This <?= date('jS', strtotime($summon->date)) ?> day of <?= date('F', strtotime($summon->date)) ?>, <?= date('Y', strtotime($summon->date)) ?>.</p>

        <div class="row m-t-40">
            <div class="col-md-6 col-sm-6 col-xs-6 text-left">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="p-2 text-center">
                    <h6 class="font-bold m-b-0"><?= strtoupper($captain->name) ?></h6>
                    <p>Punong Barangay</p>
                </div>
            </div>
        </div>
        <p class="m-t-40" style="text-indent: 40px;">Notified this  <?= date('jS') ?> day of  <?= date('F') ?>,  <?= date('Y') ?>.</p>
        <div class="row m-t-40">
            <div class="col-md-8 col-sm-8 col-xs-8">
            </div>
            <div class="col-md-4  col-sm-4 col-xs-4">
                <div class="text-left">
                    <p>Complainants:</p>
                    <?php if(!empty($complainants)): ?>
                    <?php foreach($complainants as $row):?>
                        <h6 class="font-bold m-t-20"><?= strtoupper($row['name']) ?>,</h6>
                    <?php endforeach ?>
                    <?php endif ?>
                </div>
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
            <form method="POST" action="<?= site_url('blotter/process_summon') ?>">
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
                        <p style="margin-left: 25px; margin-top: 25px; font-weight:bold">“Ginaimbita namon si <?= !empty($blotter_info->respondent) ? strtoupper($blotter_info->respondent) : '' ?> iya sa opisina it Sangguniang Barangay it Bachao Sur para amon maistoryahan ro parte sa anang ginhueam nga kwarta nga Php11,600.00.”</p>
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