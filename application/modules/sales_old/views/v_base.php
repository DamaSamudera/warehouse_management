<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sales</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-transparent">
                <!-- <div class="card-header ">
                    <div class="clearfix"></div>
                </div> -->
                <div class="card-block">
                    <form action="<?= base_url('sales/process'); ?>" method="POST" id="form_input" onsubmit="return false;">
                        <div class="row">
                            <!-- Cart List -->
                            <div class="col-lg-9">
                                <?php $this->load->view('cv_cart_form'); ?>
                            </div>
                            <!-- Bill -->
                            <div class="col-md-3">
                                <?php $this->load->view('cv_total_form'); ?>
                                <?php $this->load->view('cv_payment_form'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>