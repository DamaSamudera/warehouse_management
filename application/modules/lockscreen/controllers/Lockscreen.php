<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 8:14 PM
 */

class Lockscreen extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_lockscreen', 'main_model');
        $this->load->library('encryption');
    }

    function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = NULL;

        $this->data['css_templates'] =  $this->tampilan->validation()['css'] .
            $this->tampilan->froala()['css'];
        $this->data['js_templates'] =   $this->tampilan->validation()['js'] .
            $this->tampilan->froala()['js'];
        $this->load->view('template/v_blank_template', $this->data);
    }

    function proses(){
        $password = $this->input->post("password");
        $data_users = $this->main_model->get_login_info($this->session->userdata('username'));

        foreach ($data_users as $value) {
            $data_password = $this->encryption->decrypt($value->password);
            $data_pin = $this->encryption->decrypt($value->pin);
            if ($password == $data_password || $password == $data_pin) {
                $update_data = array('last_login' => date('Y-m-d H:i:s'), 'ip_address' => $this->input->ip_address());
                $this->main_model->set_session($value);
                $this->main_model->save($update_data, $value->id);

                $this->session->set_flashdata('first_login', TRUE);
                redirect('dashboard','refresh');
            }
        }

        redirect('lockscreen','refresh');
    }
}