<div class="bg-light">
    <div class="container">
        <div class="text-center pt-5 pb-3">
            <h1 class="welcome_text">Announcement</h1>
        </div>
        <div class="row align-items-center">
            <?php foreach ($announce as $row) : ?>
                <div class="col-md-12 mb-4">
                    <div class="p-4 pt-2 bg-dark text-light">
                        <h1><?= ucwords($row['what']) ?></h1>
                        <p>By: <?= ucwords($row['who']) ?> this <?= date('F d, Y h:i:s A', strtotime($row['date'])) ?></p>
                        <p><?= ucwords($row['description']) ?></p>
                        <p>Venue: <?= ucwords($row['venue']) ?></p>
                        <?php if (!empty($row['docs'])) : ?>
                            <img src="<?= site_url('assets/uploads/') .  $row['docs'] ?>" class="img-fluid w-100">
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="mt-5 mb-5"></div>