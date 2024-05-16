<div class="container text-light">
    <div class="text-center p-5">
        <h1 class="welcome_text"><?= $title ?></h1>
    </div>
</div>
<div class="bg-light" style="min-height: 60vh;">
    <div class="container text-dark">
        <div class="table-responsive">

            <table class="table mt-5">
                <thead class="text-light" style="background-color:#2CCCC4">
                    <tr>
                        <th>Date</th>
                        <th>Service</th>
                        <th>Purpose</th>
                        <th>Payment Method</th>
                        <th>Ref. No.</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="border-bottom: 1px solid black;">
                    <?php foreach ($trans as $row) : ?>
                        <tr>
                            <td><?= date('M. d, Y', strtotime($row['date'])) ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['purpose'] ?></td>
                            <td><?= $row['payment_method'] ?></td>
                            <td><?= $row['ref_no'] ?></td>
                            <td>
                                <?php if ($row['status'] == 'Cancelled') : ?>
                                    <badge class="badge badge-danger"><?= $row['status'] ?></badge>
                                <?php elseif ($row['status'] == 'Pending') : ?>
                                    <badge class="badge badge-primary"><?= $row['status'] ?></badge>
                                <?php else : ?>
                                    <badge class="badge badge-success"><?= $row['status'] ?></badge>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($row['status'] == 'Pending') : ?>
                                    <a class="btn btn-danger btn-sm" href="<?= site_url('request/cancel/') . $row['req_id'] ?>" onclick="return confirm('Are you sure you want to cancel this transaction?');" title="Cancel">
                                        Cancel
                                    </a>
                                <?php elseif (strpos($row['status'], 'Ready') !== false) : ?>
                                    <a class="btn btn-primary btn-sm" href="<?= site_url('request/received/') . $row['req_id'] ?>" onclick="return confirm('Documents has been received?');" title="Received">
                                        Received
                                    </a>
                                <?php endif ?>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>