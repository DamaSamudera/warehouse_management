<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 12:25 AM
 */

class Setting_pos_receipt extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base_form';
        $this->data['script_content'] = 'v_script_form';

        $this->data['css_templates'] = $this->tampilan->formwizard()['css'];
        $this->data['js_templates'] = $this->tampilan->formwizard()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }
}