<?php
$title = 'User List';
require_once('template/head.php');
?>
<link href="<?= base_url('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?= base_url('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
<!--datatable -->
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
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="datatable-buttons" class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>S.N</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Ref Code</th>
                                                        <th>Referral Code</th>
                                                        <th>Reg Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $x = 1;
                                                    foreach ($userArray as $row) {
                                                    ?>
                                                        <tr id="<?= $row['id'] ?>">
                                                            <td><?= $x ?></td>
                                                            <td><?= $row['name'] ?></td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td><?= $row['ref_code'] ?></td>
                                                            <td><?= $row['referral_code'] ?></td>
                                                            <td><?= $row['date'] ?></td>
                                                            <td>
                                                                <button type="button" id="<?= $row['id'] ?>" value="<?= $row['wallet_money'] ?>" name="<?= $row['name'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable" class="btn btn-primary user_income_view_manager">
                                                                    <i class="fas fa-eye user_income_view_manager" id="<?= $row['id'] ?>" value="<?= $row['wallet_money'] ?>" name="<?= $row['name'] ?>"></i>
                                                                </button>

                                                                <button type="button" id="<?= $row['id'] ?>" value="<?= $row['wallet_money'] ?>" name="<?= $row['name'] ?>" data-bs-toggle="modal" data-bs-target="#PayModalScrollable" class="btn btn-warning user_income_pay_manager">
                                                                    <i class="fas fa-money-check-alt user_income_pay_manager" id="<?= $row['id'] ?>" value="<?= $row['wallet_money'] ?>" name="<?= $row['name'] ?>"></i>
                                                                </button>
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


<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 id="exampleModalScrollableTitle"></h4>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="summary1" name="" data-name="" class="btn btn-primary user_income_view_manager_summary" value="1 Day">Today</button>
                        <button type="button" id="summary2" name=""  data-name="" class="btn btn-warning user_income_view_manager_summary" value="7 Day">7 Day</button>
                        <button type="button" id="summary3" name="" data-name="" class="btn btn-success user_income_view_manager_summary" value="30 Day">30 Day</button>
                    </div>
                </center>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Referral Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Course Packages</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody id="dataSet">

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- send pay -->

<div class="modal fade" id="PayModalScrollable" tabindex="-1" role="dialog" aria-labelledby="PayModalScrollableTitle" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 id="PayModalScrollableTitle"></h4>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="FormData" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount *</label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount">
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="transaction_no" class="form-label">Enter UTR/Transaction Number *</label>
                                <input type="number" class="form-control" name="transaction_no" id="transaction_no" placeholder="Last 4 Digits Only">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Payment Screenshot *</label>
                                <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>

                        <div>
                            <center><button type="button" id="PayUserSendmanager" name="PayUserSendmanager" class="btn btn-primary mt-2">Submit</button></center>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
<!-- Datatable init js -->
<script src="<?= base_url('public/') ?>assets/js/pages/datatables.init.js"></script>