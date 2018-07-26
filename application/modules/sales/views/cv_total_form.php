<div class="text-center padding-10 p-b-15" style="background-color: #c8a84d;">
    <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">
        Total</h5>
    <h3 class="no-margin text-white bold"><span id="pay">0</span></h3>
</div>
<div class="row">
<div class="col-md-12 col-cart">
    <div class="card card-default">
        <div class="card card-borderless">
            <ul class="nav nav-tabs nav-tabs-simple" role="tablist"
                data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                    <a class="active" data-toggle="tab" role="tab"
                       data-target="#tab2hellowWorld" href="#">Sales Information</a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab"
                       data-target="#tab2FollowUs">Customer Information</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane slide-left active" id="tab2hellowWorld">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default input-group no-border">
                                <div class="form-input-group">
                                    <label>Sub Total</label>
                                    <input type="text" name="sub_total" value="<?= $sale->sub_total; ?>" class="form-control text-success"
                                           id="total"
                                           readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding: 0px !important;">
                            <div class="form-group form-group-default input-group">
                                <div class="form-input-group" style="padding-right: 10px;">
                                    <label>Discount</label>
                                    <input type="number" name="special_discount"
                                           class="form-control input payment"
                                           id="special_discount" value="<?= $sale->special_discount; ?>">
                                </div>
                                <div class="input-group-addon d-flex " style="padding-left: 5px !important;">
                                    %
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default input-group">
                                <div class="form-input-group">
                                    <label>Note</label>
                                    <textarea rows="5" name="note" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane slide-left" id="tab2FollowUs">
                    <div role="form">
                        <div class="form-group form-group-default input-group transparent">
                            <div class="form-input-group">
                                <label>MEMBER ID</label>
                                <input type="text" class="form-control" id="member-id">
                            </div>
                        </div>
                    </div>

                    <div id="member-form">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>