<div class="bg-dark">
    <div class="container text-light pt-4">
        <div class="text-center">
            <h1 class="welcome_text">ONLINE DOCUMENTS OFFERED:</h1>
        </div>
        <div class="w-75 mr-auto ml-auto mt-5">
            <?php foreach ($services as $row) : ?>
                <div class="bg-light p-4 text-dark mt-4">
                    <h3><?= $row['title'] ?></h3>
                    <p><?= $row['description'] ?></p>
                    <div class="text-right">
                        <a href="<?= site_url('client/services_info/') . $row['id'] ?>" class="btn btn-sm btn-primary pr-4 pl-4 pt-2 pb-2" style="border-radius: 1px;">PROCEED</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div style="height:200px"></div>
</div>