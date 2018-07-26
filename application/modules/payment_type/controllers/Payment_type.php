<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 12:20 AM
 */

class Payment_type extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }
}