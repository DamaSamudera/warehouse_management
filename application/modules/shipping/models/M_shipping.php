<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/10/2018
 * Time: 5:36 PM
 */

class M_shipping extends MY_Model
{
    protected $_table_name = 'n_shipping';
    protected $_timestamps = TRUE;

    public function get_new_data($status){
        $shipping = new stdClass();
        if ($status == 'manual')
            $id = "SHMN";
        $shipping->code = $id . $this->session->userdata('n_store_id') . date('ymd') . $this->get_id();
        $shipping->status = "";
        $shipping->type = $status;
        return $shipping;
    }

    public function get_id(){
        $this->db->select('MAX(id) AS id');
        return $this->db->get($this->_table_name)->row()->id + 1;
    }
}