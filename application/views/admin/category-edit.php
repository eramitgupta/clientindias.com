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
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img src="<?= base_url('uploads/category/') . $ArrayCategory[0]['icon'] ?>" alt="" style="height: 200px ;">
                                </center>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('admin/category/update'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" name="category_name" id="name" placeholder="Category" value="<?= $ArrayCategory[0]['name'] ?>">

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Icon</label>
                                                <input type="file" class="form-control" name="file" id="file" placeholder="image">

                                                <input type="hidden" name="oldphoto" value="<?= $ArrayCategory[0]['icon']; ?>">
                                                <input type="hidden" name="id" value="<?= $ArrayCategory[0]['id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Price</label>
                                                <input type="number" class="form-control" name="price" id="name" placeholder="price" value="<?= $ArrayCategory[0]['price']; ?>">
                                                <?= form_error('price'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Selling Price</label>
                                                <input type="number" class="form-control" name="sellingPrice" id="sellingPrice" placeholder="Selling Price" value="<?= $ArrayCategory[0]['sellingPrice']; ?>">
                                                <?= form_error('sellingPrice'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Commission</label>
                                                <input type="number" class="form-control" name="commission" id="commission" placeholder="commission" value="<?= $ArrayCategory[0]['commission']; ?>">
                                                <?= form_error('commission'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Description Line Break Add <?= htmlentities('<br>') ?></label>
                                                <textarea name="dsc"  class="form-control"><?= $ArrayCategory[0]['dsc']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <center><button type="submit" class="btn btn-primary w-md mt-3">Update </button></center>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>

                <!-- End Page-content -->
            </div>
        </div>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<?php require_once('template/script.php'); ?>