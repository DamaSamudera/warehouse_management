<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/16/2018
 * Time: 1:48 AM
 */

class M_category extends MY_Model
{
    public $_table_name = 'category';

    function get_id($where){
        $data = explode(' | ', $where);
        $where = array("code" => $data[0], "name" => $data[1]);
        $data = $this->get_by($where, TRUE);
        return $data->id;
    }
}