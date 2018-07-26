<! START HEADER -->
<div class="header ">
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
    </a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="">
        <div class="brand inline   ">
            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo"
                 data-src="<?= base_url('assets/img/logo.png'); ?>"
                 data-src-retina="<?= base_url('assets/img/logo.png'); ?>" width="125">
        </div>
        <!-- START NOTIFICATION LIST -->
        <ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">
            <li class="p-r-10 inline">
                <div class="dropdown">
                    <a href="javascript:;" id="notification-center" class="header-icon pg pg-world"
                       data-toggle="dropdown">

                    </a>
                    <!-- START Notification Dropdown -->
                    <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                        <!-- START Notification -->
                        <div class="notification-panel">
                            <!-- START Notification Body-->
                            <div class="notification-body scrollable" id="notifikasi">
                                <!-- START Notification Item-->
                                <div class="notification-item clearfix" id="no_notification">
                                    <div class="heading">
                                        <a href="#" class="text-complete pull-left">
                                            <i class="fa fa-check-circle-o m-r-10"></i>
                                            <span class="bold">No Notification Today</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- END Notification Body-->
                            <!-- START Notification Footer-->
                            <div class="notification-footer text-center">
                                <a href="#" class="">Read all notifications</a>
                                <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                    <i class="pg-refresh_new"></i>
                                </a>
                            </div>
                            <!-- START Notification Footer-->
                        </div>
                        <!-- END Notification -->
                    </div>
                    <!-- END Notification Dropdown -->
                </div>
            </li>
        </ul>
        <!-- END NOTIFICATIONS LIST -->

        <!-- DATE & TIME -->
        <div class="p-l-30 inline hidden-xs">
          <span id="date_time"></span>
          <script type="text/javascript">window.onload = date_time('date_time');</script>
        </div>
        <!-- END DATE & TIME -->

    </div>
    <div class="d-flex align-items-center">
        <!-- START Username & Storename -->
        <div class="pull-left p-r-10 font-montserrat fs-12 all-caps b-grey b-r bold hidden-md-down">
            <?= $this->session->userdata('store_name'); ?>
        </div>
        <div class="pull-left p-r-10 p-l-10 font-montserrat fs-12 hidden-md-down">
            <?= $this->session->userdata('name'); ?>
        </div>
        <!-- END Username & Storename -->
        <div class="dropdown pull-right hidden-md-down">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
              <span class="thumbnail-wrapper d32 circular inline">
                <img src="<?= base_url('assets/img/avatar.png'); ?>" alt=""
                     data-src="<?= base_url('assets/img/avatar.png'); ?>"
                     data-src-retina="<?= base_url('assets/img/avatar.png'); ?>" width="32" height="32">
              </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="#" class="dropdown-item"><i class="p-r-5 fa fa-gears"></i>Settings</a>
                <a href="#" class="dropdown-item"><i class="p-r-10 fa fa-question"></i>Help</a>
                <a href="<?= base_url('lockscreen'); ?>" class="dropdown-item"><i class="p-r-10 fa fa-lock"></i>Lock</a>
                <a href="<?= base_url('logout'); ?>" class="clearfix bg-master-lighter dropdown-item">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                </a>
            </div>
        </div>
        <!-- END User Info-->
        <a href="#" class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin d-inline-block"
           data-toggle="quickview" data-toggle-element="#quickview"></a>
    </div>
</div>
<!-- END HEADER