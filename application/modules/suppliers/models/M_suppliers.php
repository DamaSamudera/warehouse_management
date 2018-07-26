<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 3:14 PM
 */

class M_suppliers extends MY_Model
{
    protected $_table_name  = 'supplier';
    protected $_timestamps  = TRUE;

    public function get_new_data(){
        $supplier = new stdClass();
        $supplier->code = $this->get_id();
        $supplier->name = '';
        $supplier->npwp = '';
        $supplier->nppkp = '';
        $supplier->contact_name = '';
        $supplier->phone = '';
        $supplier->fax = '';
        $supplier->handphone = '';
        $supplier->email = '';
        $supplier->address = '';
        $supplier->description = '';
        $supplier->is_active = '';
        $supplier->is_internal = '';
        return $supplier;
    }

    public function get_id(){
        $this->db->select('MAX(id) AS id');
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}