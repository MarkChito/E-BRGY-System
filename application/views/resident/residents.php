<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title">Resident Information</h4>
        </div>
        <div class="col-sm-6">
            <ul class="list-inline pull-right">
                <li>
                    <div class="card-tools">
                        <a href="<?= site_url('create_resident') ?>" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                            <i class="fa fa-plus"></i>
                            Resident
                        </a>
                    </div>
                </li>
                <?php if($this->session->role == 'administrator' || $this->session->role == 'power user'):?>
                <li>
                    <div class="card-tools">
                        <a href="<?= site_url('resident/exportCSV') ?>" class="fcbtn btn btn-outline btn-danger btn-1d btn-xs btn-rounded">
                            <i class="fa fa-file"></i>
                            Export CSV
                        </a>
                    </div>
                </li>
                <?php endif?>
            </ul>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="residenttable">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>National ID</th>
                    <th>Alias</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Civil Status</th>
                    <th>Gender</th>
                    <th>Purok</th>
                    <?php if($this->session->role == 'administrator' || $this->session->role == 'power user'):?>
                        <th>Voter Status</th>
                    <?php endif ?>
                    <th>Alived/Deceased</th>
                    <th>PWD</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<?php $this->load->view('resident/modal') ?>

