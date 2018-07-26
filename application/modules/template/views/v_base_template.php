<?php $this->load->view('cv_head'); ?>
    <body class="fixed-header menu-pin">
        <?php $this->load->view('cv_sidebar'); ?>
        <!-- START PAGE-CONTAINER -->
        <div class="page-container">
            <!-- START PAGE HEADER WRAPPER -->
            <?php $this->load->view('cv_header.php'); ?>
            <!-- END PAGE HEADER WRAPPER -->
            <!-- START PAGE CONTENT WRAPPER -->
            <div class="page-content-wrapper">
                <!-- START PAGE CONTENT -->
                <div class="content">
                    <?php if (!isset($view_content)): ?>
                        <!-- START JUMBOTRON -->
                        <div class="jumbotron" data-pages="parallax">
                            <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
                                <div class="inner">
                                    <!-- START BREADCRUMB -->
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Module</a></li>
                                        <li class="breadcrumb-item active">Title</li>
                                    </ol>
                                    <!-- END BREADCRUMB -->
                                </div>
                            </div>
                        </div>
                        <!-- END JUMBOTRON -->
                        <!-- START CONTAINER FLUID -->
                        <div class="container-fluid container-fixed-lg">
                            <!-- BEGIN PlACE PAGE CONTENT HERE -->
                            <!-- END PLACE PAGE CONTENT HERE -->
                        </div>
                        <!-- END CONTAINER FLUID -->
                    <?php else: ?>
                        <?php $this->load->view($view_content); ?>
                    <?php endif; ?>
                </div>
                <!-- END PAGE CONTENT -->
                <?php $this->load->view('cv_footer'); ?>
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->
    <?php $this->load->view('cv_quickview'); ?>
<?php $this->load->view('cv_tail'); ?>