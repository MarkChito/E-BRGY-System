<div class="alert alert-danger error-msg alert-dismissable" style="display:none"><div id="display"></div></div>
<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
    </div>
    <form method="POST" id="blotter-form" >
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Case No.</label>
                    <input type="text" class="form-control case_no" placeholder="Enter Case Number" name="case_no" required value="<?= set_value('case_no') ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Date Filed</label>
                    <input type="datetime-local" class="form-control" name="date_filed" value="<?= date('Y-m-d\TH:i'); ?>" required>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Complainant Fullname</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant Name" name="complainant[]" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">National ID</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant National ID" name="complainant_id[]">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Contact Number</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant Contact Number" name="complainant_number[]" required>
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label">Gender</label>
                    <select class="form-control" name="gender[]">
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label">Age</label>
                    <input type="number" class="form-control" placeholder="Enter Age" name="complainant_age[]" required>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label class="control-label">Remarks</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant Remarks" name="complainant_remarks[]">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Complainant Address</label>
            <textarea class="form-control" placeholder="Enter Complainant Address" name="complainant_address[]" required></textarea>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">2nd Complainant Fullname</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant Name" name="complainant[]">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">National ID</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant National ID" name="complainant_id[]">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Contact Number</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant Contact Number" name="complainant_number[]">
                </div>
            </div>
        </div>
        <div class="row">            
            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label">Gender</label>
                    <select class="form-control" name="gender[]">
                        <option value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="control-label">Age</label>
                    <input type="number" class="form-control" placeholder="Enter Age" name="complainant_age[]" >
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label class="control-label">Remarks</label>
                    <input type="text" class="form-control" placeholder="Enter Complainant Remarks" name="complainant_remarks[]">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Complainant Address</label>
            <textarea class="form-control" placeholder="Enter Complainant Address" name="complainant_address[]"></textarea>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Victim(s)</label>
                    <input type="text" class="form-control" placeholder="Enter Victim(s) Name" name="victim">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Respondent</label>
                    <input type="text" class="form-control" placeholder="Enter Respondent Name" name="respondent" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Type</label>
                    <select class="form-control" name="type">
                        <option value="Amicable">Amicable</option>
                        <option value="Incident">Incident</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="Active">Active</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Date and Time of Incident</label>
                    <input type="datetime-local" class="form-control" name="date_happen" value="<?= date('Y-m-d\TH:i'); ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label class="control-label">Incident Location</label>
                    <textarea class="form-control" placeholder="Enter Incident Location here..." name="location" required></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label class="control-label">Narration of the Incident</label>
                    <textarea class="form-control" placeholder="Enter Narration of the Incident here..." name="details" required></textarea>
                </div>
            </div>
            
        </div>
        <div class="form-actions m-t-30">
            <button class="btn btn-success waves-effect waves-light" id="createBlotter"> <i class="fa fa-check"></i> Save</button>
            <a type="button" href="<?= site_url('blotter') ?>" class="btn btn-default waves-effect waves-light">Cancel</a>
        </div>
    </form>
</div>