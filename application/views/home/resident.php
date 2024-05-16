<div class="bg-light mb-5">
    <div class="container mb-5">
        <div class="text-center pt-5 pb-3">
            <h1 class="welcome_text">Resident Profile</h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-<?= $this->session->flashdata('success') ?> alert-dismissible fade show" role="alert">
                <small><?= $this->session->flashdata('message') ?></small>
            </div>
        <?php endif ?>
        <div class="mt-4" style="background-color: rgb(237,240,246);">
            <div class="row p-4 mb-5">
                <div class="col-md-5 text-center mt-5 mb-3">
                    <?php if (!empty($res->picture)) : ?>
                        <img src="<?= preg_match('/data:image/i', $res->picture) ? $res->picture : site_url() . 'assets/uploads/resident_profile/' . $res->picture ?>" alt="User Image" class="img-fluid brgy">
                    <?php else : ?>
                        <img src="<?= site_url() ?>/assets/img/person.png" alt="User Image" class="img-fluid">
                    <?php endif ?>
                </div>
                <div class="col-md-7 text-center">
                    <h4>RESIDENT INFORMATION</h4>
                    <div class="row mt-5">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Full Name:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->firstname . ' ' . $res->middlename . ' ' . $res->lastname) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Gender:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->gender) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Age:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= floor((time() - strtotime($res->birthdate)) / 31556926); ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Date of Birth:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= date('F d, Y', strtotime($res->birthdate)) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Place of Birth:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->birthplace) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Civil Status:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->civilstatus) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Occupation:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->occupation) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Resident Status:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->resident_type) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Voters Status:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= $res->voterstatus == 'Yes' ? 'Registered' : 'Not-registered' ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">PWD:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->pwd) ?></h6>
                        </div>
                    </div>
                    <h4 class="mt-5">CONTACT DETAILS</h4>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Contact Number:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= $res->phone ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Email Address:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= $res->email ?></h6>
                        </div>
                    </div>
                    <h4 class="mt-5">ADDRESS</h4>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Subdivision/Purok/Sitio:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->purok) ?></h6>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 text-right">
                            <h6 class="font-weight-bold">Full Address:</h6>
                        </div>
                        <div class="col-6 text-left">
                            <h6><?= ucwords($res->address) ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100" style="height: 100px;"></div>
</div>