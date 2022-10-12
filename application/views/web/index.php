<?php require_once('templates/head.php'); ?>
<?php require_once('templates/nav.php'); ?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $x = 1;
        foreach ($BannerArray as $Banner) {
        ?>
            <div class="carousel-item <?= $x == 1 ? 'active' : '' ?>">
                <img src="<?= base_url('uploads/banner/' . $Banner['banner']) ?>" class="d-block w-100 sliderhome" style="height: 500px;">
            </div>
        <?php $x++;
        } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="partner-area f5f6fa-bg-color " style="padding: 40px;">
    <div class="container">
        <div class="partner-wrap owl-theme owl-carousel">
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/1.png') ?>" alt="Image">
                </a>
            </div>
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/2.png') ?>" alt="Image">
                </a>
            </div>
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/3.png') ?>" alt="Image">
                </a>
            </div>
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/4.png') ?>" alt="Image">
                </a>
            </div>
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/5.png') ?>" alt="Image">
                </a>
            </div>
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/6.png') ?>" alt="Image">
                </a>
            </div>
            <div class="partner-item">
                <a href="#">
                    <img src="<?= base_url('public/icon/7.png') ?>" alt="Image">
                </a>
            </div>


        </div>
    </div>
</div>
<section class="achieve-area f5f6fa-bg-color pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>Achieve your dreams</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-achieve">
                    <div class="achieve-shape shape-1">
                        <img src="<?= base_url('public/web/') ?>assets/img/achieve-shape/achieve-shape-1.png" alt="Image">
                        <i class="flaticon-skills"></i>
                    </div>
                    <h3>Learn the latest skills</h3>
                    <p>Through our course you can learn best business skills to move forward in your life.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-achieve">
                    <div class="achieve-shape shape-2">
                        <img src="<?= base_url('public/web/') ?>assets/img/achieve-shape/achieve-shape-2.png" alt="Image">
                        <i class="flaticon-career"></i>
                    </div>
                    <h3>Get ready for a career</h3>
                    <p>Bought our courses and learned from them and move ahead in life.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-achieve">
                    <div class="achieve-shape shape-3">
                        <img src="<?= base_url('public/web/') ?>assets/img/achieve-shape/achieve-shape-3.png" alt="Image">
                        <i class="flaticon-certificate"></i>
                    </div>
                    <h3>Earn a certificate or degree</h3>
                    <p>If you take out maximum sales for our company in a month, then our company will give you a Earning Certificate
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-achieve">
                    <div class="achieve-shape shape-4">
                        <img src="<?= base_url('public/web/') ?>assets/img/achieve-shape/achieve-shape-4.png" alt="Image">
                        <i class="flaticon-group"></i>
                    </div>
                    <h3>Upskill your organization</h3>
                    <p>We are sure with our courses. You can easily learn and improve your skills.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="courses-area">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Client Indias</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-course" style="border-radius: 10px;">
                    <center>
                        <br>
                        <a>
                            <img src="<?= base_url('public/choose/tags.png') ?>" alt="Image" style="height: 100px;">
                        </a>
                    </center>
                    <div style="padding: 20px;">
                        <h4 class="text-center">Affordable Price</h4>
                        <p>We are providing valuable courses at the most affordable price, So that every child is not disappointed because of the price and he can learn from here.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-course" style="border-radius: 10px;">
                    <center>
                        <br>
                        <a>
                            <img src="<?= base_url('public/choose/online-course.png') ?>" alt="Image" style="height: 100px;">
                        </a>
                    </center>
                    <div style="padding: 20px;">
                        <h4 class="text-center">Valueable Courses</h4>
                        <p>Client India is providing you the course which can make you a successful person in the coming time.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-course" style="border-radius: 10px;">
                    <center>
                        <br>
                        <a>
                            <img src="<?= base_url('public/choose/customer-service.png') ?>" alt="Image" style="height: 100px;">
                        </a>
                    </center>
                    <div style="padding: 20px;">
                        <h4 class="text-center">24/7 Support</h4>
                        <p>We are providing best support for client India family. It's open every day and every time. You can text us we will respond with in 30 minutes 100% Success Rate.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-course" style="border-radius: 10px;">
                    <center>
                        <br>
                        <a>
                            <img src="<?= base_url('public/choose/success.png') ?>" alt="Image" style="height: 100px;">
                        </a>
                    </center>
                    <div style="padding: 20px;">
                        <h4 class="text-center">100% Success Rate</h4>
                        <p>All they students who have learned though our courses, they earn high amount today though client India.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="courses-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>Popular Courses</h2>
        </div>
        <div class="row">
            <?php
            foreach ($ArrayCategory as $course) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-course">
                        <a href="<?= base_url('package/details/' . $course['url']) ?>">
                            <img src="<?= base_url('uploads/category/' . $course['icon']) ?>" alt="Image" style="height: 250px;">
                        </a>
                        <div class="course-content">
                            <span class="price">₹<?= $course['price'] ?></span>
                            <br>
                            <a href="<?= base_url('package/details/' . $course['url']) ?>">
                                <h3><?= $course['name'] ?></h3>
                            </a>
                            <ul class="rating">
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <i class="bx bxs-star"></i>
                                </li>
                                <li>
                                    <span>5.0</span>

                                </li>
                            </ul>
                            <p><?= $course['dsc'] ?></p>
                            <ul class="lessons">
                                <a href="<?= base_url('package/details/' . $course['url']) ?>" class="default-btn">
                                    <li>Enroll Now &rarr; </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="counter-area ebeef5-bg-color pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter">
                    <div class="counter-shape shape-1">
                        <img src="<?= base_url('public/web/') ?>assets/img/counter-shape/counter-shape-1.png" alt="Image">
                        <h2>
                            <span class="odometer" data-count="150">00</span>
                            <span class="target">+</span>
                        </h2>
                    </div>
                    <p>Trainings</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter">
                    <div class="counter-shape shape-2">
                        <img src="<?= base_url('public/web/') ?>assets/img/counter-shape/counter-shape-2.png" alt="Image">
                        <h2>
                            <span class="odometer" data-count="50">00</span>
                            <span class="target">k</span>

                        </h2>
                    </div>
                    <p>Students Enrolled</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter">
                    <div class="counter-shape shape-3">
                        <img src="<?= base_url('public/web/') ?>assets/img/counter-shape/counter-shape-3.png" alt="Image">
                        <h2>
                            <span class="odometer" data-count="375">00</span>
                            <span class="target">+</span>

                        </h2>
                    </div>
                    <p>Live Trainings</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-counter">
                    <div class="counter-shape shape-4">
                        <img src="<?= base_url('public/web/') ?>assets/img/counter-shape/counter-shape-4.png" alt="Image">
                        <h2>
                            <span class="odometer" data-count="10">00</span>
                            <span class="target">+</span>

                        </h2>
                    </div>
                    <p>Complete courses</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="enroll-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="enroll-wrap">
                    <form class="courses-form" method="post" id="FormData">
                        <h3>Fill Form To Contact Us</h3>
                        <span>Please fill out the form to share your queries, feedback, or concerns regarding clientindias or our courses</span>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="massages" id="massages" class="form-control" placeholder="Massages"></textarea>
                        </div>

                        <button type="button" id="eqFormData" class="default-btn">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="enroll-img">
                    <img src="<?= base_url('public/web/') ?>assets/img/enroll-img.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
