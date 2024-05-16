<div class="white-box">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="box-title"><?= $title ?></h4>
        </div>
    </div>

    <div class="table-responsive m-t-30">
        <table class="table table-hover table-striped" id="activityTable">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($logs)) : ?>
                    <?php $no = 1;
                    foreach ($logs as $row) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['activity'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= date('F d, Y h:i:s A', strtotime($row['timestamp'])) ?></td>
                        </tr>
                    <?php $no++;
                    endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>