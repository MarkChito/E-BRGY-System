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
                            Precinct
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
                    <th scope="col">Purok</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($precinct)): ?>
                    <?php $no=1; foreach($precinct as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['precinct_name'] ?></td>
                        <td><?= $row['details'] ?></td>
                        <td>
                            <a type="button" href="#edit" data-toggle="modal" onclick="editPrecinct(this)" title="Edit Precinct" data-precinct="<?= $row['precinct_name'] ?>" data-details="<?= $row['details'] ?>" data-id="<?= $row['id'] ?>"> 
                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            <a href="<?= site_url('precinct/delete/').$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this precinct?');" data-toggle="tooltip" data-original-title="Remove"> 
                                <i class="fa fa-close text-danger"></i> </a>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('precinct/modal') ?>