</section>



<div class="video-area f5f6fa-bg-color">
    <div class="container">
        <div class="video-wrap">
            <img src="<?= base_url('public/web/') ?>assets/img/video-img.jpg" alt="Image">
            <div class="video-content">
                <a href="https://www.youtube.com/watch?v=iLS_YP1uEK8" class="video-btn popup-youtube">
                    <i class="flaticon-play-button"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<section class="feedback-area f5f6fa-bg-color ptb-100">
    <div class="container">
        <div class="section-title">
            <span>Feedback Client India</span>
            <h2>What students say</h2>
        </div>
        <div class="feedback-slider owl-theme owl-carousel">
            <div class="feedback-item">
                <i class="flaticon-quotation"></i>
                <p>Client India is changing the life of thousands of Indians. Who are becoming entrepreneur today through Client India</p>
                <div class="feedback-title">
                    <img src="<?= base_url('public/web/') ?>assets/img/feedback-img/feedback-img-1.jpg" alt="Image">
                    <h3>Jessica Molony</h3>
                    <span>Designer</span>
                </div>
            </div>
            <div class="feedback-item">
                <i class="flaticon-quotation"></i>
                <p>Client India is a real company which is teaching us to do business that too in very low price</p>
                <div class="feedback-title">
                    <img src="<?= base_url('public/web/') ?>assets/img/feedback-img/feedback-img-2.jpg" alt="Image">
                    <h3>Juhon Dew</h3>
                    <span>Marketer </span>
                </div>
            </div>
            <div class="feedback-item">
                <i class="flaticon-quotation"></i>
                <p>Yes we are earning money by learning from Client India and we can also believe on it. Because I have earned lakhs of rupees from this</p>
                <div class="feedback-title">
                    <img src="<?= base_url('public/web/') ?>assets/img/feedback-img/feedback-img-3.jpg" alt="Image">
                    <h3>Kilva Smith</h3>
                    <span>Designer</span>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('public/js/front-end.js') ?>"></script>
<?php require_once('templates/footer.php'); ?>