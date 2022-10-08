<?php require_once('templates/head.php'); ?>
<?php require_once('templates/nav.php'); ?>

<div class="page-title-area bg-25">
    <div class="container">
        <div class="page-title-content">
            <h2><?= $ArrayCourseData[0]['name'] ?></h2>
            <ul>
                <li>
                    <a href="<?= base_url() ?>">
                        home
                    </a>
                </li>
                <li> <a>package</a></li>
                <li> <a>details</a></li>
                <li class="active"><?= $ArrayCourseData[0]['url'] ?></li>
            </ul>
        </div>
    </div>
</div>


<section class="single-course-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-course-content">
                    <h3><?= $ArrayCourseData[0]['name'] ?></h3>
                    <center>
                        <img src="<?= base_url('uploads/category/' . $ArrayCourseData[0]['icon']) ?>" alt="Image" style="height: 300px;">
                    </center>
                </div>
                <div class="tab single-course-tab">
                    <ul class="tabs">
                        <li>
                            <a href="#">Overview</a>
                        </li>
                    </ul>
                    <div class="tab_content">
                        <div class="tabs_item">
                            <h3>Description</h3>
                            <p>
                                <?= $ArrayCourseData[0]['dsc'] ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="account-wrap">
                    <ul>
                        <li>
                            Sell Price <span class="bold"><del>₹ <?= $ArrayCourseData[0]['sellingPrice'] ?></del></span>
                        </li>
                        <li>
                            Price <span>₹ <?= $ArrayCourseData[0]['price'] ?></span>
                        </li>
                        <li>
                        Tax <span>%<?= $ArraySettings[0]['gst'] ?></span>
                        </li>
                        <li>
                            Price GST <span>₹ <?= $ArrayCourseData[0]['price'] * $ArraySettings[0]['gst'] / 100; ?></span>
                        </li>
                        <li>
                            Total: <span>₹ <?= $ArrayCourseData[0]['price'] + $ArrayCourseData[0]['price'] * $ArraySettings[0]['gst'] / 100; ?></span>
                        </li>
                    </ul>
                    <form method="post" action="<?= base_url('checkout') ?>">
                        <input type="hidden" name="price" value="<?= $ArrayCourseData[0]['price'] + $ArrayCourseData[0]['price'] * $ArraySettings[0]['gst'] / 100; ?>">
                        <input type="hidden" name="id" value="<?= $ArrayCourseData[0]['id'] ?>">

                        <?php
                        if (empty($this->session->userdata('Login_Auth'))) {
                            $url = base_url('login');
                            echo "<a href='$url' class='default-btn'>Enroll Now</a>";
                        }else{
                            if ($this->session->userdata('Login_Auth')['role'] == 'user') {
                                echo "<button type='submit' name='buyCourse' value='buy' class='default-btn'>Enroll Now</button>";
                            } else if ($this->session->userdata('Login_Auth')['role'] == 'admin') {
                                echo "<a class='default-btn'>Enroll Now</a>";
                            }
                        }
                        ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once('templates/footer.php'); ?>