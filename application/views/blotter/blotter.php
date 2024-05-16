<div class="row">
    <div class="col-md-9">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title"><?= $title ?></h4>
                </div>
                <div class="col-sm-6">
                    <ul class="list-inline pull-right">
                        <li>
                            <div class="card-tools">
                                <a href="<?= site_url('create_blotter') ?>" class="fcbtn btn btn-outline btn-primary btn-1d btn-xs btn-rounded">
                                    <i class="fa fa-plus"></i>
                                    Blotter
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive m-t-30">
                <table class="table table-hover table-striped" id="blottertable">
                    <thead>
                        <tr>
                            <th scope="col">Case No.</th>
                            <th scope="col">Complainant</th>
                            <th scope="col">Respondent</th>
                            <th scope="col">Victim(s)</th>
                            <th scope="col">Blotter/Incident</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($blotter)): ?>
                            <?php foreach($blotter as $row): ?>
                                <tr>
                                    <td><a href="<?= site_url('summon/').$row['case_no'] ?>"><?= ucwords($row['case_no']) ?></a></td>
                                    <td>

                                    <?php 
                                        $case_no = $row['case_no'];
                                        $query = $this->db->query("SELECT `name` FROM complainants WHERE case_no='$case_no'");
                                        $c = $query->row(5);
                                    ?>
                                    <?= $c->name ?>
                                    </td>
                                    <td><?= ucwords($row['respondent']) ?></td>
                                    <td><?= ucwords($row['victim']) ?></td>
                                    <td><?= ucwords($row['type']) ?></td>
                                    <td>
                                        <?php if($row['status']=='Scheduled'): ?>
                                            <span class="label label-warning">Scheduled</span>
                                        <?php elseif($row['status']=='Active'): ?>
                                            <span class="label label-danger">Active</span>
                                        <?php elseif($row['status']=='Dismissed'): ?>
                                            <span class="label label-info">Dismissed</span>
                                        <?php elseif($row['status']=='Endorsed'): ?>
                                            <span class="label label-primary">Endorsed</span>
                                        <?php else: ?>
                                            <span class="label label-success">Settled</span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a type="button"href="<?= site_url('edit_blotter/').$row['case_no'] ?>" data-toggle="tooltip" data-original-title="Edit Blotter"> 
                                            <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                        <?php if($row['status']=='Scheduled'): ?>
                                            <a type="button"href="<?= site_url('summon/').$row['case_no'] ?>" data-toggle="tooltip" data-original-title="Add Summons"> 
                                                <i class="fa fa-paste text-inverse m-r-10"></i> </a>
                                        
                                        <?php elseif($row['status']=='Settled'): ?>
                                            <a type="button" href="<?= site_url('generate_settlement_report/').$row['case_no'] ?>" data-toggle="tooltip" data-original-title="Generate Settlement Report"> 
                                                <i class="fa fa-file-text-o text-inverse m-r-10"></i> </a>
                                        
                                        <?php elseif($row['status']=='Dismissed'): ?>
                                            <a type="button"href="<?= site_url('generate_dismissed_report/').$row['case_no'] ?>" data-toggle="tooltip" data-original-title="Generate Dismissed Report"> 
                                                <i class="fa fa-file-text-o text-inverse m-r-10"></i> </a>

                                        <?php elseif($row['status']=='Endorsed'): ?>
                                            <a type="button" data-toggle="tooltip" href="<?= site_url('generate_endorsed_report/').$row['case_no'] ?>" data-original-title="Generate Endorsement Report">
                                                <i class="fa fa-file-text-o text-inverse m-r-10"></i> </a>
                                        <?php endif ?>

                                        <?php if($this->session->role == 'administrator' || $this->session->role == 'power user'):?>
                                            <a href="<?= site_url('blotter/delete/').$row['case_no'] ?>" onclick="return confirm('Are you sure you want to delete this blotter?');" data-toggle="tooltip" data-original-title="Remove">
                                                <i class="fa fa-close text-danger"></i> </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                </table>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="row colorbox-group-widget">
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"><?= $active ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text font-14">Active</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="activeCase" class="text-white">Active Case</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count"><?= $settled ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text font-14 text-white">Settled</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="settledCase" class="text-white">Settled Case</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-warning">
                        <div class="media-body">
                            <h3 class="info-count"><?= $scheduled  ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text font-14">Scheduled</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="scheduledCase" class="text-white">Scheduled Case</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-info">
                        <div class="media-body">
                            <h3 class="info-count"><?= $dismissed ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text font-14">Dismissed</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="dismissedCase" class="text-white">Dismissed Case</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count"><?= $endorsed ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text font-14">Endorsed</p>
                            <p class="info-ot font-13"><a href="javascript:void(0)" id="endorsedCase" class="text-white">Endorsed Case</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
