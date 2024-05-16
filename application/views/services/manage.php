<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
        <div class="col-sm-6">
            <ul class="list-inline pull-right">
                <li>
                    <div class="card-tools">
                        <a href="#add" data-toggle="modal" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                            <i class="fa fa-plus"></i>
                            Services
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="precinctTable">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Requirements</th>
                    <th scope="col">Details</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Qr Code</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($services)) : ?>
                    <?php $no = 1;
                    foreach ($services as $row) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['requires'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['fees'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= !empty($row['qr_code']) ? '<img width="50" height="50" src="' . site_url('assets/uploads/') . $row['qr_code'] . '"/>' : null ?></td>
                            <td><?= $row['status'] == 'Active' ? '<span class="label label-table label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?></td>
                            <td>
                                <a type="button" href="#edit" data-toggle="modal" onclick="editService(this)" title="Edit Precinct" data-stat="<?= $row['status'] ?>" data-req="<?= $row['requires'] ?>" data-phone="<?= $row['phone'] ?>" data-fees="<?= $row['fees'] ?>" data-title="<?= $row['title'] ?>" data-details="<?= $row['description'] ?>" data-id="<?= $row['id'] ?>">
                                    <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="<?= site_url('services/delete/') . $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this services?');" data-toggle="tooltip" data-original-title="Remove">
                                    <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('services/modal') ?>