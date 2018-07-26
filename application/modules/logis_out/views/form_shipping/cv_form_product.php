<style>
    .choose_file {
        position: relative;
        display: inline-block;   
        font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
        color: #7f7f7f;
        margin-top: 2px;
        background: white
    }
    .choose_file input[type="file"]{
        -webkit-appearance:none; 
        position:absolute;
        top:0;
        left:0;
        opacity:0;
        width: 100%;
        height: 100%;
    }
</style>

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
            <div class="col-md-12">
                <div class="choose_file">
                    <button type="button" class="btn btn-default" style="width: 125px;">Choose PDT</button>
                    <input name="file_pdt" type="file" id="filePDT" />
                </div>
            </div>
        </div>
    </div>
</div>