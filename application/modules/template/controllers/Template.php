<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/26/2018
 * Time: 7:23 PM
 */

class Template extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('template_m', 'main_template');
    }

    public function index(){

        $this->data['css_templates'] =  $this->main_template->datatable()['css'] .
                                        $this->main_template->upload()['css'] .
                                        $this->main_template->select2()['css'] .
                                        $this->main_template->datepicker()['css'] .
                                        $this->main_template->chart()['css'] .
                                        $this->main_template->gallery()['css'] .
                                        $this->main_template->typehead()['css'] .
                                        $this->main_template->tabs()['css'] .
                                        $this->main_template->formwizard()['css'] .
                                        $this->main_template->upload()['css'];

        $this->data['js_templates']  =  $this->main_template->datatable()['js'] .
                                        $this->main_template->upload()['js'] .
                                        $this->main_template->select2()['js'] .
                                        $this->main_template->datepicker()['js'] .
                                        $this->main_template->chart()['js'] .
                                        $this->main_template->gallery()['js'] .
                                        $this->main_template->typehead()['js'] .
                                        $this->main_template->tabs()['js'] .
                                        $this->main_template->formwizard()['js'] .
                                        $this->main_template->upload()['js'];

        $this->load->view('v_base_template', $this->data);

    }
}