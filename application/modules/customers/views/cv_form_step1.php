<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Action Customer</h2>
        <p>form untuk membantu mengelola informasi customer yang membeli barang</p>

    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Customer Code</label>
                        <input id='field-code' class='text-black form-control' name='code' type='text'
                               value="<?= $customer->code ?>"
                               maxlength='45' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Name</label>
                        <input id='field-code' class='numeric form-control' name='name' type='text' value="<?= $customer->name ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Phone</label>
                        <input id='field-code' class='numeric form-control' name='phone' type='text'
                               value="<?= $customer->phone ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Handphone</label>
                        <input id='field-code' class='numeric form-control' name='handphone' type='text'
                               value="<?= $customer->handphone ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Address</label>
                        <input id='field-code' class='numeric form-control' name='address' type='text'
                               value="<?= $customer->address ?>"
                               maxlength='45'>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Area</label>
                        <input id='field-code' class='numeric form-control' name='area' type='text'
                               value="<?= $customer->area ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Email</label>
                        <input id='field-code' class='numeric form-control' name='email' type='text'
                               value="<?= $customer->email ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Point</label>
                        <input id='field-code' class='numeric form-control' name='point' type='text'
                               value="<?= $customer->point ?>"
                               maxlength='45'>
                    </div>
                </div>
                                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Is Active</label>
                        <input type="checkbox" name="is_active" data-init-plugin="switchery" data-size="small"
                               data-color="primary"
                            <?= $customer->is_active ?>/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>