<?php
$title = 'Accounts List';
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
                                            <table id="datatable-buttons" class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>S.N</th>
                                                        <th>Role</th>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $x = 1;
                                                    foreach ($loginArray as $row) {
                                                    ?>
                                                        <tr id="<?= $row['id'] ?>">
                                                            <td><?= $x ?></td>
                                                            <td><?= ucfirst($row['role']) ?></td>
                                                            <td><?= $row['name'] ?></td>
                                                            <td><?= $row['username'] ?></td>
                                                            <td><?= $row['mobile'] ?></td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['status'] == 'Active') {
                                                                    $color = 'success';
                                                                    $status = $row['status'];
                                                                } else {
                                                                    $color = 'danger';
                                                                    $status = $row['status'];
                                                                }
                                                                ?>
                                                                <a href="<?= base_url('admin/authentication/loginStatus?id=' . $row['id'] . '&status=' . $row['status']) ?>" class="btn btn-<?= $color; ?> btn-rounded waves-effect waves-light"><?= $status ?></a>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <a href="password-change/<?= $row['id'] ?>" class="btn btn-warning">
                                                                        <i class="fas fa-key"></i>
                                                                    </a>
                                                                    <a href="accounts-edit/<?= $row['id'] ?>" class="btn btn-primary">
                                                                        <i class="fas fa-user-edit"></i>
                                                                    </a>
                                                                    <button type="button" class="btn btn-danger AccountsDelete" id="AccountsDelete">
                                                                        <input type="hidden" value="<?= $row['id'] ?>" class="deletevalue">
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

<!-- Responsive examples -->
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('public/') ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="<?= base_url('public/') ?>assets/js/pages/datatables.init.js"></script>