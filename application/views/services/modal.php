<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Srvices</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('services/save') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter Position" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Requirements</label>
                        <textarea class="form-control" placeholder="Enter Requirements" name="req" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" placeholder="Enter Details" name="desc" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Fees</label>
                        <input type="number" class="form-control" placeholder="Enter Fees" name="fees" required>
                    </div>
                    <div class="form-group">
                        <label>Upload Gcash QR Code</label>
                        <input type="file" class="form-control" accept="image/*" name="code">
                    </div>
                    <div class="form-group">
                        <label>Mobile No.(<i>ex.09123456789</i>)</label>
                        <input type="tel" class="form-control" placeholder="Enter Number" pattern="[0-9]{11}" required name="phone">
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Edit Srvices</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('services/update') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter Services name" name="title" required id="title">
                    </div>
                    <div class="form-group">
                        <label>Requirements</label>
                        <textarea class="form-control" placeholder="Enter Requirements" name="req" required id="req"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" placeholder="Enter Details" name="desc" required id="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Fees</label>
                        <input type="number" class="form-control" placeholder="Enter Fees" name="fees" required id="fees">
                    </div>
                    <div class="form-group">
                        <label>Upload Gcash QR Code</label>
                        <input type="file" class="form-control" accept="images/*" name="code" id="qr">
                    </div>
                    <div class="form-group">
                        <label>Mobile No.(<i>ex.09123456789</i>)</label>
                        <input type="tel" class="form-control" placeholder="Enter Number" pattern="[0-9]{11}" name="phone" required id="phone">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="stat">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="ser_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>