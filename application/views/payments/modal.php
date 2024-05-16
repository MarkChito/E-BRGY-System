<?php $current_page = $this->uri->segment(1); ?>
<!-- Modal -->
<div class="modal fade" id="b_cert_pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('payments/save_payments') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date Expired</label>
                                <input type="date" class="form-control" name="date_expired" value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Add Initial</label>
                                <input type="text" class="form-control" placeholder="Enter Initials" name="initial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Official on Duty </label>
                                <input type="text" class="form-control" placeholder="Enter Official Name" name="official">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Purpose</label>
                        <input type="text" class="form-control" name="purpose" placeholder="Enter purpose" required>
                    </div>
                    <div class="form-group">
                        <label>Remarks </label>
                        <textarea class="form-control" placeholder="Enter Remarks" name="remarks"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Payment Details(Optional)</label>
                        <textarea class="form-control" placeholder="Enter Payment Details" name="details" required><?= $title ?> Payment</textarea>
                    </div>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="signature" value="On" id="on" checked>
                                <label class="control-label" for="on"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="signature" value="Off" id="off10">
                                <label class="control-label" for="off10"> Signature Off </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="rec_name" value="<?= $name ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="i_cert_pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('payments/save_payments') ?>">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valid Until:</label>
                                <input type="date" class="form-control" name="valid" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Official on Duty </label>
                                <input type="text" class="form-control" placeholder="Enter Official Name" name="official">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option>his</option>
                                    <option>her</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Add Initial</label>
                                <input type="text" class="form-control" placeholder="Enter Initials" name="initial">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remarks </label>
                        <textarea class="form-control" placeholder="Enter Remarks" name="remarks"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Payment Details(Optional)</label>
                        <textarea class="form-control" placeholder="Enter Payment Details" name="details" required><?= $title ?> Payment</textarea>
                    </div>
                    <label>Resident</label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="pic_on" value="pic_on" id="pic_on" checked>
                                <label class="control-label" for="pic_on"> Picture On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="pic_on" value="pic_off" id="pic_off">
                                <label class="control-label" for="pic_off"> Picture Off </label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="res_sig_on" value="res_sig_on" id="res_sig_on" checked>
                                <label class="control-label" for="res_sig_on"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="res_sig_on" value="res_sig_off" id="res_sig_off">
                                <label class="control-label" for="res_sig_off"> Signature Off </label>
                            </div>
                        </div>
                    </div>
                    <label>Barangay Captain</label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="signature" value="On" id="on1" checked>
                                <label class="control-label" for="on1"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="signature" value="Off" id="off1">
                                <label class="control-label" for="off1"> Signature Off </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="rec_name" value="<?= $name ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="r_cert_pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"">
                    <span aria-hidden=" true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('payments/save_payments') ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valid Until:</label>
                                <input type="date" class="form-control" name="valid" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option>his</option>
                                    <option>her</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No of years</label>
                                <input type="text" class="form-control" name="years" placeholder="Enter no of years" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Add Initial</label>
                                <input type="text" class="form-control" placeholder="Enter Initials" name="initial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Official on Duty </label>
                                <input type="text" class="form-control" placeholder="Enter Official Name" name="official">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remarks </label>
                        <textarea class="form-control" placeholder="Enter Remarks" name="remarks"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Payment Details(Optional)</label>
                        <textarea class="form-control" placeholder="Enter Payment Details" name="details" required><?= $title ?> Payment</textarea>
                    </div>
                    <label>Resident</label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="pic_on" value="pic_on" id="pic_on1" checked>
                                <label class="control-label" for="pic_on1"> Picture On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="pic_on" value="pic_off" id="pic_off1">
                                <label class="control-label" for="pic_off1"> Picture Off </label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="res_sig_on" value="res_sig_on" id="res_sig_on1" checked>
                                <label class="control-label" for="res_sig_on1"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="res_sig_on" value="res_sig_off" id="res_sig_off1">
                                <label class="control-label" for="res_sig_off1"> Signature Off </label>
                            </div>
                        </div>
                    </div>
                    <label>Barangay Captain </label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="signature" value="On" id="on2" checked>
                                <label class="control-label" for="on2"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="signature" value="Off" id="off2">
                                <label class="control-label" for="off2"> Signature Off </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="rec_name" value="<?= $name ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="c_cert_pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('payments/save_payments1') ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valid Untill:</label>
                                <input type="date" class="form-control" name="valid" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Add Initial</label>
                                <input type="text" class="form-control" placeholder="Enter Initials" name="initial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Official on Duty </label>
                                <input type="text" class="form-control" placeholder="Enter Official Name" name="official">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remarks </label>
                        <textarea class="form-control" placeholder="Enter Remarks" name="remarks"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Payment Details(Optional)</label>
                        <textarea class="form-control" placeholder="Enter Payment Details" name="details" required><?= $title ?> Payment</textarea>
                    </div>
                    <label>Resident</label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="pic_on" value="pic_on" id="pic_on2" checked>
                                <label class="control-label" for="pic_on2"> Picture On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="pic_on" value="pic_off" id="pic_off2">
                                <label class="control-label" for="pic_off2"> Picture Off </label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="res_sig_on" value="res_sig_on" id="res_sig_on2" checked>
                                <label class="control-label" for="res_sig_on2"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="res_sig_on" value="res_sig_off" id="res_sig_off2">
                                <label class="control-label" for="res_sig_off2"> Signature Off </label>
                            </div>
                        </div>
                    </div>
                    <label>Barangay Captain </label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="signature" value="On" id="on3" checked>
                                <label class="control-label" for="on3"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="signature" value="Off" id="off3">
                                <label class="control-label" for="off3"> Signature Off </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php if ($current_page == 'generate_business_permit') : ?>
    <!-- Modal -->
    <div class="modal fade" id="b_permit_pment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('payments/save_payments2') ?>">
                        <div class="form-group">
                            <label>O.R No.</label>
                            <input type="text" class="form-control" name="or" placeholder="Enter OR number" required>
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                        </div>
                        <div class="form-group">
                            <label>Requestor</label>
                            <input type="text" class="form-control" name="requestor" placeholder="Enter Requestor" value="<?= $permit->owner1 ?>">
                        </div>
                        <div class="form-group">
                            <label>Add Initial</label>
                            <input type="text" class="form-control" placeholder="Enter Initials" name="initial">
                        </div>
                        <div class="form-group">
                            <label>Official on Duty </label>
                            <input type="text" class="form-control" placeholder="Enter Official Name" name="official">
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea class="form-control" placeholder="Enter Remarks" name="remarks"><?= $permit->remarks ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Payment Details(Optional)</label>
                            <textarea class="form-control" placeholder="Enter Payment Details" name="details" required><?= $title ?> Payment</textarea>
                        </div>
                        <div class="row m-b-12">
                            <div class="col-md-4">
                                <div class="radio radio-success">
                                    <input type="radio" name="signature" value="On" id="on4" checked>
                                    <label class="control-label" for="on4"> Signature On </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="radio radio-warning">
                                    <input type="radio" name="signature" value="Off" id="off4">
                                    <label class="control-label" for="off4"> Signature Off </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>