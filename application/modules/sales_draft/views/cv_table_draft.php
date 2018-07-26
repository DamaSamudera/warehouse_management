<form method="post" id="form_draft" class="form-delete" action="<?= base_url('sales_draft/delete_selected'); ?>">
    <div class="card card-default">
        <div class="card-header ">
            <div class="card-title">
                <button type="button" class="btn btn-danger btn-cons btn-animated from-top fa fa-trash-o btn-delete-table" data-status=""><span>Delete Selected</span></button>
                <a class="btn btn-complete btn-cons btn-animated from-top pg pg-plus_circle pull-right btn_action_form text-white" data-status="add" style="text-transform: capitalize;" href="<?= base_url('sales'); ?>"><span>Add New Sales</span></a>
            </div>
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table-active" class="form-control pull-right" placeholder="Search">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table class="table table-hover table-responsive-block" id="table">
                <thead>
                <tr>
                    <th style="width:1%" class="text-center text-danger">
                        <button class="btn btn-link"><i class="pg-trash"></i>
                        </button>
                    </th>
                    <th>Code</th>
                    <th>Created</th>
                    <th>Modified</th>
                    <th>Sub Total</th>
                    <th>Note</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</form>