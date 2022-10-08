<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="<?= base_url('public/') ?>assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="<?= base_url('public/') ?>assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>

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
        if(url!=""){
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

  <div class="rightbar-overlay"></div>
  <!-- JAVASCRIPT -->
  <script src="<?= base_url().'public/' ?>assets/libs/jquery/jquery.min.js"></script>
  <script src="<?= base_url().'public/' ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url().'public/' ?>assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="<?= base_url().'public/' ?>assets/libs/simplebar/simplebar.min.js"></script>
  <script src="<?= base_url().'public/' ?>assets/libs/node-waves/waves.min.js"></script>

  <script src="<?= base_url().'public/' ?>assets/js/app.js"></script>

  </body>

  </html>