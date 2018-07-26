<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 8:15 PM
 */

class M_lockscreen extends MY_Model
{
    protected $_table_name = 'n_employee';

    function get_login_info($username)
    {
        $this->db->select("*");
        $this->db->where('username', $username);
        return parent::get();
    }

    function set_session($value){
        $data_session = array(
            'id' 	    => $value->id,
            'code' 	    => $value->code,
            'name' 	    => $value->name,
            'email' 	=> $value->email,
            'password' 	=> $value->password,
            'alamat' 	=> $value->alamat,
            'negara' 	=> $value->negara,
            'phone' 	=> $value->phone,
            'is_active' => $value->is_active,
            'created' 	=> $value->created,
            'modified' 	=> $value->modified,
            'pin' 	    => $value->pin,
            'n_store_id' 	    => $value->n_store_id,
            'is_loggin' => TRUE,
        );
        $this->session->set_userdata($data_session);
    }
}