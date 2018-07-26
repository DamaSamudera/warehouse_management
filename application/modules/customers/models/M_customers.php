<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 2:26 PM
 */

class M_customers extends MY_Model
{
    protected $_table_name  = 'customer';
    protected $_timestamps  = TRUE;

    public function get_new_data(){
        $customer = new stdClass();
        $customer->code = 'C' . date('ymd') . $this->get_id();;
        $customer->name = '';
        $customer->phone = '';
        $customer->handphone = '';
        $customer->address = '';
        $customer->area = '';
        $customer->email = '';
        $customer->description = '';
        $customer->point = '0';
        $customer->is_active = '';
        return $customer;
    }

    public function get_id(){
        $this->db->select('MAX(id) AS id');
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}