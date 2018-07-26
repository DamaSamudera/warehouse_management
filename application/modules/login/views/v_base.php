<div class="login-wrapper ">

    <?php $this->load->view('cv_login_slide'); ?>

    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" width="150"
                 data-src-retina="assets/img/logo_2x.png">
            <p class="p-t-35"><?= $this->lang->line('login_title'); ?></p>

            <?php $this->load->view('cv_form_login'); ?>
            <?php $this->load->view('cv_form_help'); ?>
            <?php $this->load->view('cv_copyright_info'); ?>

        </div>
    </div>
    <!-- END Login Right Container-->
</div>