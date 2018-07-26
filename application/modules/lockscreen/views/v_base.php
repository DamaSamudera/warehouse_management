<!-- START PAGE-CONTAINER -->
<div class="lock-container full-height">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="full-height sm-p-t-50 align-items-center d-md-flex">
        <div class="row full-width">
            <div class="col-md-6">
                <!-- START Lock Screen User Info -->
                <div class="d-flex justify-content-start align-items-center">
                    <div class="">
                        <div class="thumbnail-wrapper circular d48 m-r-10 ">
                            <img width="43" height="43" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                        </div>
                    </div>
                    <div class="">
                        <h5 class="logged hint-text no-margin">
                            Logged in as
                        </h5>
                        <h2 class="name no-margin"><?= $this->session->userdata('code') . ' | ' . $this->session->userdata('name'); ?></h2>
                    </div>
                </div>
                <!-- END Lock Screen User Info -->
            </div>
            <div class="col-md-6">
                <!-- START Lock Screen Form -->
                <form id="form-lock" role="form" action="<?= base_url('lockscreen/proses'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START Form Control -->
                            <div class="form-group form-group-default sm-m-t-30">
                                <label>Credentials</label>
                                <div class="controls">
                                    <input type="password" name="password" placeholder="Password to unlock" class="form-control" required>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-cons m-t-2 col-md-12" type="submit"><?= $this->lang->line('login_f_button'); ?></button>
                            <!-- END Form Control -->
                        </div>
                    </div>
                    <!-- START Lock Screen Notification Icons-->
                    <div class="row">
                        <div class="col-md-12 sm-p-l-25">
                        </div>
                    </div>
                    <!-- END Lock Screen Notification Icons-->
                </form>
                <!-- END Lock Screen Form -->
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE-CONTAINER -->