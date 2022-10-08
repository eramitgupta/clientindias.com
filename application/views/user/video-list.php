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

                    <?php
                    for ($i = 0; $i < count($arrayVideo); $i++) {
                        for ($x = 0; $x < count($arrayVideo[$i]); $x++) {
                            $id  = $arrayVideo[$i][$x]['category_id'];
                            $category = $this->db->where('id', $id)->get('tbl_category')->row_array();
                    ?>
                                <div class="col-xl-4 col-sm-6">
                                    <a id="<?= $arrayVideo[$i][$x]['id'] ?>" data-bs-toggle="modal" data-bs-target=".detailsModal" class="view_data_user">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <i class="fas fa-video" style="font-size: 100px;"></i>
                                            </center>
                                        </div>
                                        <div class="px-4 py-3 border-top">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item me-3">
                                                    <span class="badge bg-success"><?= $category['name'] ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                                </div>

                    <?php
                        }
                    }
                    ?>

                </div>

                <!-- End Page-content -->
            </div>
        </div>
    </div>
    <!-- end main content-->
</div>
<div class="modal fade bs-example-modal-xl detailsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="container mt-3 mb-3">
                <div id="dataSet"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- END layout-wrapper -->
<?php require_once('template/script.php'); ?>
<script src="<?= base_url('public/js/front-end.js') ?>"></script>