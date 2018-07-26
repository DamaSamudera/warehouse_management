<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 4:10 AM
 */

class Sales_daily extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_sales_daily', 'main_model');
        $this->load->model('m_sales_sc', 'sales_sc_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }
    
    public function sales_sc(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'sales_sc/v_base';
        $this->data['script_content'] = 'sales_sc/v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function get_data(){
        header('Content-Type: application/json');
        
        $this->db->where('sales.store_id', $this->session->userdata('store_id'));
        $this->db->where('DATE(sales.created)', date('Y-m-d'));
        $data['data'] = $this->main_model->get_sales();
        echo json_encode($data);
    }
    
    public function get_sales_sc(){
        header('Content-Type: application/json');
        
        $this->db->where('sales.store_id', $this->session->userdata('store_id'));
        $data['data'] = $this->sales_sc_model->get_sales_sc();
        echo json_encode($data);
    }

}