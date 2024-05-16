<!-- Modal -->
<div class="modal fade" id="covidUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">COVID19 Status</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('resident/covidUpdate') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date Vaccinated 1st Dose:</label>
                                <input type="date" class="form-control" name="date" id="dose">
                            </div>
                            <div class="form-group">
                                <label>Vaccinator Name:</label>
                                <input type="text" class="form-control" name="vac_name" id="vname">
                            </div>
                            <div class="form-group">
                                <label>Manufacturer:</label>
                                <input type="text" class="form-control" name="manufacturer" id="manu">
                            </div>
                            <div class="form-group">
                                <label>Batch No.:</label>
                                <input type="text" class="form-control" name="batch" id="batch">
                            </div>
                            <div class="form-group">
                                <label>Lot No.:</label>
                                <input type="text" class="form-control" name="lot_no" id="lot">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date Vaccinated 2nd Dose:</label>
                                <input type="date" class="form-control" name="date1" id="dose1">
                            </div>
                            <div class="form-group">
                                <label>Vaccinator Name:</label>
                                <input type="text" class="form-control" name="vac_name1" id="vname1">
                            </div>
                            <div class="form-group">
                                <label>Manufacturer:</label>
                                <input type="text" class="form-control" name="manufacturer1" id="manu1">
                            </div>
                            <div class="form-group">
                                <label>Batch No.:</label>
                                <input type="text" class="form-control" name="batch1" id="batch1">
                            </div>
                            <div class="form-group">
                                <label>Lot No.:</label>
                                <input type="text" class="form-control" name="lot_no1" id="lot1">
                            </div>
                        </div>
                    </div>
                    <label>COVID Update:</label>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="radio radio-success">
                                <input type="radio" name="status" id="nega" checked value="Negative">
                                <label class="control-label" for="nega"> Negative </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="status" id="posi" value="Positive">
                                <label class="control-label" for="posi"> Positive </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-primary">
                                <input type="radio" name="status" id="fully" value="Fully Vaccinated">
                                <label class="control-label" for="fully"> Fully Vaccinated </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-primary">
                                <input type="radio" name="status" id="1stvac" value="1st Vaccine">
                                <label class="control-label" for="1stvac"> 1st Vaccine </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="status" id="fullyP" value="Fully Vaccinated - Positive">
                                <label class="control-label" for="fullyP"> Fully Vaccinated - Positive </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio radio-danger">
                                <input type="radio" name="status" id="1stP" value="1st Vaccine - Positive">
                                <label class="control-label" for="1stP"> 1st Vaccine - Positive </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remarks/Details:</label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="res_id" name="res_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
$query = $this->db->query("SELECT * FROM id_settings WHERE id=1");
$id = $query->row();
?>
<!-- Modal -->
<div class="modal fade" id="editID" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Change ID Background</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/changeIDbackground') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label class="control-label">Select Certificate Sidebar Background Color</label><br>
                        <input type="text" name="bg_color" class="colorpicker form-control w-100" value="<?= $id->bg_color ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Front ID Watermark</label><br>
                        <input name="front" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-100" data-default-file="<?= site_url() . '/assets/uploads/' . $id->front ?>" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Back ID Watermark</label><br>
                        <input name="back" accept="image/*" type="file" class="dropify" data-height="250" id="input-file-now-custom-101" data-default-file="<?= site_url() . '/assets/uploads/' . $id->back ?>" />
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

<div class="modal fade" id="id_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Payment</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('payments/save_id_payments') ?>">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Enter amount to pay" required>
                    </div>
                    <label> <b>In-Case of Emergency</b></label>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" placeholder="Enter fullname" name="name">
                    </div>
                    <div class="form-group">
                        <label>Contact No.:</label>
                        <input type="text" class="form-control" placeholder="Enter contact number" name="number">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" placeholder="Enter Remarks" name="address"><?= !empty($resident->address) ? $resident->address : null ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Payment Details(Optional)</label>
                        <textarea class="form-control" placeholder="Enter Payment Details" name="details" required><?= $title ?> Payment</textarea>
                    </div>
                    <label>Barangay Captain </label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="signature" value="On" id="on" checked>
                                <label class="control-label" for="on"> Signature On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="signature" value="Off" id="off">
                                <label class="control-label" for="off"> Signature Off </label>
                            </div>
                        </div>
                    </div>
                    <label>Front ID Watermark</label>
                    <div class="row m-b-12">
                        <div class="col-md-4">
                            <div class="radio radio-success">
                                <input type="radio" name="watermark" value="On" id="on1" checked>
                                <label class="control-label" for="on1"> On </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio radio-warning">
                                <input type="radio" name="watermark" value="Off" id="off1">
                                <label class="control-label" for="off1"> Off </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="rec_name" value="<?= !empty($resident->firstname) ? $resident->firstname . ' ' . $resident->lastname : null ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            </form>
        </div>
    </div>
</div>