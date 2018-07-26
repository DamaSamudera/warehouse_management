<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 12:14 PM
 */

class Supplier_m extends MY_Model
{
    protected $_table_name  = 'supplier';
    protected $_timestamps  = TRUE;

    public function get_id($where){
        $data = explode(' | ', $where);
        $where = array("code" => $data[0], "name" => $data[1]);
        $data = $this->get_by($where, TRUE);
        return $data->id;
    }
    
    function get_name($where){
        $data = explode(' | ', $where);
        $where = array("code" => $data[0], "name" => $data[1]);
        $data = $this->get_by($where, TRUE);
        return $data->name;
    }
}