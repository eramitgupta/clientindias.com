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

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/banner/banner_edit'); ?>">
                                    <div class="row">
                                        <img src="<?= base_url('uploads/banner/'.$BannerArray[0]['banner']) ?>" alt="" style="height: 100px; width: auto;"
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Image </label>
                                                <input type="file" class="form-control" name="file" id="file" placeholder="Image">
                                                <input type="hidden" name="oldphoto" value="<?= $BannerArray[0]['banner']; ?>">
                                                <input type="hidden" name="id" value="<?= $BannerArray[0]['id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Link </label>
                                                <input type="link" class="form-control" name="affiliatelink" id="affiliatelink" placeholder=" Link" value="<?= $BannerArray[0]['link']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <center><button type="submit" class="btn btn-primary w-md mb-5">Update </button></center>
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