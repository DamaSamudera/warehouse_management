<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/9/2018
 * Time: 1:10 PM
 */

class Stock_on extends MY_Controller
{

    public function index()
    {
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates'] = $this->tampilan->datatable()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action_form($id = NULL){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base_form';
        $this->data['script_content'] = 'v_script_form';

        $this->data['css_templates'] =  $this->tampilan->formwizard()['css'] .
            $this->tampilan->upload()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates'] =   $this->tampilan->formwizard()['js'] .
            $this->tampilan->upload()['js'] .
            $this->tampilan->typehead()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }
}