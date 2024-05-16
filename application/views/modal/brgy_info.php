<?php
$query = $this->db->query("SELECT * FROM barangay_info WHERE id=1");
$row = $query->row();

$query1 = $this->db->query("SELECT * FROM system_info WHERE id=1");
$info = $query1->row();
?>
<!-- Modal -->
<div class="modal fade" id="barangay" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Update Barangay Info</h5>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="brgy_info_form">
                    <input type="hidden" name="size" value="1000000">
                    <div class="alert alert-danger text-light bg-danger brgy-error-msg" style="display:none"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Street</label>
                                <input type="text" class="form-control" placeholder="Enter Street" required name="street" value="<?= empty($row->street) ? null : $row->street ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Purok/Sitio</label>
                                <input type="text" class="form-control" placeholder="Enter Purok/Sitio" name="purok" required value="<?= empty($row->purok) ? null : $row->purok ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Barangay Name</label>
                                <input type="text" class="form-control" placeholder="Enter Barangay Name" name="brgy" required value="<?= empty($row->brgy_name) ? null : $row->brgy_name ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Town Name</label>
                                <input type="text" class="form-control" placeholder="Enter Town Name" name="town" required value="<?= empty($row->town) ? null : $row->town ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Province Name</label>
                                <input type="text" class="form-control" placeholder="Enter Province Name" required name="province" value="<?= empty($row->province) ? null : $row->province ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Barangay Contact Number</label>
                                <input type="text" class="form-control" placeholder="Enter Contact Number" name="number" required value="<?= empty($row->number) ? null : $row->number ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Barangay Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter Barangay Email Address" name="email" required value="<?= empty($row->email) ? null : $row->email ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Start Year</label>
                                        <input type="text" class="form-control yearpicker" placeholder="Enter Start Year" required name="start" value="<?= empty($row->starts) ? null : $row->starts ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">End Year</label>
                                        <input type="text" class="form-control yearpicker1" placeholder="Enter End Year" required name="end" value="<?= empty($row->end) ? null : $row->end ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Barangay Background</label>
                        <textarea class="form-control" required name="background"><?= empty($row->background) ? null : $row->background ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mission/Vision</label>
                        <textarea class="form-control" required name="db_msg"><?= empty($row->dashboard_text) ? null : $row->dashboard_text ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Barangay Map Url</label>
                        <input type="url" class="form-control" name="map" value="<?= empty($row->map) ? null : $row->map ?>" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Municipality/City Logo</label><br>
                                <input name="city_logo" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-11" data-default-file="<?= empty($row->city_logo) ? site_url() . '/assets/img/brgy-logo.png' : site_url() . '/assets/uploads/' . $row->city_logo ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Barangay Logo</label><br>
                                <input name="brgy_logo" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-21" data-default-file="<?= empty($row->brgy_logo) ? site_url() . '/assets/img/brgy-logo.png' : site_url() . '/assets/uploads/' . $row->brgy_logo ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Barangay Image</label><br>
                        <input name="db_img" accept="image/*" type="file" class="dropify" data-height="550" id="input-file-now-custom-3" data-default-file="<?= !empty($row->dashboard_img) ? site_url() . '/assets/uploads/' . $row->dashboard_img : site_url() . '/assets/img/bg-abstract.png' ?>" />
                    </div>
                    <small class="form-text text-muted">Note: pls upload only image and not more than 20MB.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="update_brgy_info">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="system" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">System Info</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/updateSystem') ?>">
                    <div class="alert alert-danger text-light bg-danger brgy-error-msg" style="display:none"></div>
                    <div class="form-group">
                        <label class="control-label">System Name</label>
                        <input type="text" class="form-control" placeholder="Enter System Name" name="name" value="<?= empty($info->sname) ? null : $info->sname ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">System Acronym</label>
                        <input type="text" class="form-control" placeholder="Enter System Acronym" name="acronym" value="<?= empty($info->acronym) ? null : $info->acronym ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Powered By:</label>
                        <input type="text" class="form-control" name="powered_b" value="<?= empty($info->powered_b) ? null : $info->powered_b ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>