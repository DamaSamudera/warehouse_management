<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/27/2018
 * Time: 4:32 PM
 */

class Dashboard extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->chart()['css'] ;
        $this->data['js_templates'] = $this->tampilan->chart()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }
}