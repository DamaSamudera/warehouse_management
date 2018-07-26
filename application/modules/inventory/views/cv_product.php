<div class="row">
    <div class="col-sm-12">
        <div class="form-group form-group-default typehead">
            <label for="name">Supplier Name</label>
            <input id='supplier' class='form-control' name='n_supplier_id' type='text' value="<?= $product->n_supplier_id ?>"
                   maxlength='45' disabled>
            <input type="hidden" name="n_product_id" value="<?= $product->id ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group form-group-default typehead">
            <label for="name">Barcode</label>
            <input id='supplier' class='form-control' name='n_supplier_id' type='text' value="<?= $product->barcode?>"
                   maxlength='45' disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group form-group-default">
            <label for="name">Name</label>
            <input id='field-code' class='numeric form-control' name='name' type='text' value="<?= $product->name ?>"
                   maxlength='45' disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group form-group-default">
            <label for="name">Description</label>
            <input id='field-code' class='numeric form-control' name='description' type='text' value="<?= $product->description ?>"
                   maxlength='45' disabled>
        </div>
    </div>
</div>