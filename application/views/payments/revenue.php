<div class="row">
    <div class="col-md-9">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title"><?= $title ?></h4>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label>From:</label>
                            <input type="text" class="form-control" placeholder="Enter date" id="min">
                        </div>
                        <div class="col-md-6">
                            <label>To:</label>
                            <input type="text" class="form-control" placeholder="Enter date" id="max">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive m-t-30">
                <table class="table table-hover table-striped" id="revenuetable">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Recipient</th>
                            <th scope="col">Details</th>
                            <th class="text-right">Amount(P)</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($revenue)): ?>
                            <?php $no=1; foreach($revenue as $row): ?>
                            <tr>
                                <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                                <td><?= $row['purpose'] ?></td>
                                <td><?= $row['recipient'] ?></td>
                                <td><?= $row['details'] ?></td>
                                <td class="text-right"><?= number_format($row['amount'],2) ?></td>
                                <td><?= $row['user'] ?></td>
                            </tr>
                            <?php $no++; endforeach ?>
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
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count"><?= count($trans) ?> <span class="pull-right"><i class="fa fa-calendar"></i></span></h3>
                            <p class="info-text font-14">Today's Transaction</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count"><?= number_format(count($revenue)) ?> <span class="pull-right"><i class="fa fa-thumbs-o-up"></i></span></h3>
                            <p class="info-text font-14">Total Transactions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>