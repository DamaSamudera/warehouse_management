<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Judul Form</h2>
        <p>Kegunaan</p>
        <?php var_dump($product_inventory); ?>
    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Sale Price 1</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='sale1' type='text'
                               value="<?= $product_inventory->sale1 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Sale Price 2</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='sale2' type='text'
                               value="<?= $product_inventory->sale2 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Sale Price 3</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='sale3' type='text'
                               value="<?= $product_inventory->sale3 ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Cost Price 1</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='cost1' type='text'
                               value="<?= $product_inventory->cost1 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Cost Price 2</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='cost2' type='text'
                               value="<?= $product_inventory->cost2 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Cost Price 3</label>
                        <input id='field-code' class='numeric form-control' name='cost3' type='text'
                               value="<?= $product_inventory->cost3 ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Cost Supplier</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='cost_supplier' type='text'
                               value="<?= $product_inventory->cost_supplier ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Cost Distributor</label>
                        <input id='field-code' data-a-sign="Rp " data-a-dec="," data-a-sep="."
                               class='autonumeric form-control' name='cost_distributor' type='text'
                               value="<?= $product_inventory->cost_distributor ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Qty 1</label>
                        <input id='field-code' class='numeric form-control' name='qty1' type='text'
                               value="<?= $product_inventory->qty1 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-group-default">
                        <label for="name">Qty 2</label>
                        <input id='field-code' class='numeric form-control' name='qty2' type='text'
                               value="<?= $product_inventory->qty2 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-group-default">
                        <label for="name">Qty 3</label>
                        <input id='field-code' class='numeric form-control' name='qty3' type='text'
                               value="<?= $product_inventory->qty3 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-group-default">
                        <label for="name">Qty 4</label>
                        <input id='field-code' class='numeric form-control' name='qty4' type='text'
                               value="<?= $product_inventory->qty4 ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-group-default">
                        <label for="name">Qty 5</label>
                        <input id='field-code' class='numeric form-control' name='qty5' type='text'
                               value="<?= $product_inventory->qty5 ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Qty Limit</label>
                        <input id='field-code' class='numeric form-control' name='qty_limit' type='text'
                               value="<?= $product_inventory->qty_limit ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Location</label>
                        <input id='field-code' class='numeric form-control' name='location' type='text'
                               value="<?= $product_inventory->location ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Is Active</label>
                        <input id="is_active" type="checkbox" name="is_active" data-init-plugin="switchery" data-size="small" data-color="primary"
                            <?= $product_inventory->is_active ?>/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Is Order</label>
                        <input id="is_order"  type="checkbox" name="is_order" data-init-plugin="switchery" data-size="small" data-color="primary"
                            <?= $product_inventory->is_order ?>/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>