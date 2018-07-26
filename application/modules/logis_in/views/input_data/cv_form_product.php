<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
        <div class="row pull-right m-b-10">
            <a href="<?= base_url('logis_in/product_action_form'); ?>" class="btn btn-success m-r-5">Tambah Barang</a>
            <div class="btn-group">
                <button data-toggle="tooltip" type="button" data-status="stock order" class="btn text-success process" type="submit"
                            data-original-title="Purchase Order"><i
                            class="fa fa-cart-plus"></i></button>
                <button data-toggle="tooltip" type="button" class="btn text-danger" onclick="window.location.replace('<?= base_url('logis_in/input')?>')"
                            data-original-title="Reset"><i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
</div>