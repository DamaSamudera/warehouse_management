<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 1:53 AM
 */

class Logis_in_detail_m extends MY_Model
{
    protected $_table_name = "stock_order_detail";

    public function get_detail_product($id = NULL, $single = FALSE){
        $this->db->select('
            stock_order_detail.id,
            stock_order_detail.request_qty,
            stock_order_detail.received_qty,
            stock_order_detail.supply_price,
            stock_order_detail.order_price,
            stock_order_detail.stock_order_id,
            stock_order_detail.product_id,
            product.id AS p_id,
            product.`name`,
            product.barcode,
            product.description,
            product.file,
            product.path,
            product.is_active,
            product.is_delete,
            product.created,
            product.modified,
            product.supplier_id,
            product.category_id
        ');
        $this->db->join('product', 'stock_order_detail.product_id = product.id', 'INNER');
        return parent::get($id, $single);
    }
}