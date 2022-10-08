<?php require_once('templates/head.php'); ?>
<?php require_once('templates/nav.php'); ?>
<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>Contact</h2>
            <ul>
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li class="active">Contact</li>
            </ul>
        </div>
    </div>
</div>


<section class="contact-info-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-contact-info">
                    <i class="bx bxl-whatsapp-square"></i>
                    <h3>WhatsApp No</h3>
                    <a href="tel:+1(514)312-5678"><?= $ArraySettings[0]['mobile'] ?></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-contact-info">
                    <i class="flaticon-pin"></i>
                    <h3>Our location</h3>
                    <a href="#"><?= $ArraySettings[0]['address'] ?></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
                <div class="single-contact-info">
                    <i class="flaticon-email"></i>
                    <h3>Email</h3>
                    <a href="mailto:<?= $ArraySettings[0]['email'] ?>"><span class="__cf_email__" data-cfemail="a5cdc0c9c9cae5c0c1d0cacb8bc6cac8"><?= $ArraySettings[0]['email'] ?></span></a>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="main-contact-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-wrap contact-pages mb-0">
                    <div class="contact-form">
                        <div class="section-title">
                            <h2>Drop us a message for any query</h2>
                            <p>For more information about our courses, get in touch <br> with eduon contacts</p>
                        </div>
                        <form class="courses-form" method="post" id="FormData">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="massages" class="form-control" id="massages" cols="30" rows="10" required data-error="Write your message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="button" id="eqFormData" class="default-btn">
                                        Send Message
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="map-area">
    <iframe src="<?= $ArraySettings[0]['map'] ?>"></iframe>

</div>
<script src="<?= base_url('public/js/front-end.js') ?>"></script>

<?php require_once('templates/footer.php'); ?>