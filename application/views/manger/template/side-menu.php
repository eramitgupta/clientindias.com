<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('manger/index'); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('manger/category/list'); ?>" class="waves-effect">
                        <i class="bx bx-poll"></i>
                        <span key="t-tables">Courses List</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-money"></i>
                        <span class="badge rounded-pill bg-danger float-end">
                            <?= $this->db->where('status', 'Pending')->count_all_results('tbl_payment'); ?>
                        </span>
                        <span key="t-tables">Collection </span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('manger/user/user_income'); ?>" key="t-basic-tables">User Income</a></li>
                        <li><a href="<?= base_url('manger/transaction/list'); ?>" key="t-basic-tables">User Payment History  <span class="badge rounded-pill bg-danger float-end">
                                    <?= $this->db->where('status', 'Pending')->count_all_results('tbl_payment'); ?>
                                </span></a>
                        </li>
                        <li><a href="<?= base_url('manger/user/user_payment'); ?>" key="t-basic-tables">Send Admin Payment History</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('manger/inquiry/list'); ?>" class="waves-effect">
                        <i class="bx bxs-conversation"></i>
                        <span key="t-dashboards">Inquiry</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>