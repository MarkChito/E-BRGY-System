<div class="row">
    <div class="col-md-8">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title"><?= $title ?></h4>
                </div>
                <input type="hidden" id="summonTitle" value="<?= 'Blotter Case No. '.$blotter_info->case_no ?>" />
                <div class="col-sm-6">
                    <ul class="list-inline pull-right">
                        <li>
                            <?php if($this->session->role == 'administrator'):?>
                                <div class="card-tools">
                                    <a href="#summon" data-toggle="modal" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                                        <i class="fa fa-plus"></i>
                                        Summon
                                    </a>
                                </div>
                            <?php endif?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive m-t-30">
                <table class="table table-hover table-striped" id="summonTable">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Summons Details</th>
                            <th scope="col">No. of Summons</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($summon)): ?>
                            <?php $no=1; foreach($summon as $row): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['blotter_update'] ?></td>
                                <td><?= $row['number'] ?></td>
                                <td><?= date('F d, Y h:i:s A' , strtotime($row['date'])) ?></td>
                                <td class="text-nowrap">
                                    <a  type="button" href="#edit_summon" data-toggle="modal" onclick="editSummon(this)" title="Edit Summon" 
                                        data-update="<?= $row['blotter_update'] ?>" data-dt="<?= $row['date'] ?>" data-id="<?= $row['id'] ?>" data-num="<?= $row['number'] ?>"> 
                                        <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                    <a type="button" href="<?= site_url('generate_summon/').$row['case_no'].'/'.$row['id'] ?>" data-toggle="tooltip" data-original-title="Generate Summon Report"> 
                                        <i class="icon-docs text-info m-r-10"></i> </a>

                                    <?php if($this->session->role == 'administrator'):?>
                                        <a href="<?= site_url('blotter/delete_summon/').$row['case_no'].'/'.$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this summon?');" data-toggle="tooltip" data-original-title="Remove"> <i class="fa fa-close text-danger"></i> </a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $no++; endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="white-box">
            <h4 class="font-bold m-b-20">Blotter Information</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Case No.</label>
                        <p class="font-bold"><?= $blotter_info->case_no ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date Filed</label>
                        <p class="font-bold"><?= date('F d, Y h:i:s A' , strtotime($blotter_info->created_at)) ?></p>
                    </div>
                </div>
            </div>
            <h6><b>Complainant Details</b></h6>
            <hr>
            <?php foreach($complainants as $row): ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Complainant Name</label>
                            <p class="font-bold"><?= $row['name'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>National ID</label>
                            <p class="font-bold"><?= $row['national_id'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <p class="font-bold"><?= $row['number'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <p class="font-bold"><?= $row['gender'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Age</label>
                            <p class="font-bold"><?= $row['age'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remarks</label>
                            <p class="font-bold"><?= $row['remarks'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <p class="font-bold"><?= $row['address'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <h6><b>Blotter Details</b></h6>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Victims/s Name</label>
                        <p class="font-bold"><?= $blotter_info->victim ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Respondent Name</label>
                        <p class="font-bold"><?= $blotter_info->respondent ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Blotter Type</label>
                        <p class="font-bold"><?= $blotter_info->type ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Blotter Status</label>
                        <p class="font-bold"><?= $blotter_info->status ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date and Time of Incident</label>
                        <p class="font-bold"><?= date('F d, Y h:i:s A' , strtotime($blotter_info->incident_date)) ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Incident Location</label>
                        <p class="font-bold"><?= $blotter_info->location ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Narration of the Incident</label>
                        <p class="font-bold"><?= $blotter_info->details ?></p>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>

<?php $this->load->view('blotter/summon_modal') ?>