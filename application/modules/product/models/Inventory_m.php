<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 1:09 PM
 */

class Inventory_m extends MY_Model
{
    protected $_table_name = "inventory";
    protected $_timestamps = TRUE;

    public function get_join_product($id = NULL, $single = FALSE){
        
        $this->db->select('
            inventory.id AS inv_id,
            inventory.barcode,
            inventory.created,
            inventory.modified,
            inventory.sale1,
            inventory.sale2,
            inventory.sale3,
            inventory.cost1,
            inventory.cost2,
            inventory.cost_supplier,
            inventory.cost_distributor,
            inventory.sale1_cd,
            inventory.sale2_cd,
            inventory.sale3_cd,
            inventory.cost1_cd,
            inventory.cost2_cd,
            inventory.cost_supplier_cd,
            inventory.cost_distributor_cd,
            inventory.qty1,
            inventory.qty2,
            inventory.qty3,
            inventory.qty4,
            inventory.qty5,
            inventory.qty_limit,
            inventory.location,
            inventory.is_active AS inv_active,
            inventory.is_delete AS inv_del,
            inventory.product_id,
            inventory.store_id,
            product.id AS pro_id,
            product.`name`,
            product.barcode,
            product.description,
            product.path,
            product.is_active,
            product.is_delete,
            product.created,
            product.modified,
            product.supplier_id,
            product.category_id 
        ');
        $this->db->join('product', 'inventory.product_id = product.id', 'INNER');

        return parent::get($id, $single);
    }
}