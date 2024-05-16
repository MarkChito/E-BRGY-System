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
                            Announcement
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="positionTable">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">What</th>
                    <th scope="col">Description</th>
                    <th scope="col">When</th>
                    <th scope="col">Where</th>
                    <th scope="col">Who</th>
                    <th scope="col">File</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($announce)) : ?>
                    <?php $no = 1;
                    foreach ($announce as $row) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['what'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= date('F d, Y h:i:s A', strtotime($row['date'])) ?></td>
                            <td><?= $row['venue'] ?></td>
                            <td><?= $row['who'] ?></td>
                            <td><?php if (!empty($row['docs'])) : ?><a href="<?= site_url('assets/uploads/') . $row['docs'] ?>" target="_blank"><i class="fa fa-file-image-o"></i></a> <?php endif ?></td>
                            <td><?= $row['status'] == 'Active' ? '<span class="label label-table label-primary">Active</span>' : '<span class="label label-danger">Inactive</span>' ?></td>
                            <td>
                                <a type="button" href="#edit" data-toggle="modal" onclick="editAnnouncement(this)" title="Edit Announcement" data-what="<?= $row['what'] ?>" data-date="<?= $row['date'] ?>" data-desc="<?= $row['description'] ?>" data-venue="<?= $row['venue'] ?>" data-who="<?= $row['who'] ?>" data-id="<?= $row['id'] ?>" data-status="<?= $row['status'] ?>">
                                    <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="<?= site_url('announcement/delete/') . $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this announcement?');" data-toggle="tooltip" data-original-title="Remove">
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
<?php $this->load->view('announcement/modal') ?>