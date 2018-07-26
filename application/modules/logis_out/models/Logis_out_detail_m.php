<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/29/2018
 * Time: 2:44 AM
 */

class Logis_out_detail_m extends MY_Model
{
    protected $_table_name = "shipping_detail";

    public function get_detail_product($where = NULL, $id = NULL, $single = FALSE)
    {
        if($where) {
            $this->db->where($where);
        }
        $this->db->select('
            shipping_detail.id AS sip_det_id,
            shipping_detail.request_qty,
            shipping_detail.received_qty,
            shipping_detail.order_price,
            shipping_detail.delivery_price,
            shipping_detail.shipping_id,
            shipping_detail.inventory_id,
            inventory.barcode,
            inventory.created,
            inventory.modified,
            inventory.sale1 AS j1,
            inventory.sale2 AS j2,
            inventory.sale3,
            inventory.cost1,
            inventory.cost2,
            inventory.cost_supplier,
            inventory.cost_distributor AS hg,
            inventory.sale1_cd AS j1_cd,
            inventory.sale2_cd AS j2_cd,
            inventory.sale3_cd,
            inventory.cost1_cd,
            inventory.cost2_cd,
            inventory.cost_supplier_cd,
            inventory.cost_distributor_cd AS hg_cd,
            inventory.qty1,
            inventory.qty2,
            inventory.qty3,
            inventory.qty4,
            inventory.qty5,
            inventory.qty_limit,
            inventory.location,
            inventory.is_active,
            inventory.is_delete,
            inventory.product_id,
            inventory.store_id,
            product.`name`,
            product.`description`
        ');
        $this->db->join('inventory', 'inventory.id = shipping_detail.inventory_id', 'LEFT');
        $this->db->join('product', 'product.id = inventory.product_id', 'LEFT');
        return parent::get($id, $single);
    }
}