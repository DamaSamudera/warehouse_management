<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 11:38 PM
 */

class M_sales_sc extends MY_Model
{
    protected $_table_name  = 'sales_detail';
    
    public function get_sales_sc($where = NULL, $id = NULL, $single = FALSE)
    {
        if($where) {
            $this->db->where($where);
        }
        $this->db->select('
            SUM(sales_detail.price * sales_detail.qty) AS sd_price,
            SUM(sales_detail.qty) AS sd_qty,
            sc.name AS sc_name,
            sales.store_id,
            inventory.barcode as code
        ');
        $this->db->join('sales', 'sales.id = sales_detail.sales_id', 'LEFT');
        $this->db->join('inventory', 'inventory.id = sales_detail.inventory_id', 'LEFT');
        $this->db->join('employee AS sc', 'sc ON sc.id = sales_detail.sc', 'LEFT');
        $this->db->group_by('code');
        $this->db->group_by('sc_name');
        return parent::get($id, $single);
    }
    
}