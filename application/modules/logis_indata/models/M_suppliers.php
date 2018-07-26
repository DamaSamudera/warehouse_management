<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 3:14 PM
 */

class M_suppliers extends MY_Model
{
    protected $_table_name   = 'supplier';
    protected $_table_name2  = 'category';
    protected $_timestamps   = TRUE;

    function get_list_supplier($where){
        return $this->db->query("SELECT 
							  `code`,`name`  
							FROM
							  ".$this->_table_name."
							WHERE
								(name LIKE '%" .$where. "%' OR code LIKE '%" .$where. "%') AND is_active = 'checked'")->result();
    }
    
    function get_list_category($where){
        return $this->db->query("SELECT 
							  `code`,`name`  
							FROM
							  ".$this->_table_name2."
							WHERE
								(name LIKE '%" .$where. "%' OR code LIKE '%" .$where. "%') ")->result();
    }


    function get_id($where){
        $data = explode(' | ', $where);
        $where = array("code" => $data[0], "name" => $data[1]);
        $data = $this->get_by($where, TRUE);
        return $data->id;
    }
}