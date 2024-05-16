<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title">Resident Certificate Issuance</h4>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="residentcertstable">
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
                    <?php if($this->session->role == 'administrator'):?>
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

