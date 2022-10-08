<?php require_once('templates/head.php'); ?>
<?php require_once('templates/nav.php'); ?>
<style>
    .checkout-area .cart-totals h3 {
        padding: 6px;
        font-size: 20px;
    }
</style>
<img src="<?= base_url('public/pay-banner.png') ?>" class="paybanner" alt="" style="width: 100%;">

<section class="checkout-area ptb-100">
    <div class="container">
        <form id="FormData" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="order-details">
                        <div class="cart-totals">
                            <h3>Pay Using QR Code</h3>
                            <img src="<?= base_url('public/qr.jpeg') ?>" alt="">
                            <a href="<?= base_url('public/qr.jpeg') ?>" download="<?= base_url('public/qr.jpeg') ?>" style="width: 100%;" class="default-btn">Download QR Code</a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="order-details">
                        <div class="cart-totals">
                            <h3>Checkout summary</h3>
                            <ul>
                                <li>Course Package Name <span><?= $ArrayPriceCheck[0]['name'] ?></span></li>
                                <li>Course Amount <span>₹ <?= $buy['price'] ?></span></li>
                                <li>Total Amount: <span>₹ <?= $buy['price'] ?></span></li>
                                <li><b>Payment of</b> <span><b>₹ <?= $buy['price'] ?> /-</b></span></li>
                            </ul>
                        </div>
                        <div class="cart-totals">

                            <h3>Submit Payment Approval Request</h3>

                            Enter UTR/Transaction Number *
                            <input type="number" id="transaction_no" name="transaction_no" class="form-control mb-3" placeholder="Last 4 Digits Only" maxlength="4">

                            Upload Payment Screenshot *
                            <input type="file" id="file" name="file" class="form-control mb-3" placeholder="Upload Payment ScreenshotNo file chosen">

                            <span>Addition Details</span><br>
                            <a href="tel:<?= $ArraySettings[0]['mobile'] ?>"> CALL NOW <?= $ArraySettings[0]['mobile'] ?></a>

                            <input type="hidden" value="<?= $ArrayPriceCheck[0]['commission'] ?>" id="commission" name="commission">
                            <input type="hidden" value="<?= $buy['price'] ?>" id="price" name="price">
                            <input type="hidden" value="<?= $buy['id'] ?>" id="id" name="id">

                            <center>
                                <button class="default-btn mb-3" id="pay" type="button">Submit</button>
                            </center>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
<script src="<?= base_url('public/js/front-end.js') ?>"></script>
<?php require_once('templates/footer.php'); ?>