<!-- Modal -->
<div class="modal fade" id="editRelation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Edit Relation</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('dashboard/update_relation') ?>" >
                    <div class="form-group">
                        <label for="position">Relation</label>
                        <input type="text" class="form-control" id="relation" name="relation" required>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="res_id" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editHouse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Edit Household Number</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('dashboard/update_household') ?>" >
                    <div class="form-group">
                        <label for="position">House Number</label>
                        <input type="text" class="form-control" id="number" name="number" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Household Details</label>
                        <input type="text" class="form-control" id="details" name="details">
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="house_id" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>