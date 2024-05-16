<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
        <div class="col-sm-6">
            <ul class="list-inline pull-right">
                <li>
                        <div class="card-tools">
                            <a href="#addPermit" data-toggle="modal" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                                <i class="fa fa-plus"></i>
                                Business Permit
                            </a>
                        </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="permittable">
            <thead>
                <tr>
                    <th scope="col">Business Name</th>
                    <th scope="col">Business Owner</th>
                    <th scope="col">Nature</th>
                    <th scope="col">Applied</th>
                    <th scope="col">Expired</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($permit)): ?>
                    <?php foreach($permit as $row): ?>
                    <tr>
                        <td><?= ucwords($row['b_name']) ?></td>
                        <td><?= !empty($row['owner2']) ? ucwords($row['owner1'].' & '. $row['owner2']) : $row['owner1'] ?></td>
                        <td><?= $row['nature'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td><?= $row['expiration_date'] ?></td>
                        <td>
                            <a onclick="editPermit(this)" type="button" href="#editPermit" data-toggle="modal" title="Edit Permit" data-id="<?= $row['id'] ?>" data-name="<?= $row['b_name'] ?>" data-applied="<?= $row['created_at'] ?>" 
                                data-owner1="<?= $row['owner1'] ?>" data-owner2="<?= $row['owner2'] ?>" data-status="<?= $row['status'] ?>" data-number="<?= $row['number'] ?>" data-baddress="<?= $row['b_address'] ?>"
                                data-oaddress="<?= $row['o_address'] ?>" data-remarks="<?= $row['remarks'] ?>" data-expired="<?= $row['expiration_date'] ?>" data-nature="<?= $row['nature'] ?>"> 
                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                            <a type="button" href="<?= site_url('generate_business_permit/').$row['id'] ?>" data-toggle="tooltip" data-original-title="Generate Permit"> <i class="fa fa-file-text-o text-inverse m-r-10"></i> </a>
                            <?php if($this->session->role == 'administrator' || $this->session->role == 'power user'): ?>
                                <a href="<?= site_url('business/delete/').$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this permit?');" data-toggle="tooltip" data-original-title="Remove"> <i class="fa fa-close text-danger"></i> </a>
                            <?php endif ?>
                        </td>
                        
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>

                <?php if(!empty($resident)): ?>
                    <?php foreach($resident as $row): ?>
                    <tr>
                        <td> 
                            <a href="<?= site_url('generate_profile/').$row['id'] ?>">
                                <?php if(empty($row['picture'])): ?>
                                    <img width="30" height="30" class="img-circle" alt="user" src="<?= site_url() ?>assets/img/person.png" />
                                <?php else: ?>
                                    <img width="30" height="30" class="img-circle" alt="user" src="<?= preg_match('/data:image/i', $row['picture']) ? $row['picture'] : site_url().'assets/uploads/resident_profile/'.$row['picture'] ?>" />
                                <?php endif ?>
                                
                                <?= ucwords($row['lastname'].', '.$row['firstname'].' '.$row['middlename']) ?>
                            </a>
                        </td>
                        <td><?= $row['national_id'] ?></td>
                        <td><?= $row['alias'] ?></td>
                        <td><?= $row['birthdate'] ?></td>
                        <td><?= floor((time() - strtotime($row['birthdate'])) / 31556926); ?></td>
                        <td><?= $row['civilstatus'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['purok'] ?></td>
                        <?php if($this->session->role == 'administrator' || $this->session->role == 'manager'):?>
                            <td><?= $row['voterstatus'] ?></td>
                        <?php endif ?>
                        <td><?= $row['resident_type']==1 ? '<span class="label label-primary">Alive</span>' :'<span class="label label-danger">Deceased</span>' ?></td>
                        <td><?= $row['pwd'] ?></td>

                        <td class="text-nowrap">
                            <a  type="button" href="<?= site_url('edit_resident/').$row['id'] ?>" onclick="editOfficial(this)" data-toggle="tooltip" data-original-title="Edit Resident"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                            <?php if($this->session->role == 'administrator' || $this->session->role == 'manager'):?>
                                <a  type="button" href="<?= site_url('generate_profile/').$row['id'] ?>" data-toggle="tooltip" data-original-title="View Profile"> <i class="fa fa-user text-info m-r-10"></i> </a>
                                <a  type="button" href="<?= site_url('generate_id/').$row['id'] ?>" data-toggle="tooltip" data-original-title="Generate ID"> <i class="fa fa-file-photo-o text-inverse m-r-10"></i> </a>
                                <a href="<?= site_url('resident/delete/').$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this business permit?');" data-toggle="tooltip" data-original-title="Remove"> <i class="fa fa-close text-danger"></i> </a>
                            <?php endif ?>
                        </td>
                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('business/modal') ?>