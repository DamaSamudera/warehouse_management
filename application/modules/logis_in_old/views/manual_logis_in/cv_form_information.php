<div class="col-md-4 b-r b-dashed b-grey sm-b-b">
    <div class="card-header ">
        <div class="card-title">Information</div>
        <div class="clearfix"></div>
    </div>
    <div class="card-block m-t-20">
        <div class="m-t-20">
            <div class="form-group form-group-default disabled">
                <label>Reference code</label>
                <input type="text" name="code" class="form-control" value="<?= $logis_in->code; ?>"
                       readonly>
            </div>
            <div class="form-group form-group-default typehead">
                <label>From</label>
                <input type="text" name="order_id_supplier" id="store" class="form-control" value="<?= $logis_in->supplier; ?>" readonly placeholder="Type store name">
            </div>
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Approve Date</label>
                    <input type="text" name="received_at" readonly value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="Pick a date"
                           >
                </div>
            </div>
            <div class="form-group form-group-default">
                <label>Notes</label>
                <textarea class="form-control" id="name"
                          name="note"
                          placeholder="Briefly Describe your Abilities"
                          aria-invalid="false"></textarea>
            </div>
        </div>
    </div>
</div>