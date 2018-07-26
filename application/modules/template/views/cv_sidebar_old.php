<!-- BEGIN SIDEBAR -->
<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">

    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="<?= base_url('assets/img/logo_white.png') ?>" alt="logo" class="brand" data-src="<?= base_url('assets/img/logo_white.png') ?>" data-src-retina="<?= base_url('assets/img/logo_white.png') ?>" width="78" height="22">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link hidden-sm-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <?php //$this->load->view('mv_toko'); ?>
        <?php $this->load->view('mv_admin'); ?>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBAR -->