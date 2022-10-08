<?php

require_once('template/head.php');
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php require_once('template/header.php'); ?>
    <!-- ========== Left Sidebar Start ========== -->
    <?php require_once('template/side-menu.php'); ?>
    <!-- Left Sidebar End -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?= $title ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?php
                // echo "<pre>";
                // print_r($loginData);
                $info = $loginData['user_info'];
                ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="<?= base_url('user/profile/update') ?>" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $loginData['id'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="affiliatelink" class="form-label">Affiliate Link</label>
                                                <input type="text" value="<?= base_url('sign-up?refer=') . $loginData['ref_code'] ?>" class="form-control" name="affiliatelink" id="affiliatelink" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <button type="button" onclick="linkCopy()" class="btn btn-info w-md mt-4"> <i class="bx bx-copy"></i> Link Copy </button>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="referralcode" class="form-label">My Refer Code</label>
                                                <input type="text" value="<?= $loginData['ref_code'] ?>" class="form-control" name="referralcode" id="referralcode" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <?php
                                                $date = new DateTime($loginData['date']);
                                                ?>
                                                <label for="registrationdate" class="form-label">Registration date</label>
                                                <input type="date" value="<?= $date->format('Y-m-d'); ?>" class="form-control" name="registrationdate" id="registrationdate" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name</label>
                                                <input type="text" value="<?= $loginData['name'] ?>" class="form-control" name="name" id="fullname" placeholder="">
                                                <?= form_error('name'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" value="<?= $loginData['email'] ?>" class="form-control" name="email" id="email" placeholder="">
                                                <?= form_error('email'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile</label>
                                                <input type="text" value="<?= $loginData['mobile'] ?>" class="form-control" name="mobile" id="mobile" placeholder="">
                                                <?= form_error('mobile'); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="file" class="form-label">Profile photo</label>
                                                <input type="file" class="form-control" name="file" id="file" placeholder="">
                                                <input type="hidden" value="<?= $loginData['photo'] ?>" id="oldphoto" name="oldphoto">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="upi" class="form-label">UPI ID</label>
                                                <input type="text" value="<?= json_decode($info)->upi ?>" class="form-control" name="upi" id="upi" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="aadharcard" class="form-label">Aadhar card</label>
                                                <input type="text" value="<?= json_decode($info)->aadharcard ?>" class="form-control" name="aadharcard" id="aadharcard" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="pancard " class="form-label">Pan card</label>
                                                <input type="text" value="<?= json_decode($info)->pancard ?>" class="form-control" name="pancard" id="pancard " placeholder="">
                                            </div>
                                        </div>
                                        <h4 class="mt-3 mb-5">Account Details</h4>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="accountholdername" class="form-label">Account Holder Name</label>
                                                <input type="text" value="<?= json_decode($info)->accountholdername ?>" class="form-control" name="accountholdername" id="accountholdername" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="bankname" class="form-label">Bank Name</label>
                                                <input type="text" value="<?= json_decode($info)->bankname ?>" class="form-control" name="bankname" id="bankname" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="accountnumber" class="form-label">Account Number</label>
                                                <input type="text" value="<?= json_decode($info)->accountnumber ?>" class="form-control" name="accountnumber" id="accountnumber" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ifsccode" class="form-label">IFSC Code</label>
                                                <input type="text" value="<?= json_decode($info)->ifsccode ?>" class="form-control" name="ifsccode" id="ifsccode" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="accounttype" class="form-label">Account Type</label>
                                                <input type="text" value="<?= json_decode($info)->accounttype ?>" class="form-control" name="accounttype" id="accounttype" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="branchdetail" class="form-label">Branch Detail</label>
                                                <input type="text" class="form-control" value="<?= json_decode($info)->branchdetail ?>" name="branchdetail" id="branchdetail" placeholder="">
                                            </div>
                                        </div>

                                        <div>
                                            <center><button type="submit" id="PasswordUpdate" class="btn btn-primary w-md mt-3">Profile Update</button></center>
                                        </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

                <!-- End Page-content -->
            </div>
        </div>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<?php require_once('template/script.php'); ?>
<script src="<?= base_url('public/js/front-end.js') ?>"></script>