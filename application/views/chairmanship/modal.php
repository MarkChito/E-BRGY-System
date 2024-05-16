<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Create Chairmanship</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('chairmanship/save_chairmanship') ?>" >
                    <div class="form-group">
                        <label>Chairmanship</label>
                        <input type="text" class="form-control" placeholder="Enter Chairmanship" name="chair" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('chairmanship/update_chairmanship') ?>" >
                    <div class="form-group">
                        <label for="position">Chairmanship</label>
                        <input type="text" class="form-control" id="chair" placeholder="Chairmanship" name="chair" required>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="chair_id" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>