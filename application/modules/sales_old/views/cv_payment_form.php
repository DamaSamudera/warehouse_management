<div class="col-md-12 col-cart">
    <div class="card card-default">
        <div class="card-block">
            <h6>Pembayaran</h6>
            <div class="form-group-attached">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default form-group-default-selectFx">
                            <label>Jenis</label>
                            <select name="payment_type" id="payment_type"
                                    class="cs-select cs-skin-slide cs-transparent form-control"
                                    data-init-plugin="cs-select">
                                <option value="1">&#xf0d6 Cash</option>
                                <option value="2">&#xf09d Card</option> <!-- &#xf1f1 -->
                                <option value="3">&#xf09d Debit</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label>Nominal</label>
                            <input type="text" id="cash" data-a-sign="Rp " data-a-dec=","
                                   data-a-sep="." class="autonumeric payment form-control" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center m-t-10">
                <h8><p class="small hint-text font-montserrat no-margin">Kembalian</p>
                </h8>
                <h4 class="no-margin text-danger bold" id="change">Rp. 0</h4>
            </div>

            <hr>
            <div class="text-center">
                <button class="process btn btn-block btn-success btn-process btn-lg bold process"
                        value="complete" name="status" id="complete" data-status="complete"><h5>
                        <span>PROCESS</span></h5></button>
            </div>
        </div>
    </div>
</div>