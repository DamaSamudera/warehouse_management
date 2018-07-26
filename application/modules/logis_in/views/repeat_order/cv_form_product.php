<div class="row">
    <div class="col-md-8">
        <div class="form-group form-group-default input-group typehead">
            <div class="form-input-group">
                <label>Product Barcode / Name</label>
                <input type="text" name="product"
                       class="add_cart form-control typeahead" id="product"
                       value="" placeholder="Type code or name product">
            </div>
            <div class="input-group-addon">
                <i class="fa fa-barcode"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="pull-right">
            <div class="col-xs-12">
                <div class="btn-group m-b-5 btn-lg">
                    <button data-toggle="tooltip" type="button" data-status="stock order" class="btn btn-success process" type="submit"
                            data-original-title="Purchase Order"><i
                            class="fa fa-cart-plus"></i></button>
                    <button data-toggle="tooltip" type="button" class="btn btn-danger" onclick="window.location.reload()"
                            data-original-title="Reset"><i class="fa fa-trash-o"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>