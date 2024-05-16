<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot Password?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="radio" name="collapseRadio" id="collapseRadio1" data-target="#otp_type" checked>
                    <label for="collapseRadio1" class="mr-3">OTP Type</label>

                    <input type="radio" name="collapseRadio" id="collapseRadio2" data-target="#security_question_type">
                    <label for="collapseRadio2">Security Question Type</label>
                </div>

                <!-- OTP -->
                <div class="collapse show" id="otp_type">
                    <p>Please enter your registered email to get an OTP!</p>

                    <form action="javascript:void(0)" method="post" id="otp_form">
                        <div class="form-group">
                            <label for="otp_email">Email Address</label>
                            <input type="email" id="otp_email" class="form-control" required>
                            <small class="text-danger d-none" id="error_otp_email">Email is not registered in the system!</small>
                        </div>
                        <div class="float-right mb-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="otp_submit">Request Reset</button>
                        </div>
                    </form>
                </div>

                <!-- Security Questions -->
                <div class="collapse" id="security_question_type">
                    <form method="POST" action="<?= site_url('auth/security_check') ?>">
                        <p>Please answer the security question to reset your password!</p>
                        <div class="form-group">
                            <label for="position">Username</label>
                            <input class="form-control mt-1" placeholder="Enter username" required name="username" />
                        </div>
                        <div class="form-group">
                            <label for="position">Question 1</label>
                            <select class="form-control" name="question_1">
                                <option value="1">In what city were you born?</option>
                                <option value="2">What is the name of your favorite pet?</option>
                                <option value="3">What is your mother's maiden name?</option>
                                <option value="4">What high school did you attend?</option>
                                <option value="5">What is the name of your first school?</option>
                                <option value="6">What was the make of your first car?</option>
                                <option value="7">What was your favorite food as a child?</option>
                            </select>
                            <input class="form-control mt-1" placeholder="Answer 1" required name="answer_1" />
                        </div>
                        <div class="form-group">
                            <label for="position">Question 2</label>
                            <select class="form-control" name="question_2">
                                <option value="1">In what city were you born?</option>
                                <option value="2" selected>What is the name of your favorite pet?</option>
                                <option value="3">What is your mother's maiden name?</option>
                                <option value="4">What high school did you attend?</option>
                                <option value="5">What is the name of your first school?</option>
                                <option value="6">What was the make of your first car?</option>
                                <option value="7">What was your favorite food as a child?</option>
                            </select>
                            <input class="form-control mt-1" placeholder="Answer 2" required name="answer_2" />
                        </div>
                        <div class="form-group">
                            <label for="position">Question 3</label>
                            <select class="form-control" name="question_3">
                                <option value="1">In what city were you born?</option>
                                <option value="2">What is the name of your favorite pet?</option>
                                <option value="3" selected>What is your mother's maiden name?</option>
                                <option value="4">What high school did you attend?</option>
                                <option value="5">What is the name of your first school?</option>
                                <option value="6">What was the make of your first car?</option>
                                <option value="7">What was your favorite food as a child?</option>
                            </select>
                            <input class="form-control mt-1" placeholder="Answer 3" required name="answer_3" />
                        </div>
                        <div class="float-right mb-3">
                            <input type="hidden" id="res_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Request Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= site_url() ?>assets/plugins/components/jquery/dist/jquery.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const base_url = "<?= base_url() ?>";

        document.querySelectorAll('input[type="radio"][name="collapseRadio"]').forEach(function(radio) {
            radio.addEventListener("change", function() {
                var target = document.querySelector(this.dataset.target);

                document.querySelectorAll('.collapse').forEach(function(collapse) {
                    if (collapse !== target) {
                        collapse.classList.remove('show');
                    }
                });

                target.classList.add('show');
            });
        });

        document.getElementById("otp_form").addEventListener("submit", function(event) {
            const email = document.getElementById("otp_email").value;

            $("#otp_submit").text("Please wait...");
            $("#otp_submit").attr("disabled", true);

            var formData = new FormData();

            formData.append('email', email);

            var xhr = new XMLHttpRequest();

            xhr.open('POST', base_url + 'auth/send_otp');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        
                        if (response) {
                            location.href = base_url + "client/login";
                        } else {
                            $("#otp_email").addClass("is-invalid");
                            $("#error_otp_email").removeClass("d-none");

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
        });

        $("#otp_email").keydown(function() {
            $("#otp_email").removeClass("is-invalid");
            $("#error_otp_email").addClass("d-none");
        });
    });
</script>