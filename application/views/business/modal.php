<!-- Modal -->
<div class="modal fade" id="addPermit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Business Permit</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-light bg-danger error-msg" style="display:none"></div>
                <form method="POST" id="permit-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Business Name</label>
                                <input type="text" class="form-control" placeholder="Enter Business Name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Business Owner</label>
                                <input type="text" class="form-control mb-2" placeholder="Enter Owner Name" name="owner1" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Business Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number" name="number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date Applied</label>
                                <input type="date" class="form-control" name="applied" value="<?= date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date Expired</label>
                                <input type="date" class="form-control" name="expired" value="<?= date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Business Nature</label>
                                <input type="text" class="form-control" placeholder="Sari-Sari Store/Warter Refill Station" name="nature" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Permit Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="New">New</option>
                                    <option value="Renewal">Renewal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Business Address</label>
                        <textarea class="form-control" name="baddress" placeholder="Enter Street, Building Number, Purok/Sitio, barangay, Town, Province" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Owners Address</label>
                        <textarea class="form-control" name="oaddress" placeholder="Enter Street, Building Number, Purok/Sitio, barangay, Town, Province" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Remarks(Optional)</label>
                        <textarea class="form-control" name="remarks" placeholder="Enter Remarks"></textarea>
                    </div>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="createPermit">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editPermit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Update Business Permit</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-light bg-danger error-msg" style="display:none"></div>
                <form method="POST" id="update-permit-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Business Name</label>
                                <input type="text" class="form-control" placeholder="Enter Business Name" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Business Owner</label>
                                <input type="text" class="form-control mb-2" placeholder="Enter Owner Name" name="owner1" id="owner1" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Business Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number" name="number" id="number"> required
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date Applied</label>
                                <input type="date" class="form-control" name="applied" value="<?= date('Y-m-d'); ?>" id="applied">
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label">Business Owner</label>
                                <input type="text" class="form-control" placeholder="Enter Owner Name" name="owner2" id="owner2" required>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label">Date Expired</label>
                                <input type="date" class="form-control" name="expired" value="<?= date('Y-m-d'); ?>" id="expired">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Business Nature</label>
                                <input type="text" class="form-control" placeholder="Sari-Sari Store/Warter Refill Station" name="nature" id="nature" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Permit Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="New">New</option>
                                    <option value="Renewal">Renewal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Business Address</label>
                        <textarea class="form-control" name="baddress" placeholder="Enter Street, Building Number, Purok/Sitio, barangay, Town, Province" id="baddress"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Owners Address</label>
                        <textarea class="form-control" name="oaddress" placeholder="Enter Street, Building Number, Purok/Sitio, barangay, Town, Province" id="oaddress"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Remarks(Optional)</label>
                        <textarea class="form-control" name="remarks" placeholder="Enter Remarks" id="remarks"></textarea>
                    </div>    
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="updatePermit">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>