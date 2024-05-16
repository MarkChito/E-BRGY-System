<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="precinctTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Services</th>
                    <th>Purpose</th>
                    <th>Payment Method</th>
                    <th>Ref. No.</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($trans as $row) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= date('M. d, Y', strtotime($row['date'])) ?></td>
                        <td><a href="<?= site_url('generate_profile/') . $row['res_id'] ?>"><?= $row['firstname'] . '' . $row['middlename'] . ' ' . $row['lastname'] ?></a> </td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['payment_method'] ?></td>
                        <td><?= $row['ref_no'] ?></td>
                        <td>
                            <select class=" form-control" onchange="requestStatus(this)" data-id="<?= $row['req_id'] ?>">
                                <option <?= $row['status'] == 'Pending' ? 'selected' : null ?>>Pending</option>
                                <option <?= $row['status'] == 'Ready for Pickup' ? 'selected' : null ?>>Ready for Pickup</option>
                                <option <?= $row['status'] == 'Received' ? 'selected' : null ?>>Received</option>
                                <option <?= $row['status'] == 'Cancelled' ? 'selected' : null ?>>Cancelled</option>
                            </select>
                        </td>
                        <td>
                            <a href="<?= site_url('request/delete/') . $row['req_id'] ?>" onclick="return confirm('Are you sure you want to delete this request?');" data-toggle="tooltip" data-original-title="Remove">
                                <i class="fa fa-close text-danger"></i>
                            </a>
                           

                            <?php if (strtolower($row['title']) === 'barangay clearance') : ?>
                                <a href="<?= site_url('generate_brgy_cert/') . $row['res_id'] ?>" onclick="return confirm('Redirect to print page?');" data-toggle="tooltip" data-original-title="Print">
                                    <i class="fa fa-print text-primary"></i>
                                </a>
                            <?php elseif (strtolower($row['title']) === 'residency certificate') : ?>
                                <a href="<?= site_url('generate_resi_cert/') . $row['res_id'] ?>" onclick="return confirm('Redirect to print page?');" data-toggle="tooltip" data-original-title="Print">
                                    <i class="fa fa-print text-primary"></i>
                                </a>
                            <?php elseif (strtolower($row['title']) === 'indigency certificate') : ?>
                                <a href="<?= site_url('generate_indi_cert/') . $row['res_id'] ?>" onclick="return confirm('Redirect to print page?');" data-toggle="tooltip" data-original-title="Print">
                                    <i class="fa fa-print text-primary"></i>
                                </a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php $no++;
                endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Add Files</h5>
            </div>
            <form method="POST" action="<?= site_url('request/addfiles') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group">
                        <label>Upload Certificate</label>
                        <input type="file" class="form-control" accept="image/jpeg,image/png,application/pdf" name="docs">
                    </div>
                    <input type="hidden" name="id" value="" id="req_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>