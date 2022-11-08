<div class="container-fluid">
    <div class="row" style="padding:10px; background-color: #ffb607; color:white; font-weight: bold;">
        <div class="col-sm-1"></div>
        <div class="col-sm-1"><a style="color: white;" href="tel:<?= $ArraySettings[0]['mobile'] ?>"><?= $ArraySettings[0]['mobile'] ?></a></div>
        <div class="col-sm-7 TopHeaderSection"><a style="color: white;" href="mailto:<?= $ArraySettings[0]['email'] ?>"><?= $ArraySettings[0]['email'] ?></a></div>
        <div class="col-sm-2 topMi" style="text-align: right;">
            <ul>
                <a href="<?= $ArraySettings[0]['facebook'] ?>" target="_blank">
                    <i class="bx bxl-facebook-circle" style="font-size: 26px; color: white;"></i>
                </a>
                <a href="<?= $ArraySettings[0]['instagram'] ?>" target="_blank">
                    <i class="bx bxl-instagram-alt" style="font-size: 26px; color: white;"></i>
                </a>
                <a href="<?= $ArraySettings[0]['twitter'] ?>" target="_blank">
                    <i class="bx bxl-twitter" style="font-size: 26px; color: white;"></i>
                </a>
                <a href="<?= $ArraySettings[0]['youtube'] ?>" target="_blank">
                    <i class="bx bxl-youtube" style="font-size: 26px; color: white;"></i>
                </a>
            </ul>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<div class="navbar-area">
    <div class="mobile-nav">
        <a href="<?= base_url(); ?>" class="logo">
            <img src="<?= base_url('public/logo.png') ?>" class="main-logo" alt="Logo">
            <img src="<?= base_url('public/logo-white.png') ?>" class="white-logo" alt="Logo">
        </a>
    </div>
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="<?= base_url('public/logo.png') ?>" class="main-logo" alt="Logo" style="height: 50px;">
                    <img src="<?= base_url('public/logo-white.png') ?>" class="white-logo" alt="Logo" style="height: 50px;">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('about') ?>" class="nav-link">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Course Packages
                                <i class="bx bx-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php

                                foreach ($ArrayCategory as $course) {
                                ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url('package/details/' . $course['url']) ?>" class="nav-link"><?= $course['name'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('contact') ?>" class="nav-link">Contact Us</a>
                        </li>
                        <?php if (!empty($loginArray)) : ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Hi, <?= $loginArray[0]['name'] ?> <i class="bx bx-user-circle" style="font-size:25px;color: #ffb607;"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if ($loginArray[0]['status'] == 'Active') : ?>
                                        <li class="nav-item">
                                            <a href="<?= base_url($loginArray[0]['role'] . '/index') ?>" class="nav-link">Dashboard</a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() . 'login/logout'; ?>" class="nav-link">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (empty($loginArray)) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('login') ?>">
                                    <span class="loginText"> Login / Register</span>
                                    <img src="<?= base_url('public/user.png') ?>" class="loginImg" alt="" style="height: 50px; width: 70px; margin:-10px;">
                                </a>

                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </nav>
        </div>
    </div>
</div>
<div class="others-option-for-responsive">
    <div class="container">
        <div class="dot-menu">
            <div class="inner">
                <a href="<?= base_url('login') ?>">
                    <img src="<?= base_url('public/user.png') ?>" alt="" style="height: 45px; width: 70px; margin:-10px;">
                </a>
            </div>
        </div>
    </div>
</div>