<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-shopping-cart fa-2x hint-text"></i>
        <h2>Informasi Product</h2>
        <p>data mengenai info product yang akan didistribusikan ke seluruh store / gudang. digunakan sebagai data
            master</p>
    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default typehead">
                        <label for="name">Search Item</label>
                        <input id='product' class='typeahead form-control show_product' name='name' type='text' value=""
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div id="detail-product">
                <?php
                    if ($this->uri->segment(3)){
                        $this->load->model('m_product','product_model');
                        $this->load->model('m_product','supplier_model');
                        $data['product']           = $this->product_model->get($product_inventory->n_product_id);
                        $supplier = $this->supplier_model->get($data['product']->n_supplier_id);
                        $data['product']->n_supplier_id = $supplier->code . ' | ' . $supplier->name;
                        echo $this->load->view("cv_product", $data, TRUE);
                    }
                ?>
            </div>
        </div>
    </div>
</div>