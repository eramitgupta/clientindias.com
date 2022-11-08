<footer class="footer-top-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget">
                    <h3>Find Us</h3>
                    <ul class="address">
                        <li class="location">
                            <i class="bx bxs-location-plus"></i>
                            <?= $ArraySettings[0]['address'] ?>
                        </li>
                        <li>
                            <i class="bx bxs-envelope"></i>
                            <a href="mailto:<?= $ArraySettings[0]['email'] ?>"><?= $ArraySettings[0]['email'] ?></span></a>
                        </li>
                        <li>
                            <i class="bx bxl-whatsapp-square" style="font-size: 20px !important;"></i>
                            <a href="tel:<?= $ArraySettings[0]['mobile'] ?>">WhatsApp No <br><?= $ArraySettings[0]['mobile'] ?></a>
                        </li>
                        <h4 class="mb-3">Social Media</h4>
                        <a href="<?= $ArraySettings[0]['facebook'] ?>" target="_blank">
                            <i class="bx bxl-facebook-circle" style="font-size: 26px;"></i>
                        </a>
                        <a href="<?= $ArraySettings[0]['instagram'] ?>" target="_blank">
                            <i class="bx bxl-instagram-alt" style="font-size: 26px;"></i>
                        </a>
                        <a href="<?= $ArraySettings[0]['twitter'] ?>" target="_blank">
                            <i class="bx bxl-twitter" style="font-size: 26px;"></i>
                        </a>
                        <a href="<?= $ArraySettings[0]['youtube'] ?>" target="_blank">
                            <i class="bx bxl-youtube" style="font-size: 26px;"></i>
                        </a>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget">
                    <h3>Useful links</h3>
                    <ul class="link">

                        <li>
                            <a href="<?= base_url('about'); ?>">About us</a>
                        </li>
                        <li>
                            <a href="">Course</a>
                        </li>
                        <li>
                            <a href="<?= base_url('contact'); ?>">Contact Us</a>
                        </li>
                        <li>
                            <a href="<?= base_url('privacy-policy'); ?>">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="<?= base_url('terms-conditions'); ?>"> Terms & Conditions</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget">
                    <h3>Top online courses</h3>
                    <ul class="link">
                        <?php
                        $x = 0;
                        foreach ($ArrayCategory as $course) {
                            if ($x == 5) {
                                break;
                            }
                        ?>
                            <li>
                                <a href="<?= base_url('package/details/'.$course['url']) ?>"><?= $course['name'] ?></a>
                            </li>
                        <?php
                            $x++;
                        } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
<footer class="footer-bottom-area">
    <div class="container">
        <div class="copyright-wrap">
            <p>
                <i class="bx bx-copyright"></i> Clientindias <a href="https://www.swasoftech.com/" target="blank">Design & Develop By Swasoftech Pvt. Ltd.</a>
            </p>
        </div>
    </div>
</footer>
<!-- <div class="go-top">
    <i class='bx bx-chevrons-up'></i>
    <i class='bx bx-chevrons-up'></i>
</div> -->

<script>
    function sAlert(icon, title, url = '') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        if (url != "") {
            Toast.fire({
                icon: icon,
                title: title,
            }).then((Toast) => {
                if (Toast) {
                    window.location.href = url;
                }
            });
        } else {
            Toast.fire({
                icon: icon,
                title: title,
            })
        }
    }
</script>
<script src="<?= base_url('public/web/') ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/meanmenu.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/wow.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/nice-select.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/magnific-popup.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/jarallax.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/appear.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/odometer.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/form-validator.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/contact-form-script.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/ajaxchimp.min.js"></script>
<script src="<?= base_url('public/web/') ?>assets/js/custom.js"></script>
<script>
    if (localStorage.getItem('eduon_theme') === 'theme-dark') {
        document.getElementsByClassName('meanmenu-reveal')[0].style.color = "white";
    }else{
        document.getElementsByClassName('meanmenu-reveal')[0].style.color = "black";
    }
</script>
</body>

</html>