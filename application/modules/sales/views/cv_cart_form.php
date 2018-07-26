<div class="pull-right m-b-10">
    <div class="btn-group">
        <button data-toggle="tooltip" type="submit" value="draft" name="status" class="btn text-success process" id="draft" data-status="draft" data-original-title="Save as Draft"><i class="fa fa-save"></i></button>
        <button data-toggle="tooltip" type="button" class="btn text-danger" data-original-title="Cancel Sale" onclick="window.location.reload()"><i class="pg pg-trash_line"></i></button>
    </div>
    <a href="<?= base_url('sales_draft'); ?>" class="btn btn-warning text-black btn-cons btn-animated from-top fa fa-book">
        <span class="font-montserrat bold fs-12">DRAFT SALES</span>
    </a>
</div>

<div class="card card-default">
    <div class="card-header  separator">
        <?php
            if($this->uri->segment(3)) echo '<span class="label label-warning pull-right font-montserrat" style="width: auto;">Draft</span>';
            else echo '<span class="label label-default pull-right font-montserrat" style="width: auto;">Not Save</span>';
        ?>
        <div class="card-title" id="cart"><h4 class="font-montserrat text-uppercase">
                CART# | <?= $sale->code; ?></h4>
            <input type="hidden" name="code" value="<?= $sale->code; ?>">
        </div>
    </div>
    <div class="card-block">
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group form-group-default input-group typehead">
                    <div class="form-input-group">
                        <label>Product Barcode / Name</label>
                        <input type="text" name="product"
                               class="add_cart form-control typeahead" id="product"
                               value="" placeholder="Type code or name product">
                    </div>
                    <div class="input-group-addon">
                        <i class="fa fa-barcode"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-default form-group-default-selectFx">
                    <label>Tipe Penjualan</label>
                    <select name="payment_type" id="payment_type"
                        class="cs-select cs-skin-slide cs-transparent form-control"
                        data-init-plugin="cs-select">
                        <option value="1">Eceran</option>
                        <option value="2">Online</option>
                        <option value="3">Grosir</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="table-responsive" id="cart_details">
            <?php $this->load->view('cv_chart_element'); ?>
        </div>
    </div>
</div>