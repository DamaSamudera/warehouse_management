<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shipping</a></li>
                <li class="breadcrumb-item active">Action</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="card-block">
        <form action="<?= base_url('shipping/process'); ?>" method="POST" id="form_input" onsubmit="return false;">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-transparent ">
                        <!-- Status Progress -->
                        <ul class="pb m-t-10">
                            <li class="pb current"><span>1</span> Draft <i class="pg pg-arrow_right"></i></li>
                            <li><span>2</span> Completed <i class="pg pg-arrow_right"></i></li>
                            <li><span>3</span> Approved</li>
                        </ul>

                        <div class="row m-t-20">
                            <?php $this->load->view('cv_form_information'); ?>
                            <div class="col-md-8">
                                <!-- products for opname -->
                                <div class="card-header ">
                                    <div class="card-title">Products</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-block m-t-20">
                                    <?php $this->load->view('cv_form_product'); ?>

                                    <div class="table-responsive" id="cart_details">
                                        <?php $this->load->view('cv_chart_product'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>