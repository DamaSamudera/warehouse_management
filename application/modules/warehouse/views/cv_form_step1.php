<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Judul Form</h2>
        <p>Kegunaan</p>
        <?php var_dump($store); ?>
    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default disabled">
                        <label for="name">Code Store</label>
                        <input id='field-code' class='numeric form-control' name='code' type='text' value="<?= $store->code ?>"
                               maxlength='45' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default typehead">
                        <label for="name">Store Name</label>
                        <input id='supplier' class='form-control' name='name' type='text' value="<?= $store->name ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Email</label>
                        <input id='field-code' class='numeric form-control' name='email' type='text' value="<?= $store->email ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Phone</label>
                        <input id='field-code' class='numeric form-control' name='phone' type='text' value="<?= $store->phone ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Fax</label>
                        <input id='field-code' class='numeric form-control' name='fax' type='text' value="<?= $store->fax ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Mata Uang</label>
                        <input id='field-code' class='numeric form-control' name='mata_uang' type='text' value="<?= $store->mata_uang ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Area</label>
                        <input id='field-code' class='numeric form-control' name='area' type='text' value="<?= $store->area ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Alamat</label>
                        <input id='field-code' class='numeric form-control' name='alamat' type='text' value="<?= $store->alamat ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Is Active</label>
                        <input type="checkbox" name="is_active" data-init-plugin="switchery" data-size="small" data-color="primary"
                            <?= $store->is_active ?>/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Is Warehouse</label>
                        <input type="checkbox" name="is_warehouse" data-init-plugin="switchery" data-size="small" data-color="primary"
                            <?= $store->is_warehouse ?>/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-group-default">
                        <label for="name">Show Other Stock</label>
                        <input type="checkbox" name="show_other_stock" data-init-plugin="switchery" data-size="small" data-color="primary"
                            <?= $store->show_other_stock ?>/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>