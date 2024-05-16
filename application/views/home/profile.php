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
                    <form method="POST" action="<?= site_url('auth/changeResProfile') ?>" enctype="multipart/form-data">

                        <input class="form-control mt-3" type="file" name="profile" accept="image/png, image/gif, image/jpeg" required>
                        <input type="hidden" name="id" value="<?= $this->session->resident_id ?>">
                        <button class="btn btn-primary btn-lg mt-3 " style="border-radius: 1px;" type="submit">Change</button>
                    </form>
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
        <div class="w-100" style="height: 4px; background-color:black"></div>
        <div class="mt-4 mb-5">
            <div class="w-75 ml-auto mr-auto" id="account">
                <h4 class="mb-5 text-center">ACCOUNT DETAILS</h4>
                <form method="POST" action="<?= site_url('auth/changeResPass') ?>">
                    <div class="row">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Userame:</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input class="form-control-lg w-100" placeholder="Username" readonly required name="username" value="<?= $this->session->username ?>" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Password:</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input class="form-control-lg w-100" id="password" name="password" type="password" required="" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" />
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password">Show</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Confirm Password:</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input class="form-control-lg w-100" id="conpassword" name="conpassword" type="password" required="" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" />
                            <span toggle="#conpassword" class="fa fa-fw fa-eye field-icon toggle-password">Show</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary btn-lg mt-3 " style="border-radius: 1px;" type="submit">UPDATE</button>
                    </div>

                </form>
            </div>

        </div>

        <div class="w-100" style="height: 4px; background-color:black"></div>
        <div class="mt-4 mb-5">
            <div class="w-75 ml-auto mr-auto" id="account">
                <h4 class="mb-5 text-center">SECURITY QUESTIONS</h4>

                <form method="POST" action="<?= site_url('auth/addsecurity') ?>">
                    <input required name="res_id" type="hidden" value="<?= $this->session->resident_id ?>">
                    <div class="row">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Question 1</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <select class="form-control-lg w-100" name="question_1">
                                <option value="1">In what city were you born?</option>
                                <option value="2">What is the name of your favorite pet?</option>
                                <option value="3">What is your mother's maiden name?</option>
                                <option value="4">What high school did you attend?</option>
                                <option value="5">What is the name of your first school?</option>
                                <option value="6">What was the make of your first car?</option>
                                <option value="7">What was your favorite food as a child?</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Answer 1</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input class="form-control-lg w-100 mt-2" placeholder="Answer 1" required name="answer_1" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Question 2</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <select class="form-control-lg w-100" name="question_2">
                                <option value="1">In what city were you born?</option>
                                <option value="2" selected>What is the name of your favorite pet?</option>
                                <option value="3">What is your mother's maiden name?</option>
                                <option value="4">What high school did you attend?</option>
                                <option value="5">What is the name of your first school?</option>
                                <option value="6">What was the make of your first car?</option>
                                <option value="7">What was your favorite food as a child?</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Answer 2</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input class="form-control-lg w-100 mt-2" placeholder="Answer 2" required name="answer_2" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Question 3</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <select class="form-control-lg w-100" name="question_3">
                                <option value="1">In what city were you born?</option>
                                <option value="2">What is the name of your favorite pet?</option>
                                <option value="3" selected>What is your mother's maiden name?</option>
                                <option value="4">What high school did you attend?</option>
                                <option value="5">What is the name of your first school?</option>
                                <option value="6">What was the make of your first car?</option>
                                <option value="7">What was your favorite food as a child?</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-left">
                            <h5 class="font-weight-bold mt-2">Answer 3</h5>
                        </div>
                        <div class="col-sm-8 text-left">
                            <input class="form-control-lg w-100 mt-2" placeholder="Answer 3" required name="answer_3" />
                        </div>
                    </div>
                    <input type="hidden" name="username" value="<?= $this->session->username ?>">
                    <div class="text-right">
                        <button class="btn btn-primary btn-lg mt-3 " style="border-radius: 1px;" type="submit">ADD</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="w-100" style="height: 100px;"></div>
</div>