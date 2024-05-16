<div class="container text-light">
    <div class="text-center mt-5 p-5">
        <h1 class="welcome_text"><?= $title ?></h1>
    </div>
</div>
<div class="bg-light">
    <div class="container text-dark">
        <div class="pb-3">
            <h2 class="welcome_text mt-5 pt-5">Details for applying:</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">

                    <table class="table">
                        <thead class="text-light" style="background-color:#e48314">
                            <tr>
                                <th>
                                    <h5>Requirements</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody style="border-bottom: 1px solid black;">
                            <tr>
                                <td class="font-weight-bold"><?= $services->requires ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead class="text-light" style="background-color:#e48314">
                            <tr>
                                <th>
                                    <h5>Payment Details</h5>
                                </th>
                            </tr>
                        </thead>
                        <tbody style="border-bottom: 1px solid black;">
                            <tr>
                                <td class="font-weight-bold">Payment Fees: P <?= $services->fees ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Gcash Number: <?= $services->phone ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-light" style="background-color:#e48314">
                            <tr>
                                <th>
                                    <h5>Gcash QR Code</h5>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <img src="<?= $services->qr_code ? site_url('assets/uploads/') . $services->qr_code : null ?>" class="img-fluid" width="300" />
                </div>
            </div>
        </div>
        <div class="w-100 mt-3" style="height: 4px; background-color:black"></div>
        <div class="w-75 mr-auto ml-auto mt-5">
            <form method="POST" action="<?= site_url('request/request_docs') ?>" id="request_form">
                <div class="form-group">
                    <h6 class="font-weight-bold">Pick-up Date</h6>
                    <input type="date" class="form-control" name="date" id="date1" required min="<?= date('Y-m-d') ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h6 class="font-weight-bold">Payment Method</h6>
                            <select class="form-control" name="method" required id="pment_method">
                                <option>Cash on Pick-up</option>
                                <option>Gcash</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h6 class="font-weight-bold">Reference No(for Gcash Payment only)</h6>
                            <input type="text" class="form-control" name="ref" placeholder="Enter reference no." id="ref_no">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6 class="font-weight-bold">Purpose</h6>
                    <textarea class="form-control" name="purpose" placeholder="Enter your purpose" required></textarea>
                </div>
                <input type="hidden" name="service_id" value="<?= $services->id ?>" />

                <?php if ($this->session->role == 'resident') : ?>
                    <div class="">
                        <button class="btn btn-outline-success pl-4 pr-4" style="border-radius:1px; border:2px solid green">SUBMIT</button>
                    </div>
                <?php else : ?>
                    <p>Only registered residents can apply. Thank You for understanding!</p>
                <?php endif ?>
            </form>
        </div>
        <div style="height: 100px;"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const notification = "<?= $this->session->flashdata('message') ?>";

        if (notification) {
            Swal.fire({
                title: "Success!",
                text: notification,
                icon: "success"
            });
        }
    </script>