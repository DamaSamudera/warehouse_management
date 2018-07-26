<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 11:21 AM
 */

class Product_m extends MY_Model
{
    protected $_table_name = "product";
    protected $_timestamps = TRUE;

    public function get_new_data(){
        $product = new stdClass();
        $product->name              = '';
        $product->description       = '';
        $product->barcode           = 'Pilih category';
        $product->is_active         = '';
        $product->is_order          = '';
        $product->is_stock_tracking = '';
        $product->n_supplier_id     = '';
        $product->product_id_category     = '';
        return $product;
    }

    public function get_id($category_id){
        $this->db->select('COUNT(*) AS id');
        $this->db->where('SUBSTR(barcode, 1, 8) = ', $category_id);
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}