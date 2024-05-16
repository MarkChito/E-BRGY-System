<!-- Modal -->
<div class="modal fade" id="summon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Summon</h5>
            </div>
            <form method="POST" action="<?= site_url('blotter/save_summon'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Case No.</label>
                        <input type="text" class="form-control" readonly name="case_no" value="<?= $blotter_info->case_no ?>" required >
                    </div>
                    <div class="form-group">
                        <label>Summon No.</label>
                        <select class="form-control" name="number">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                        </select>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>Status Update</label>
                        <textarea class="form-control" name="updates" placeholder="Enter Blotter Status Update" required></textarea>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>Date & Time of Summon</label>
                        <input type="datetime-local" class="form-control" name="date_summon" value="<?= date('Y-m-d\TH:i'); ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_summon" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Update Summon</h5>
            </div>
            <form method="POST" action="<?= site_url('blotter/update_summon') ?>">
                <div class="modal-body">
                        <div class="form-group">
                            <label>Case No.</label>
                            <input type="text" class="form-control" readonly name="case_no" value="<?= $blotter_info->case_no ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Summon No.</label>
                            <select class="form-control" name="number">
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                            </select>
                        </div>
                        <div class="form-group form-floating-label">
                            <label>Status Update</label>
                            <textarea class="form-control" name="updates" placeholder="Enter Blotter Status Update" required id="updates"></textarea>
                        </div>
                        <div class="form-group form-floating-label">
                            <label>Date & Time of Summon</label>
                            <input type="datetime-local" class="form-control" name="date_summon" required id="date_summon">
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="summon_id" id="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>