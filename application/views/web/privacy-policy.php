<?php require_once('templates/head.php'); ?>
<?php require_once('templates/nav.php'); ?>


<div class="page-title-area bg-11">
    <div class="container">
        <div class="page-title-content">
            <h2>Privacy policy</h2>
            <ul>
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
                <li class="active">Privacy policy</li>
            </ul>
        </div>
    </div>
</div>


<section class="privacy-policy-area ptb-100">
    <div class="container">
        <div class="privacy-policy-wrap">
            <div class="title">
                <h2>Privacy Policy</h2>
                <p>This policy was last updated <?=   date('F, Y', strtotime($ArraySettings[0]['date'])); ?></p>
            </div>
                 <?= $ArraySettings[0]['privacy_policy']  ?>
        </div>
</section>

<?php require_once('templates/footer.php'); ?>