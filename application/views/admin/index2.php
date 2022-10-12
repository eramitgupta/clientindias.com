<?php
$title = 'Home - Dashboard';
require_once('template/head.php');
?>
<!-- Begin page -->
<div id="layout-wrapper">
    <?php require_once('template/array.php'); ?>
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
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p><?= $welcome; ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card bg-primary text-white-50">
                                    <div class="card-body">
                                        <h2 class="mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i>₹ <?= floatval($Day1[0]['SUM(price)']) ?> /-</h2>
                                        <h4 class="text-white">User Today's Income Total</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card bg-success text-white-50">
                                    <div class="card-body">
                                        <h2 class="mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i>₹ <?= floatval($Day7[0]['SUM(price)']) ?> /-</h2>
                                        <h4 class="text-white">User Last 7 Days Income Total</h4>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card bg-info text-white-50">
                                    <div class="card-body">
                                        <h2 class="mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i>₹ <?= floatval($Day30[0]['SUM(price)']) ?> /-</h2>
                                        <h4 class="text-white">User Last 30 Days Income Total</h4>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card bg-warning text-white-50">
                                    <div class="card-body">
                                        <h2 class="mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i>₹ <?= $loginData['wallet_money'] ?> /-</h2>
                                        <h4 class="text-white">Admin Today's Income Total</h4>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card bg-danger text-white-50">
                                    <div class="card-body">
                                        <h2 class="mb-4 text-white"><i class="mdi mdi-users me-3"></i><?= $userCount; ?></h2>
                                        <h4 class="text-white">Total User Count </h4>

                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center mb-3">Leader's Board</h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#today" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">TODAY'S</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#day7" role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">LAST 7 DAYS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#day30" role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">LAST 30 DAYS</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="today" role="tabpanel">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <tbody>
                                                        <?php
                                                            $user = array();
                                                            $user2 = array();
                                                            $uid = '';
                                                            $amt = 0;
                                                            foreach ($new as $rank)
                                                            {
                                                                $uid = $rank['user_id'];
                                                                $amt = $rank['price'];
                                                                if(array_key_exists($uid, $user))
                                                                {
                                                                    $val = $user[$uid];
                                                                    $amt = $amt + $val;
                                                                    $user[$uid] = $amt;
                                                                    if(array_key_exists($uid, $user2))
                                                                    {
                                                                        $user2[$uid] = $amt;
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div>
                                                                                    <img src="https://gyankamao.com/assets/Images/Profile_Images/632e87d661b69.png" alt="" class="rounded-circle avatar-sm">
                                                                                    <span style="font-weight: bold; margin: 5px;"><?= $rank['name'] ?></span>
                                                                                    ₹. <?= $user2[$uid]; ?>

                                                                                </div>
                                                                                <span class="badge bg-success">Success</span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    $user[$uid] = $amt;
                                                                    if(array_key_exists($uid, $user2))
                                                                    {}
                                                                    else
                                                                    {
                                                                        $user2[$uid] = $amt;
                                                                    }
                                                                }
                                                            }
                                                            echo '<pre>';
                                                            print_r($user);
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="day7" role="tabpanel">
                                        <p class="mb-0">
                                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                            single-origin coffee squid. Exercitation +1 labore velit, blog
                                            sartorial PBR leggings next level wes anderson artisan four loko
                                            farm-to-table craft beer twee. Qui photo booth letterpress,
                                            commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                            vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                            aesthetic magna delectus.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="day30" role="tabpanel">
                                        <p class="mb-0">
                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                            sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                            farm-to-table readymade. Messenger bag gentrify pitchfork
                                            tattooed craft beer, iphone skateboard locavore carles etsy
                                            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                            mi whatever gluten-free carles.
                                        </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php require_once('template/footer.php'); ?>

            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->



        <?php require_once('template/script.php'); ?>