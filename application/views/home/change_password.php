<div class="container text-light">
    <div class="text-center mt-3 bg-white text-dark p-5">
        <h1 class="welcome_text">Barangay <?= $info->brgy_name ?></h1>
        <div class="row  mt-5">
            <div class="col-md-4">
                <img src="<?= site_url('assets/uploads/') . $info->brgy_logo ?>" class="img-fluid brgy">
            </div>
            <div class="col-md-8 mt-5">
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-<?= $this->session->flashdata('success') ?> alert-dismissible fade show" role="alert">
                        <small><?= $this->session->flashdata('message') ?></small>
                    </div>
                <?php endif ?>
                <form method="POST" action="<?= site_url('auth/resetResPass') ?>" id="register_form">
                    <div class="form-group">
                        <input class="form-control-lg w-100" placeholder="Username" required name="username" value="<?= $this->session->flashdata('username') ?>" />
                        <input type="hidden" required name="user_id" value="<?= $this->session->flashdata('user_id') ?>" />
                    </div>
                    <div class="form-group">
                        <input class="form-control-lg w-100" id="password" name="password" type="password" required="" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" />
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password">Show</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control-lg w-100" id="conpassword" name="conpassword" type="password" required="" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" />
                        <span toggle="#conpassword" class="fa fa-fw fa-eye field-icon toggle-password">Show</span>
                    </div>
                    <button class="btn btn-warning btn-lg w-100 mt-3" type="submit" style="border-radius: 1px;">CHANGE PASSWORD</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- OTP Modal -->
<div class="modal fade" id="otp_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="staticBackdropLabel">OTP Verification</h5>
            </div>
            <form action="javascript:void(0)" id="otp_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="otp_code">Enter 6-Digit OTP Code</label>
                        <input type="number" id="otp_code" class="form-control" required>
                        <small class="text-danger d-none" id="error_otp_code">Invalid OTP Code</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="otp_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= site_url() ?>assets/plugins/components/jquery/dist/jquery.min.js"></script>

<script>
    jQuery(document).ready(function() {
        const base_url = "<?= base_url() ?>";
        const urlParams = new URLSearchParams(window.location.search);
        const otp_reset = urlParams.has('otp_reset') ? urlParams.get('otp_reset') : null;

        if (otp_reset) {
            $("#otp_modal").modal("show");
        }

        $("#otp_form").submit(function() {
            const otp_code = $("#otp_code").val();

            $("#otp_submit").text("Please wait...");
            $("#otp_submit").attr("disabled", true);

            var formData = new FormData();

            formData.append('otp_code', otp_code);

            var xhr = new XMLHttpRequest();

            xhr.open('POST', base_url + 'auth/check_otp_number');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);

                        if (response) {
                            $("#otp_modal").modal("hide");
                        } else {
                            $("#otp_code").addClass("is-invalid");
                            $("#error_otp_code").removeClass("d-none");

                            $("#otp_submit").text("Submit");
                            $("#otp_submit").removeAttr("disabled");
                        }
                    } else {
                        console.error('Error:', xhr.statusText);
                    }
                }
            };
            xhr.onerror = function() {
                console.error('Request failed');
            };
            xhr.send(formData);
        })

        $("#otp_code").keydown(function() {
            $("#otp_code").removeClass("is-invalid");
            $("#error_otp_code").addClass("d-none");
        });
    })
</script>