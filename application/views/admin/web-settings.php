<?php
require_once('template/head.php');
?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/Settings/update'); ?>">
                                    <input type="hidden" name="id" value="<?= $WebSettingsArray[0]['id'] ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Facebook </label>
                                                <input type="text" class="form-control" name="facebook" id="smtp_host" placeholder="facebook" value="<?= $WebSettingsArray[0]['facebook'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Instagram </label>
                                                <input type="text" class="form-control" name="instagram" id="smtp_host" placeholder="instagram" value="<?= $WebSettingsArray[0]['instagram'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Telegram </label>
                                                <input type="text" class="form-control" name="telegram" id="smtp_host" placeholder="telegram" value="<?= $WebSettingsArray[0]['telegram'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Linkedin </label>
                                                <input type="text" class="form-control" name="linkedin" id="smtp_host" placeholder="linkedin" value="<?= $WebSettingsArray[0]['linkedin'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Twitter </label>
                                                <input type="text" class="form-control" name="twitter" id="smtp_host" placeholder="twitter" value="<?= $WebSettingsArray[0]['twitter'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Youtube </label>
                                                <input type="text" class="form-control" name="youtube" id="smtp_host" placeholder="youtube" value="<?= $WebSettingsArray[0]['youtube'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Mobile </label>
                                                <input type="text" class="form-control" name="mobile" id="smtp_host" placeholder="mobile" value="<?= $WebSettingsArray[0]['mobile'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Email </label>
                                                <input type="text" class="form-control" name="email" id="smtp_host" placeholder="email" value="<?= $WebSettingsArray[0]['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="Address" class="form-label"> Address </label>
                                                <textarea name="address" class="form-control"><?= $WebSettingsArray[0]['address'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="Address" class="form-label"> Map </label>
                                                <textarea name="map" class="form-control"><?= $WebSettingsArray[0]['map'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> GST </label>
                                                <input type="text" class="form-control" name="gst" id="smtp_host" placeholder="gst" value="<?= $WebSettingsArray[0]['gst'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="Address" class="form-label"> Privacy Policy </label>
                                                <textarea id="summernote" name="privacy_policy" class="form-control"><?= $WebSettingsArray[0]['privacy_policy'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="Address" class="form-label"> Terms Conditions </label>
                                                <textarea id="summernote2" name="terms_conditions" class="form-control"><?= $WebSettingsArray[0]['terms_conditions'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <center><button type="submit" class="btn btn-primary w-md">Update </button></center>
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
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 350
        });
        $('#summernote2').summernote({
            tabsize: 2,
            height: 350
        });
    });
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- Begin page -->