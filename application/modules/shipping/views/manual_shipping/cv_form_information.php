<div class="col-md-4 b-r b-dashed b-grey sm-b-b">
    <div class="card-header ">
        <div class="card-title">Information</div>
        <div class="clearfix"></div>
    </div>
    <div class="card-block m-t-20">
        <div class="m-t-20">
            <div class="form-group form-group-default disabled">
                <label>Reference code</label>
                <input type="text" name="code" class="form-control" value="<?= $shipping->code; ?>"
                       readonly>
            </div>
            <div class="form-group form-group-default typehead">
                <label>To</label>
                <input type="text" name="n_store_id" id="store" class="form-control" placeholder="Type store name">
            </div>
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Estimate Accepted</label>
                    <input type="text" name="estimate" class="form-control" placeholder="Pick a date"
                           id="datepicker-component2">
                </div>
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
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