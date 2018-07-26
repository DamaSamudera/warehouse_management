<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/29/2018
 * Time: 11:26 AM
 */

class Store_m extends MY_Model
{
    protected $_table_name = "store";

    function get_list_store($id = NULL, $single = FALSE){
        $this->db->select("`code`,`name`, IF(is_warehouse='1', 'Warehouse', 'Store') AS store");
        return parent::get($id, $single);
    }
    
    public function get_new_data(){
        $store = new stdClass();
        $store->code = 'SPLC' . date('ymd') . $this->get_id();
        $store->name = "";
        $store->email = "";
        $store->phone = "";
        $store->fax = "";
        $store->is_active = "";
        $store->is_warehouse = "";
        $store->area = "";
        $store->address = "";
        return $store;
    }

    public function get_id(){
        $this->db->select('MAX(id) AS id');
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}