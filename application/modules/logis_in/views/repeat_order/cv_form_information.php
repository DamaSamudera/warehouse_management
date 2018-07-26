<div class="col-md-4 b-r b-dashed b-grey sm-b-b">
    <div class="card-header ">
        <div class="card-title">Data Order</div>
        <div class="clearfix"></div>
    </div>
    <div class="card-block m-t-20">
        <div class="m-t-20">
            <div class="form-group form-group-default">
                <label>No Faktur</label>
                <input type="text" name="code" class="text-black form-control" value="<?= $logis_in->code; ?>" readonly>
            </div>
            <div class="form-group form-group-default typehead required">
                <label>Supplier</label>
                <input type="text" name="supplier_id" id="supplier" class="form-control typehead" placeholder="Type supplier name" required>
            </div>
            <div class="form-group form-group-default required">
                <label>Faktur Supplier</label>
                <textarea class="form-control" id="name"
                          name="faktur_supplier"
                          placeholder="No Faktur Supplier"
                          aria-invalid="false" required></textarea>
            </div>
            <div class="form-group form-group-default">
                <label>Notes</label>
                <textarea class="form-control" id="name"
                          name="description"
                          placeholder="Catatan Order"
                          aria-invalid="false"></textarea>
            </div>
        </div>
    </div>
</div>