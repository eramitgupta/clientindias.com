<?php
require_once('template/head.php');
?>
<link href="<?= base_url('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?= base_url('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
<!--datatable -->
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="datatable-buttons" class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>S.N</th>
                                                            <th>Course Name</th>
                                                            <th>View</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php

                                                        $x = 1;
                                                        foreach ($ArrayCourseData as $row) {
                                                        ?>
                                                            <tr id="<?= $row['CourseDataID'] ?>">
                                                                <th><?= $x ?></th>
                                                                <th><?= $row['name'] ?></th>
                                                                <td>
                                                                    <button type="button" id="<?= $row['CourseDataID'] ?>" data-bs-toggle="modal" data-bs-target=".detailsModal" class="btn btn-primary view_data">
                                                                        <i class="fas fa-eye view_data" id="<?= $row['CourseDataID'] ?>"></i>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($row['status'] == 'Show') {
                                                                        $color = 'success';
                                                                        $status = $row['status'];
                                                                    } else {
                                                                        $color = 'danger';
                                                                        $status = $row['status'];
                                                                    }
                                                                    ?>
                                                                    <a href="<?= base_url('admin/courses/status?id=' . $row['CourseDataID'] . '&status=' . $row['status']) ?>" class="btn btn-<?= $color; ?> btn-rounded waves-effect waves-light"><?= $status ?></a>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="edit/<?= $row['CourseDataID'] ?>" class="btn btn-primary">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                        <button type="button" class="btn btn-danger CourseDataDelete" id="CourseDataDelete">
                                                                            <input type="hidden" value="<?= $row['CourseDataID'] ?>" class="deletevalue">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                            $x++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div> <!-- end col -->
                                </div> <!-- end row -->

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
<script src="<?= base_url('public/js/code.js') ?>"></script>
<!-- Required datatable js -->
<script src="<?= base_url('public/') ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Datatable init js -->
<script src="<?= base_url('public/') ?>assets/js/pages/datatables.init.js"></script>