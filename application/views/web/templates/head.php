<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/boxicons.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/odometer.min.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/dark.css">
    <link rel="stylesheet" href="<?= base_url('public/web/') ?>assets/css/responsive.css">
    <link rel="icon" type="image/png" href="<?= base_url('public/favicon.png') ?>">
    <title><?= $title ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var base_url = "<?= base_url(); ?>";
    </script>
    <style>
        #swal2-title {
            color: black !important;
        }
    </style>
    <style>
        @media only screen and (max-width:600px) {
            .sliderhome {
                height: 180px !important;
                width: 100% !important;
                margin-top: 72px !important;
            }
        }

        @media only screen and (max-width:600px) {
            .paybanner {
                /* height: 190px !important;
                width: 100% !important; */
                margin-top: 72px !important;
            }
        }

        @media only screen and (max-width:600px) {
            .loginImg {
                display: none !important;
            }
            .loginText {
                display: block !important;
            }
        }
        @media only screen and (min-device-width: 600px) and (max-device-width: 2000px) {
            .loginText {
                display: none !important;
            }
        }
        @media only screen and (max-width:600px) {
            .TopHeaderSection {
                display: none !important;
            }
            .topMi{
                margin-top: -23px;
            }
        }
    </style>
</head>

<body>
    <?php
    if (!empty($this->session->flashdata('msg')) && !empty($this->session->flashdata('icon'))) :
    ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: '<?= $this->session->flashdata('icon'); ?>',
                title: '<?= $this->session->flashdata('msg'); ?>'
            })
        </script>
    <?php endif; ?>