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
        $this->db->select("`code`,`name`, IF(is_warehouse='checked', 'Warehouse', 'Store') AS store");
        return parent::get($id, $single);
    }

    function get_id($where){
        $data = explode(' | ', $where);
        $data_type = explode('/', $data[0]);
        $where = array("code" => $data_type[1], "name" => $data[1]);
        $data = $this->get_by($where, TRUE);
        return $data->id;
    }
    
    function get_name($where){
        $data = explode(' | ', $where);
        $data_type = explode('/', $data[0]);
        $where = array("code" => $data_type[1], "name" => $data[1]);
        $data = $this->get_by($where, TRUE);
        return $data->name;
    }
}