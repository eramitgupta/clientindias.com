<?php require_once('front-end/head.php'); ?>
<div class="account-pages my-5 pt-sm-5">
    <div class="container ">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Free Sign-Up !</h5>
                            <p>Get your free account now</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="<?= base_url() . 'public/' ?>assets/images/profile-img.png" style="height: 110px !important;" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card-body pt-0">
                <div class="p-2">

                    <form class="form-horizontal" method="POST" id="FormData">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6 mb-3">
                                <label for="referral_code" id="availability-status" class="form-label">Referral Code </label>
                                <img src="<?= base_url('public/ajax.gif'); ?>" id="loaderIcon" style="height: 18px; display:none" />
                                <!-- check user -->
                                <input type="text" class="form-control" id="referral_code" name="referral_code" placeholder="Referral Code" onkeyup="checkAvailability()">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-6 mb-3">
                                <label for="full_names" class="form-label">Full Names</label>
                                <input type="text" class="form-control" id="full_names" name="full_names" placeholder="Full Names">
                            </div>

                            <div class="col-xs-12 col-sm-6 col-lg-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-6 mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">

                            </div>

                            <div class="col-xs-12 col-sm-6 col-lg-6 mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control" placeholder="" name="password" id="password" aria-label="Password" aria-describedby="password-addon" onKeyUp="checkPasswordStrength();">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 col-lg-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="cpassword" class="form-control" placeholder="" name="cpassword" id="cpassword" aria-label="cpassword" aria-describedby="password-addon">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>

                            </div>
                            <div id="password-strength-status"></div>
                            <div id="password-status"></div>

                            <div class="col-auto mt-3" style="margin-left: auto; margin-right: auto;">
                                <button class="btn btn-primary waves-effect waves-light" id="signupUser" name="signupUser" type="button">Submit</button>

                                <a href="<?= base_url('login') ?>" class="btn btn-secondary waves-effect waves-light" type="button">Already have an account ? Login</a>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="<?= base_url('login/forgot-password') ?>" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    if (empty($this->input->get('refer'))) {
        $refer = "CI5666";
    } else {
        $refer =  $this->input->get('refer');
    }
    ?>
    <script>
        document.getElementById("referral_code").value = "<?= $refer ?>";
    </script>
    <?php require_once('front-end/footer.php'); ?>