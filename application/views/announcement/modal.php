<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('announcement/save_announcement') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label>What:</label>
                        <input type="text" class="form-control" name="what" required placeholder="Enter Details">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" placeholder="Enter Details" name="desc" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>When:</label>
                        <input type="datetime-local" class="form-control" name="when" value="<?= date('Y-m-d\TH:i'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Where:</label>
                        <textarea class="form-control" placeholder="Enter Venue" name="where" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Who:</label>
                        <input type="text" class="form-control" placeholder="Enter Organizer" name="who" required>
                    </div>
                    <div class="form-group">
                        <label>Attach File:</label>
                        <input type="file" class="form-control" name="file" accept="image/*">
                        <small>Only accepts images</small>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-default" data-dismiss="modal">Close</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('announcement/update_announcement') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label>What:</label>
                        <input type="text" class="form-control" name="what" id="what" required placeholder="Enter Details">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" placeholder="Enter Details" id="desc" name="desc" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>When:</label>
                        <input type="datetime-local" class="form-control" name="when" id="when" required>
                    </div>
                    <div class="form-group">
                        <label>Where:</label>
                        <textarea class="form-control" placeholder="Enter Venue" name="where" required id="where"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Who:</label>
                        <input type="text" class="form-control" placeholder="Enter Organizer" name="who" required id="who">
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <select class="form-control" name="status" id="status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Attach File:</label>
                        <input type="file" class="form-control" name="file" accept="image/*">
                        <small>Only accepts images</small>
                    </div>

            </div>
            <div class="modal-footer">
                <input id="announce_id" name='id' type="hidden" />
                <button type="button" class="btn  btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>