<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/6/2018
 * Time: 8:35 PM
 */

class M_product extends MY_Model
{
    protected $_table_name = 'product';
    protected $_timestamps = TRUE;

    public function get_new_data(){
        $product = new stdClass();
        $product->name              = 'name';
        $product->description       = 'description';
        $product->barcode           = 'B';
        $product->is_active         = 'checked';
        return $product;
    }
}