<div class="bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 mt-5">
                <div class="p-4 pt-5" style="border:5px solid #000000">
                    <h1>BACKGROUND OF BARANGAY</h1>
                    <p><?= $info->background ?></p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="<?= site_url('assets/uploads/') . $info->brgy_logo ?>" class="img-fluid mt-3" width="220">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-8 mt-2 ">
                <div class="p-4 pt-5" style="border:5px solid #000000">
                    <h1>MISSION AND VISION</h1>
                    <p><?= $info->dashboard_text ?></p>
                </div>

            </div>
            <div class="col-md-4 mt-2 text-center">
                <img src="<?= site_url('assets/uploads/') . $info->city_logo ?>" class="img-fluid  mt-3" width="220">
            </div>
        </div>

        <h2 class="text-center font-weight-bold mt-5">POPULATION</h2>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead class="text-light" style="background-color:#15cc24">
                    <tr>
                        <th>
                            <h5>CENSUS</h5>
                        </th>
                        <th>
                            <h5>COUNT</h5>
                        </th>
                    </tr>
                </thead>
                <tbody style="border-bottom: 1px solid black;">
                    <tr>
                        <td class="font-weight-bold">Population</td>
                        <td class="font-weight-bold"><?= number_format($population) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2 class="text-center font-weight-bold mt-5">ORGANIZATIONAL CHART</h2>
        <div class="mt-5 mb-5">
            <div class="row">
                <?php foreach ($officials as $row) : ?>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="<?= empty($row['avatar']) ?  site_url('assets/img/person.png') : site_url('assets/uploads/avatar/') . $row['avatar'] ?>" alt="Card image cap">
                            <div class="card-body text-center">
                                <h4 class="card-title font-weight-bold"><?= ucwords($row['name']) ?></h4>
                                <h5 class="card-title"><?= ucwords($row['position']) ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</div>