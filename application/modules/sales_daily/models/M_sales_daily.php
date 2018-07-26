<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 11:38 PM
 */

class M_sales_daily extends MY_Model
{
    protected $_table_name  = 'sales';
    
    public function get_sales($where = NULL, $id = NULL, $single = FALSE)
    {
        if($where) {
            $this->db->where($where);
        }
        $this->db->select('
            sales.id AS sale_id,
            sales.code AS sale_cd,
            sales.created AS sale_created,
            sales.modified AS sale_modified,
            sales.status AS sale_status,
            sales.tax AS tax,
            sales.special_discount AS special_discount,
            sales.note AS note,
            sales.sales_type AS sales_type,
            sales.payment_type AS payment_type,
            sales.sub_total AS sub_total,
            sales.store_id AS store_id,
            cash.name AS cash_name,
            SUM(sales_detail.qty) AS sd_qty,
            sc.name AS sc_name,
            inventory.barcode,
            inventory.sale1
        ');
        $this->db->join('sales_detail', 'sales_detail.sales_id = sales.id', 'LEFT');
        $this->db->join('inventory', 'inventory.id = sales_detail.inventory_id', 'LEFT');
        $this->db->join('employee AS sc', 'sc ON sc.id = sales_detail.sc', 'LEFT');
        $this->db->join('employee AS cash', 'cash ON cash.id = sales.cashier', 'LEFT');
         $this->db->group_by('sales_id');
        return parent::get($id, $single);
    }
    
}