<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Stock OpName</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">
                            <a class="btn btn-complete btn-cons btn-animated from-top pg pg-plus_circle pull-right btn_action_form text-white" data-status="add" style="text-transform: capitalize;" href="<?= base_url('stock_on/action_form'); ?>"><span>Add New Stock Op Name</span></a>
                            <button type="button" class="btn btn-danger btn-cons btn-animated from-top fa fa-trash-o btn-delete-table" data-status=""><span>Delete Selected</span></button>
                        </div>
                        <div class="pull-right">
                            <div class="col-xs-12">
                                <input type="text" id="search-table-active" class="form-control pull-right" placeholder="Search">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Reference#</th>
                                <th style="width: 10%;">Date</th>
                                <th style="width: 10%;">Completed at</th>
                                <th style="width: 15%;">Store</th>
                                <th style="width: 25%;">Notes</th>
                                <th style="width: 10%;">Status</th>
                                <th style="width: 10%;">User</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="v-align-middle">
                                    <p>OST/CDG-0090/120380</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>29-02-1092</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>29-02-1080</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>Jatinangor FNS</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>Notes go here</p>
                                </td>
                                <td class="v-align-middle">
                                    <span class="label label-success">Draft</span>
                                </td>
                                <td class="v-align-middle">
                                    <p>Admin</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
                <form class="form-default" id="delete-one" role="form" action="<?= base_url('product/delete_single')?>">
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