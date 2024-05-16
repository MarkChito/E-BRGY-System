<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Precinct</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('precinct/save_precinct') ?>">
                    <div class="form-group">
                        <label>Precinct No.</label>
                        <input type="text" class="form-control" placeholder="Enter Precinct No" name="precinct" required>
                    </div>
                    <div class="form-group">
                        <label>Precinct Details(Optional)</label>
                        <textarea class="form-control" placeholder="Enter Precinct details" name="details"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Precinct</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('precinct/update_precinct') ?>" >
                    <div class="form-group">
                        <label>Precinct No</label>
                        <input type="text" class="form-control" id="precinct" placeholder="Enter Precinct No" name="precinct" required>
                    </div>
                    <div class="form-group">
                        <label>Precinct Details(Optional)</label>
                        <textarea class="form-control" id="details" placeholder="Enter Precinct Details" name="details"></textarea>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="precinct_id" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>