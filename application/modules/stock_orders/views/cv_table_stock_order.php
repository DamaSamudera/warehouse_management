<div class="card card-transparent">
    <div class="card-header ">
        <div class="card-title">
            <a class="btn btn-complete btn-cons btn-animated from-top pg pg-plus_circle pull-right btn_action_form text-white" data-status="add" style="text-transform: capitalize;" href="<?= base_url('stock_orders/action_form/manual'); ?>"><span>Order Product</span></a>
            <!--<button type="button" class="btn btn-danger btn-cons btn-animated from-top fa fa-trash-o btn-delete-table" data-status=""><span>Delete Selected</span></button>-->
        </div>
        <div class="pull-right">
            <div class="col-xs-12">
                <input type="text" id="search-table-active" class="form-control pull-right" placeholder="Search">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-block">
        <table class="table table-hover demo-table-dynamic table-responsive-block" id="table">
            <thead>
            <tr>
                <th style="width:1%" class="text-center text-danger">
                    <button class="btn btn-link"><i class="pg-trash"></i>
                    </button>
                </th>
                <th style="width: 20%;">No Faktur</th>
                <th style="width: 15%;">Date</th>
                <th style="width: 15%;">Supplier</th>
                <th style="width: 10%;">Total Qty</th>
                <th style="width: 20%;">Total Cost</th>
                <th style="width: 15%;">Faktur Supplier</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 10%;"></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>