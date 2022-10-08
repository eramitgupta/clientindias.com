<?php
require_once('template/head.php');
?>
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
                    <div class="col-xl-4">
                        <?php if(empty($ArrayCourseData[0]['link'])){ ?>
                        <video width="100%" height="100%" controls>
                            <source src="<?= base_url('uploads/video/'.$ArrayCourseData[0]['video']) ?>" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        </video>
                        <?php }else{ ?>
                            <div class="ratio ratio-16x9">
                            <iframe src="" allowfullscreen></iframe>
                        </div>
                        <?php } ?>


                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" id="FormData" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?= $ArrayCourseData[0]['id'] ?>">
                                    <input type="hidden" name="video" id="video" value="<?= $ArrayCourseData[0]['video'] ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Course Name </label>
                                                <select class="form-control" name="category" id="category">
                                                    <option value="">---Select---</option>
                                                    <?php foreach ($ArrayCourse as  $value) { ?>
                                                        <option value='<?= $value['id'] ?>' <?= $ArrayCourseData[0]['category_id'] == $value['id'] ? 'selected' : '' ?>><?= $value['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Video (Option)</label>
                                                <input type="file" class="form-control" name="file" id="file">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Link (Option)</label>
                                                <input type="link" class="form-control" name="link" id="link" placeholder="Link" value="<?= set_value('link'); ?>" value="<?= $ArrayCourseData[0]['link'] ?>">
                                                <?= form_error('link'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label"> Discription </label>
                                                <textarea name="dsc" id="dsc" class="form-control"><?= $ArrayCourseData[0]['dsc'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar"></div>
                                        </div>

                                    </div>
                                    <div>
                                        <center><button type="button" id="UpdateUploadCourse" name="UpdateUploadCourse" class="btn btn-primary w-md">Submit </button></center>
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
<script src="<?= base_url('public/js/code.js') ?>"></script>