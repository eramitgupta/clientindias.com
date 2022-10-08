<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('user/index'); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/video/training'); ?>" class="waves-effect">
                        <i class="bx bx-video"></i>
                        <span key="t-dashboards">Training</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/transaction/list'); ?>" class="waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-dashboards">Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/transaction/user_payment_received'); ?>" class="waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-dashboards">Received Payment</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/profile'); ?>" class="waves-effect">
                        <i class="bx bx-user-pin"></i>
                        <span key="t-dashboards">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('login/logout'); ?>" class="waves-effect">
                        <i class="bx bx-power-off"></i>
                        <span key="t-dashboards">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>