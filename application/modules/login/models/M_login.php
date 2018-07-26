<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 6:31 PM
 */
class M_login extends MY_Model{

    protected $_table_name = 'employee';

    function get_login_info($username)
    {
        $this->db->select("*, employee.id AS emp_id, employee.name AS emp_name");
        $this->db->join('store', 'employee.store_id = store.id');
        $this->db->where('username', $username);
        return parent::get();
    }

    function set_session($value){
        $data_session = array(
			'id' => $value->emp_id,
			'code' => $value->code,
			'name' => $value->emp_name,
			'username' => $value->username,
			'email' => $value->email,
			'password' => $value->password,
			'address' => $value->address,
			'area' => $value->area,
			'phone' => $value->phone,
			'is_active' => $value->is_active,
			'role' => $value->role,
			'created' => $value->created,
			'modified' => $value->modified,
			'pin' => $value->pin,
			'store_id' => $value->store_id,
			'store_name' => $value->name,
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