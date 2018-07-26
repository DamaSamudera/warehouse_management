<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daily Sales</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="row">
        <div class="col-md-12">
            <!--<a class="btn btn-complete btn-cons" href="<?= base_url('logis_out/form_manual_shipping'); ?>">Complete</a>-->
            <div class="card card-default">
                <div class="card-header ">
                    <div class="card-title">
                        <a class="btn btn-success btn-cons btn-animated from-top fa fa-file-pdf-o" href="<?= base_url('logis_out/rekap_surat_jalan') ?>"><span>Rekap Surat Jalan</span></a>
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <input type="text" id="search-table" class="form-control pull-right"
                                   placeholder="Search">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover table-responsive-block" id="table">
                        <thead>
                        <tr>
                            <th style="width: 17%;">No Faktur</th>
                            <th style="width: 15%;">Date</th>
                            <th style="width: 15%;">Destination</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 12%;">User Input</th>
                            <th style="width: 13%;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL STICK UP  -->
<div class="modal fade stick-up" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="pg-close fs-14"></i>
                </button>
                <h5>Delete <span class="semi-bold">Information</span></h5>
                <p>Are you sure to delete data?</p>
            </div>
            <div class="modal-body">
                <form class="form-default" id="delete-one" role="form" action="delete-one">
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="hidden" id="delete-id" name="id" value="" />
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                No
                            </button>
                            <button type="button" id="confirm-yes" data-form="delete-one" class="btn btn-danger">
                                Yes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP  -->