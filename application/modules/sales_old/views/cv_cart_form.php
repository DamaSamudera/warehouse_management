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
                               class="form-control add_cart typeahead" id="baseplace"
                               value="AK000001 | GELANG KULIT KOMBIN">
                    </div>
                    <div class="input-group-addon">
                        <i class="fa fa-barcode"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="btn-group m-b-5 btn-lg">
                    <button data-toggle="tooltip" type="submit" data-status="draft" value="draft" name="status" class="btn btn-success process"
                            data-original-title="Save as Draft"><i
                                class="fa fa-save"></i></button>
                    <a data-toggle="tooltip" href="<?= base_url('sales_draft'); ?>" class="btn btn-success"
                            data-original-title="Draft Sales"><i
                                class="fa fa-book"></i></a>
                    <button data-toggle="tooltip" type="button" class="btn btn-danger"
                            data-original-title="Cancel Sale" onclick="window.location.reload()"><i class="fa fa-trash-o"></i></button>
                </div>
            </div>
        </div>

        <div class="table-responsive" id="cart_details">
            <?php $this->load->view('cv_chart_element'); ?>
        </div>
    </div>
</div>