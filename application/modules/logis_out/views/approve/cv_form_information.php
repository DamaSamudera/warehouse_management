<div class="col-md-4 b-r b-dashed b-grey sm-b-b">
    <div class="card-header ">
        <div class="card-title">Data Order</div>
        <div class="clearfix"></div>
    </div>
    <div class="card-block m-t-20">
        <div class="m-t-20">
            <div class="form-group form-group-default">
                <label>No Faktur</label>
                <input type="text" name="code" class="text-black form-control" value="<?= $logis_out->code; ?>" readonly>
            </div>
            <div class="form-group form-group-default typehead">
                <label>From</label>
                <input type="text" name="destination" id="store" class="form-control text-black" value="<?= $logis_out->from_name; ?>" placeholder="Type store name" readonly>
            </div>
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Estimate Accepted</label>
                    <input type="text" name="estimate" class="form-control text-black" placeholder="Pick a date"
                           id="datepicker-component2" value="<?= date('Y-m-d');?>">
                </div>
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
            <div class="form-group form-group-default">
                <label>Notes</label>
                <textarea class="form-control" id="name"
                          name="note"
                          placeholder="Note"
                          aria-invalid="false"></textarea>
            </div>
        </div>
    </div>
</div>