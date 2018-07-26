<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 4:26 PM
 */

class M_sales extends MY_Model
{
    protected $_table_name  = 'sales';
    protected $_timestamps  = TRUE;

    // ------------------------------------------------------------------------

    public function get_new_data(){
        $customer = new stdClass();
        $customer->code = 'SALE' . '/' . date('Ymd') . '/' . rand(11, 99) . $this->get_id();
        $customer->name = 'name';
        $customer->phone = 'phone';
        $customer->address = 'address';
        $customer->area = 'area';
        $customer->email = 'email';
        $customer->note = 'note';
        $customer->sales_type = 'sales_type';
        $customer->poin = '0';
        $customer->sub_total = 0;
        $customer->special_discount = 0;
        return $customer;
    }

    // ------------------------------------------------------------------------

    public function get_id(){
        $this->db->select('MAX(id) AS id');
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}