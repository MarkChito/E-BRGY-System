<div class="row">
    <div class="col-md-9">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title"><?= $title ?></h4>
                </div>
            </div>

            <div class="table-responsive m-t-30">
                <table class="table table-hover table-striped" id="housesTable">
                    <thead>
                        <tr>
                            <th>House No.</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($house)): ?>
                            <?php foreach($house as $row): ?>
                            <tr>
                                <td><a href="<?= site_url('house_info/').$row['number'] ?>"><?= $row['number'] ?></a></td>
                                <td><?= $row['info'] ?></td>
                                <td>
                                    <a type="button" href="#editHouse" data-toggle="modal" onclick="editHouse(this)" title="Edit Household Info" data-id="<?= $row['id'] ?>" data-num="<?= $row['number'] ?>" data-info="<?= $row['info'] ?>"> 
                                        <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                    </a>
                                    <?php if($this->session->role == 'administrator' || $this->session->role == 'power user'):?>
                                        <a href="<?= site_url('dashboard/delete_household/').$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this household number?');" data-toggle="tooltip" data-original-title="Remove"> 
                                            <i class="fa fa-close text-danger"></i> 
                                        </a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row colorbox-group-widget">
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media"  style="background-color:#f30c90">
                        <div class="media-body">
                            <h3 class="info-count"><?= number_format(count($house)) ?> <span class="pull-right"><i class="icon-home"></i></span></h3>
                            <p class="info-text text-white font-16">Total Houses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('houses/modal') ?>