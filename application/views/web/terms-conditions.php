<?php require_once('templates/head.php'); ?>
<?php require_once('templates/nav.php'); ?>

<div class="page-title-area bg-12">
    <div class="container">
        <div class="page-title-content">
            <h2>Terms & conditions</h2>
            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Home
                    </a>
                </li>
                <li class="active">Terms & conditions</li>
            </ul>
        </div>
    </div>
</div>

<section class="terms-conditions-area ptb-100">
    <div class="container">
        <div class="terms-conditions-wrap">
            <div class="title">
                <span>Information & notices</span>
                <h2>terms & conditions</h2>
            </div>
            <?= $ArraySettings[0]['terms_conditions']  ?>
        </div>
</section>

<?php require_once('templates/footer.php'); ?>