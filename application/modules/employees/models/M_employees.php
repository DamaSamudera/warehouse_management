<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 4:04 PM
 */

class M_employees extends MY_Model
{
    protected $_table_name  = 'employee';
    protected $_timestamps  = TRUE;

    public function get_new_data(){
        $employee = new stdClass();
        $employee->code = 'E' . date('ymd') . $this->get_id();;
        $employee->name= '';
        $employee->email= '';
        $employee->address= '';
        $employee->phone= '';
        $employee->is_active= '';
        $employee->username= '';
        $employee->password= '';
        $employee->pin= '';
        $employee->store_id= '';
        return $employee;
    }

    public function get_id(){
        $this->db->select('MAX(id) AS id');
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}