<div class="row">
    <div class="col-md-9">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title"><?= $title ?></h4>
                </div>
            </div>

            <div class="table-responsive m-t-30">
                <table class="table table-hover table-striped" id="purokTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Purok No.</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($purok)): ?>
                            <?php $no=1; foreach($purok as $row): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['purok_name'] ?></td>
                                <td><?= $row['details'] ?></td>
                            </tr>
                            <?php $no++; endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No Available Data</td>
                            </tr>
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
                    <div class="media"  style="background-color:#880a14">
                        <div class="media-body">
                            <h3 class="info-count"><?= number_format(count($purok)) ?> <span class="pull-right"><i class="icon-direction"></i></span></h3>
                            <p class="info-text text-white font-16">Total Purok</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>