<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 6:31 PM
 */
class M_login extends MY_Model{

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
            'username'  => $value->username,
            'email' 	=> $value->email,
            'password' 	=> $value->password,
            'alamat' 	=> $value->alamat,
            'negara' 	=> $value->negara,
            'phone' 	=> $value->phone,
            'is_active' => $value->is_active,
            'created' 	=> $value->created,
            'modified' 	=> $value->modified,
            'pin' 	    => $value->pin,
            'n_store_id'=> $value->n_store_id,
            'is_loggin' => TRUE,
        );
        $this->session->set_userdata($data_session);
    }

    function set_cookie_account($username, $password){
        $cookie_username= array(
            'name'   => 'username',
            'value'  => $username,
            'expire' => '3600',
        );
        $cookie_password= array(
            'name'   => 'password',
            'value'  => $password,
            'expire' => '3600',
        );

        $this->input->set_cookie($cookie_username);
        $this->input->set_cookie($cookie_password);
    }

}