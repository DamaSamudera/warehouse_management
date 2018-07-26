<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Informasi Product</h2>
        <p>data mengenai info product yang akan didistribusikan ke seluruh store / gudang. digunakan sebagai data
            master</p>
        <?php var_dump($product); ?>
    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default disabled">
                        <label for="name">Barcode</label>
                        <input id='field-code' class='numeric form-control' name='barcode' type='text' value="<?= $product->barcode ?>"
                               maxlength='45' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default typehead">
                        <label for="name">Supplier Name</label>
                        <input id='supplier' class='form-control' name='n_supplier_id' type='text' value="<?= $product->n_supplier_id ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Name</label>
                        <input id='field-code' class='numeric form-control' name='name' type='text' value="<?= $product->name ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Description</label>
                        <input id='field-code' class='numeric form-control' name='description' type='text' value="<?= $product->description ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Is Active</label>
                        <input type="checkbox" name="is_active" data-init-plugin="switchery" data-size="small" data-color="primary"
                               <?= $product->is_active ?>/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Is Order</label>
                        <input type="checkbox" name="is_order" data-init-plugin="switchery" data-size="small" data-color="primary"
                               <?= $product->is_order ?>/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Is Stock Tracking</label>
                        <input type="checkbox" name="is_stock_tracking" data-init-plugin="switchery" data-size="small" data-color="primary"
                               <?= $product->is_stock_tracking ?>/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>