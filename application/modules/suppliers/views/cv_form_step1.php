<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Action Supplier</h2>
        <p>form untuk membantu mengelola informasi supplier yang memasok barang</p>
    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default disabled">
                        <label for="name">Supplier Code</label>
                        <input id='field-code' class='numeric form-control' name='code' type='text'
                               value="<?= $supplier->code ?>"
                               maxlength='45' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Supplier Name</label>
                        <input id='field-code' class='numeric form-control' name='name' type='text'
                               value="<?= $supplier->name ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Phone Supplier</label>
                        <input id='field-code' class='numeric form-control' name='phone' type='text'
                               value="<?= $supplier->phone ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Contact Name</label>
                        <input id='field-code' class='numeric form-control' name='contact_name' type='text'
                               value="<?= $supplier->contact_name ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Fax Supplier</label>
                        <input id='field-code' class='numeric form-control' name='fax' type='text'
                               value="<?= $supplier->fax ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Handphone Supplier</label>
                        <input id='field-code' class='numeric form-control' name='handphone' type='text'
                               value="<?= $supplier->handphone ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Email Supplier</label>
                        <input id='field-code' class='numeric form-control' name='email' type='text'
                               value="<?= $supplier->email ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Note Supplier</label>
                        <input id='field-code' class='numeric form-control' name='description' type='text'
                               value="<?= $supplier->description ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Supplier Address</label>
                        <input id='field-code' class='numeric form-control' name='address' type='text'
                               value="<?= $supplier->address ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label for="name">Is Active</label>
                        <input type="checkbox" name="is_active" data-init-plugin="switchery" data-size="small"
                               data-color="primary"
                            <?= $supplier->is_active ?>/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>