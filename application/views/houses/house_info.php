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
                            <th>No.</th>
                            <th>House Number</th>
                            <th>Name</th>
                            <th>Relation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($members)) : ?>
                            <?php $no = 1;
                            foreach ($members as $row) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['house_number'] ?></td>
                                    <td>
                                        <?php if (empty($row['picture'])) : ?>
                                            <img width="30" height="30" class="img-circle" alt="user" src="<?= site_url() ?>assets/img/person.png" />
                                        <?php else : ?>
                                            <img width="30" height="30" class="img-circle" alt="user" src="<?= preg_match('/data:image/i', $row['picture']) ? $row['picture'] : site_url() . 'assets/uploads/resident_profile/' . $row['picture'] ?>" />
                                        <?php endif ?>
                                        <?= ucwords($row['lastname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']) ?>
                                    </td>
                                    <td><?= $row['relation'] ?></td>
                                    <td>
                                        <a type="button" href="#editRelation" title="Edit Family Relation" data-toggle="modal" onclick="editRelation(this)" data-res="<?= $row['resident_id']; ?>" data-rel="<?= $row['relation']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach ?>
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
                    <div class="media" style="background-color:#f30c90">
                        <div class="media-body">
                            <h3 class="info-count"><?= number_format(count($members)) ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text text-white font-16">Total Members</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('houses/modal') ?>