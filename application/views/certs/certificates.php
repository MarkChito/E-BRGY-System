<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
        <div class="col-sm-6">
            <ul class="list-inline pull-right">
                <li>
                    <div class="card-tools">
                        <a href="<?= site_url('create_certificates') ?>" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                            <i class="fa fa-plus"></i>
                            Create Certificate
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="certsTable">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Salutation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($certs)): ?>
                    <?php $no=1; foreach($certs as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['salutation'] ?></td>
                        <td>
                            <a href="<?= site_url('edit_certificate/').$row['id'] ?>" data-toggle="tooltip" data-original-title="Edit Certificate"> 
                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            
                            <a href="<?= site_url('generate_cert/').$row['id'] ?>" data-toggle="tooltip" data-original-title="Generate Certificate"> 
                                <i class="fa fa-file-text-o text-primary m-r-10"></i> </a>
                            <?php if($this->session->role == 'administrator' || $this->session->role == 'power user'):?>
                            <a href="<?= site_url('certificates/delete/').$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this certificate?');" data-toggle="tooltip" data-original-title="Remove"> 
                                <i class="fa fa-close text-danger"></i> </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>