<?php
$query = $this->db->query("SELECT * FROM barangay_info WHERE id=1");
$row = $query->row();

$query1 = $this->db->query("SELECT * FROM system_info WHERE id=1");
$ss = $query1->row();

$query2 = $this->db->query("SELECT * FROM cert_settings WHERE id=1");
$certs = $query2->row();
?>
<!-- Modal -->
<div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Contact Support</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/send_support') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email Address" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Contact Number(optional)" name="number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="Enter Message" name="message" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-light bg-danger error-msg" style="display:none"></div>
                <form method="POST" id="change-pass-form">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Enter Name" readonly id="username" name="username" value="<?= $_SESSION['username'] ?>" required>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>New Password</label>
                        <input type="password" id="new_pass" class="form-control" placeholder="Enter New Password" name="password" required>
                        <span toggle="#new_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group form-floating-label">
                        <label>Confirm Password</label>
                        <input type="password" id="con_pass" class="form-control" placeholder="Confirm Password" name="passconf" required>
                        <span toggle="#con_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="changePass">Change</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Restore Database</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/restore') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group form-floating-label">
                        <label>Upload Sql file</label>
                        <input type="file" id="input-file-now" accept=".sql" name="backup_file" required class="dropify" />
                    </div>
                    <small class="form-text text-muted">Note: pls upload sql file only.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Restore</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-light bg-danger error-msg1" style="display:none"></div>
                <form method="POST" enctype="multipart/form-data" id="update-user-form">
                    <input type="hidden" name="size" value="1000000">
                    <div class="text-center">
                        <div id="myprofile3" class="text-center">
                            <input name="avatar" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-6" data-default-file="<?= empty($this->session->avatar) ? site_url() . 'assets/img/person.png' : site_url() . 'assets/uploads/avatar/' . $this->session->avatar ?>" />
                            <input type="hidden" id="profileData" value="<?= preg_match('/data:image/i', $this->session->avatar) ? $this->session->avatar : null ?>">
                        </div>
                        <div class="row text-center m-b-40 m-t-10">
                            <button class="btn btn-danger waves-effect btn-rounded waves-light" type="button" id="open_cam3" data-toggle="tooltip" data-original-title="Open Camera"> <i class="fa fa-camera"></i> </button>
                            <button type="button" class="btn btn-primary waves-effect btn-rounded waves-light" onclick="save_photo3()" data-toggle="tooltip" data-original-title="Capture"><i class="fa fa-crosshairs"></i></button>
                        </div>

                        <div id="profileImage3">
                            <input type="hidden" name="profileimg">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input type="email"  name="email" value="<?= $this->session->email ?>" >
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="<?= $this->session->id ?>" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="updateProfle">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">About The System</h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4>This system is licensed to : <?= empty($row->brgy_name) ? null : $row->brgy_name ?></h4>
                    <h5><?= $ss->sname ?></h5>
                    <h5>Powered By : <?= $ss->powered_b ?></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="importCSV" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Import CSV File</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('resident/importCSV') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group form-floating-label">
                        <label>Upload csv file only</label>
                        <input type="file" id="input-file-now1" accept=".csv" name="import_file" required class="dropify" />
                    </div>
                    <small class="form-text text-muted">Note: please use the csv format <a href="<?= site_url() ?>assets/residentFormat.csv" class="btn-link text-success" download>here</a>.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="importRes">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Certificate Settings</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/updateCertSettings') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label class="control-label">Select Certificate Sidebar Background Color</label><br>
                        <input type="text" name="color_bg" class="colorpicker form-control w-100" value="<?= $certs->color_bg ?>" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Flag Image</label><br>
                                <input name="flag" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-111" data-default-file="<?= site_url() . '/assets/uploads/' . $certs->flag ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Motto Image</label><br>
                                <input name="motto" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-211" data-default-file="<?= site_url() . '/assets/uploads/' . $certs->motto ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Certificate Watermark</label><br>
                                <input name="watermark" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-311" data-default-file="<?= site_url() . '/assets/uploads/' . $certs->watermark ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Barangay Captain Signature</label><br>
                                <input name="signature" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-31" data-default-file="<?= site_url() . '/assets/uploads/' . $certs->signature ?>" />
                            </div>
                        </div>
                    </div>
                    <small class="form-text text-muted">Note: pls upload only image and not more than 20MB.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>