<div class="text-right m-b-10">
    <button id="print" class="btn btn-danger btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
</div>
<div class="white-box printableArea">
    <h5><b>Resident Profile Info</b> <span class="pull-right">National ID: <?= $res->national_id ?></span></h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <?php if(empty($res->picture)): ?>
                    <img class="img-fluid b-all" width="300" alt="user" src="<?= site_url() ?>assets/img/person.png" />
                <?php else: ?>
                    <img class="img-fluid b-all" width="300" alt="user" src="<?= preg_match('/data:image/i', $res->picture) ? $res->picture : site_url().'assets/uploads/resident_profile/'.$res->picture ?>" />
                <?php endif ?>
                <address>
                    <h3> &nbsp;<b class="text-danger"><?= $res->firstname.' '.$res->middlename.' '.$res->lastname ?></b> a.k.a <?= $res->alias ?></h3>
                    <p class="text-muted m-l-5"><b>Address :</b> <?= empty($relation->house_number) ? null : 'House No. '.$relation->house_number ?>, <?= $res->purok ?>, <?= $res->address ?></p>
                    <p class="text-muted m-l-5"><b>Email Address :</b> <i class="fa fa-envelope"></i> <?= $res->email ?></p>
                    <p class="text-muted m-l-5"><b>Contact Number :</b> <i class="fa fa-phone"></i> <?= $res->phone ?></p>
                    <p class="text-muted m-l-5"><b>Bithplace :</b> <?= $res->birthplace ?></p>
                    <p class="text-muted m-l-5"><b>Birthdate :</b> <i class="fa fa-calendar"></i> <?= date('F m, Y', strtotime($res->birthdate)) ?></p>
                    <p class="text-muted m-l-5"><b>Age :</b> </i> <?= floor((time() - strtotime($res->birthdate)) / 31556926); ?> years old</p>
                    <p class="text-muted m-l-5"><b>Civil Status :</b> </i> <?= $res->civilstatus ?></p>
                    <p class="text-muted m-l-5"><b>Gender :</b> </i> <?= $res->gender ?></p>
                </address>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive m-t-40" style="clear: both;">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Voters Status: </b><?= $res->voterstatus ?></td>
                            <td><b>PWD: </b><?= $res->pwd ?></td>
                        </tr>
                        <tr>
                            <td><b>Occupation: </b><?= $res->occupation ?></td>
                            <td><b>Employer's Name: </b><?= $res->employer_name ?></td>
                            <td><b>SSS No: </b><?= $res->sss ?></td>
                        </tr>
                        <tr>
                            <td><b>TIN No: </b><?= $res->tin ?></td>
                            <td><b>Precinct No: </b><?= $res->precinct ?></td>
                            <td><b>GSIS No: </b><?= $res->gsis ?></td>
                        </tr>
                        <tr>
                            <td><b>Pagibig No: </b><?= $res->pagibig ?></td>
                            <td><b>PhilHealth No: </b><?= $res->philhealth ?></td>
                            <td><b>Blood Type: </b><?= $res->blood ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="pull-left m-t-30">
                <p class="text-muted"><b>Remarks :</b> </i> <?= $res->remarks ?></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
