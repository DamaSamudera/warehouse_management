<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<!-- START CONTAINER FLUID -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('cv_information'); ?>
        </div>
        <div class="col-lg-4 col-xl-3 col-xlg-2 m-b-10">
            <div class="row">
                <div class="col-lg-12 m-b-10">
                    <?php $this->load->view('cv_monthly_statistic'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-b-10">
                    <?php $this->load->view('cv_account_information'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9 col-xlg-6 m-b-10">
            <div class="row">
                <div class="col-md-12">
                    <?php $this->load->view('cv_order_statistic'); ?>
                </div>
            </div>
        </div>
    </div>
</div>