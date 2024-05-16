<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Purok</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('purok/save_purok') ?>" >
                    <div class="form-group">
                        <label>Purok Name</label>
                        <input type="text" class="form-control" placeholder="Enter Purok Name" name="purok" required>
                    </div>
                    <div class="form-group">
                        <label>Purok Details(Optional)</label>
                        <textarea class="form-control" placeholder="Set Bounderies for each Purok" name="details"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Purok</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('purok/update_purok') ?>">
                    <div class="form-group">
                        <label>Purok Name</label>
                        <input type="text" class="form-control" id="purok" placeholder="Enter Purok Name" name="purok" required>
                    </div>
                    <div class="form-group">
                        <label>Purok Details(Optional)</label>
                        <textarea class="form-control" id="details" placeholder="Set Bounderies for each Purok" name="details"></textarea>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="purok_id" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>