<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
        <div class="col-sm-6">
            <ul class="list-inline pull-right">
                <li>
                    <?php if($this->session->role == 'administrator'):?>
                        <div class="card-tools">
                            <a href="#add_user" data-toggle="modal" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                                <i class="fa fa-plus"></i>
                                User
                            </a>
                        </div>
                    <?php endif?>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="userTable">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($users)): ?>
                    <?php $no=1; foreach($users as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <?php if(empty($row['avatar'])): ?>
                                <img width="30" height="30" class="img-circle" alt="user" src="<?= site_url() ?>assets/img/person.png" />
                            <?php else: ?>
                                <img width="30" height="30" class="img-circle" alt="user" src="<?= preg_match('/data:image/i', $row['avatar']) ? $row['avatar'] : site_url().'assets/uploads/avatar/'.$row['avatar'] ?>" />
                            <?php endif ?>
                            <?= ucwords($row['username']) ?>
                        </td>
                        <td><?= $row['email'] ?></td>
                        <td><span class="label label-table label-primary"><?= ucwords($row['user_type']) ?></span></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                            <a href="<?= site_url('remove_user/').$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');" data-toggle="tooltip" data-original-title="Remove"> 
                                <i class="fa fa-close text-danger"></i> </a>
                        </td>
                        
                    </tr>
                    <?php $no++; endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No Available Data</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('user/modal') ?>