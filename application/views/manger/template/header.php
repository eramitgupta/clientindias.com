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
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= base_url('user/index'); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('public/favicon.png') ?>" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('public/logo.png') ?>" alt="" height="35">
                    </span>
                </a>

                <a href="<?= base_url('user/index'); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('public/favicon.png') ?>" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('public/logo.png') ?>" alt="" height="35">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <a href="<?= base_url(); ?>" target="_blank"><button type="button" class="btn header-item noti-icon waves-effect">
                        <i class="fab fa-slack-hash"></i>
                    </button>
                </a>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    if (empty($loginData['photo'])) {
                    ?>
                        <i class="bx bx-user-circle" style="font-size:25px;"></i>
                    <?php } else { ?>
                        <img class="rounded-circle header-profile-user" src="<?= base_url('uploads/user/' . $loginData['photo']) ?>">
                    <?php } ?>
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">Hi, <?= ucfirst($loginData['name']) ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= base_url() . 'login/logout'; ?>">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>