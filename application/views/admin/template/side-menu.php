<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('admin/index'); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-image-alt"></i>
                        <span key="t-tables">Banner</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('admin/banner/add'); ?>" key="t-basic-tables">Banner Add</a></li>
                        <li><a href="<?= base_url('admin/banner/list'); ?>" key="t-data-tables">Banner List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-poll"></i>
                        <span key="t-tables">Courses</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('admin/category/add'); ?>" key="t-basic-tables">Course Add</a></li>
                        <li><a href="<?= base_url('admin/category/list'); ?>" key="t-data-tables">Course List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-video-plus"></i>
                        <span key="t-tables">Courses Upload</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('admin/courses/add'); ?>" key="t-basic-tables">Course Add</a></li>
                        <li><a href="<?= base_url('admin/courses/list'); ?>" key="t-data-tables">Course List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('admin/inquiry/list'); ?>" class="waves-effect">
                        <i class="bx bxs-conversation"></i>
                        <span class="badge rounded-pill bg-info float-end">
                            <?= $this->db->where('status', 'Pending')->count_all_results('tbl_inquiry'); ?>
                        </span>
                        <span key="t-dashboards">Inquiry</span>
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
                        <li><a href="<?= base_url('admin/user/user_income'); ?>" key="t-basic-tables">User Income</a></li>

                        <li><a href="<?= base_url('admin/transaction/list'); ?>" key="t-basic-tables">User Payment History <span class="badge rounded-pill bg-danger float-end">
                            <?= $this->db->where('status', 'Pending')->count_all_results('tbl_payment'); ?>
                        </span></a></li>

                        <li><a href="<?= base_url('admin/user/user_payment'); ?>" key="t-basic-tables">Send Admin Payment History</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-plus"></i>
                        <span key="t-tables">Authentication</span>
                    </a>
                    <ul class="sub-menu">

                        <li><a href="<?= base_url('admin/authentication/accounts-add'); ?>" key="t-basic-tables">Accounts Add</a></li>
                        <li><a href="<?= base_url('admin/authentication/accounts-list'); ?>" key="t-data-tables">Accounts List</a></li>
                        <li><a href="<?= base_url('admin/user/list'); ?>" key="t-basic-tables">User List </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-cog"></i>
                        <span key="t-tables">Settings</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('admin/settings/list'); ?>" key="t-basic-tables">Web Settings</a></li>
                        <li><a href="<?= base_url('admin/smtp/list'); ?>" key="t-basic-tables">SMTP</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>