<div class="alert alert-danger error-msg alert-dismissable" style="display:none"><div id="display"></div></div>
<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
    </div>

    <form method="POST" id="update-blotter-form" >
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Case No.</label>
                    <input type="text" class="form-control case_no" placeholder="Enter Case Number" name="case_no" required value="<?= $blotter_info->case_no ?>" id="case_no" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Date Filed</label>
                    <input type="datetime-local" class="form-control" name="date_filed" value="<?= date('Y-m-d\TH:i', strtotime($blotter_info->created_at)); ?>" required>
                </div>
            </div>
        </div>
        <?php foreach($complainants as $row): ?>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Complainant Fullname</label>
                        <input type="text" class="form-control" placeholder="Enter Complainant Name" name="complainant[]" value="<?= $row['name'] ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">National ID</label>
                        <input type="text" class="form-control" placeholder="Enter Complainant National ID" name="complainant_id[]" value="<?= $row['national_id'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Complainant Contact Number" name="complainant_number[]" value="<?= $row['number'] ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">            
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Gender</label>
                        <select class="form-control" name="gender[]">
                            <option value="">Select Gender</option>
                            <option <?= $row['gender']=='Male' ? 'selected' : null ?> >Male</option>
                            <option <?= $row['gender']=='Female' ? 'selected' : null ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">Age</label>
                        <input type="number" class="form-control" placeholder="Enter Age" name="complainant_age[]" value="<?= $row['age'] ?>" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Remarks</label>
                        <input type="text" class="form-control" placeholder="Enter Complainant Remarks" name="complainant_remarks[]" value="<?= $row['remarks'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Complainant Address</label>
                <textarea class="form-control" placeholder="Enter Complainant Address" name="complainant_address[]" required><?= $row['address'] ?></textarea>
            </div>
        <?php endforeach ?>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Victim(s)</label>
                    <input type="text" class="form-control" placeholder="Enter Victim(s) Name" name="victim" value="<?= $blotter_info->victim ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Respondent</label>
                    <input type="text" class="form-control" placeholder="Enter Respondent Name" name="respondent" value="<?= $blotter_info->respondent ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Type</label>
                    <select class="form-control" name="type" value="<?= $blotter_info->type ?>">
                        <option disabled selected>Select Blotter Type</option>
                        <option <?= $blotter_info->type=='Amicable' ? 'selected' : null ?>>Amicable</option>
                        <option <?= $blotter_info->type=='Incident' ? 'selected' : null ?>>Incident</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <select class="form-control" name="status" value="<?= $blotter_info->status ?>" id="bstatus">
                        <option <?= $blotter_info->status=='Active' ? 'selected' : null ?>>Active</option>
                        <option <?= $blotter_info->status=='Scheduled' ? 'selected' : null ?>>Scheduled</option>
                        <option <?= $blotter_info->status=='Dismissed' ? 'selected' : null ?>>Dismissed</option>
                        <option <?= $blotter_info->status=='Endorsed' ? 'selected' : null ?>>Endorsed</option>
                        <option <?= $blotter_info->status=='Settled' ? 'selected' : null ?>>Settled</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Date and Time of Incident</label>
                    <input type="datetime-local" class="form-control" name="date_happen" value="<?= date('Y-m-d\TH:i', strtotime($blotter_info->incident_date)); ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Incident Location</label>
                    <textarea class="form-control" placeholder="Enter Incident Location here..." name="location" ><?= $blotter_info->location; ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Narration of the Incident</label>
                    <textarea class="form-control" placeholder="Enter Narration of the Incident here..." name="details" required><?= $blotter_info->details; ?></textarea>
                </div>
            </div>
        </div>

        <hr>
        <div class="row" id="settled" style="display:none">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Settlement Updates</label>
                    <textarea class="form-control" placeholder="Enter Settlement Updates" name="settlement_updates" ><?= empty($settled->updates) ? '' : $settled->updates ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Date and Time Settled</label>
                    <input type="datetime-local" class="form-control" name="settlement_date" value="<?= empty($settled->date) ? '' : date('Y-m-d\TH:i', strtotime($settled->date)); ?>" required>
                </div>
            </div>
        </div>
        <div class="form-actions m-t-30">
            <button class="btn btn-primary waves-effect waves-light" id="updateBlotter"> <i class="fa fa-check"></i> Update</button>
            <a type="button" href="<?= site_url('blotter') ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
        </div>
    </form>
</div>