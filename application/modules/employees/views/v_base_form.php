<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">employees</a></li>
                <li class="breadcrumb-item active">Action</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<!-- END JUMBOTRON -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="row">
        <div class="col-md-12">
            <form id="form_action" action="<?= base_url('employees/action'); ?>" method="post">
                <div id="form-action-product">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist"
                        data-init-reponsive-tabs="dropdownfx">
                        <li class="nav-item">
                            <a class="active" data-toggle="tab" href="#tab1" role="tab"><i
                                        class="fa fa-shopping-cart tab-icon"></i>
                                <span>Informasi Dasar</span></a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                            <div class="row row-same-height">
                                <?php $this->load->view('cv_form_step1'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                        <ul class="pager wizard no-style">
                            <li class="next">
                                <button class="btn btn-primary btn-cons btn-animated from-left fa fa-truck pull-right"
                                        type="button">
                                    <span>Next</span>
                                </button>
                            </li>
                            <li class="next finish hidden">
                                <button class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right"
                                        type="submit">
                                    <span>Finish</span>
                                </button>
                            </li>
                            <li class="previous first hidden">
                                <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right"
                                        type="button">
                                    <span>First</span>
                                </button>
                            </li>
                            <li class="previous">
                                <button class="btn btn-default btn-cons pull-right" type="button">
                                    <span>Previous</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>