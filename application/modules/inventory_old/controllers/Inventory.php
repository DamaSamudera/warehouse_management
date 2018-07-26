<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 3:00 AM
 */

class Inventory extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_inventory', 'main_model');
        $this->load->model('m_product', 'product_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates'] = $this->tampilan->datatable()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action_form($id = NULL){
        if($id){
            $this->data['product_inventory'] = $this->main_model->get($id);
            $this->data['product']           = $this->product_model->get_new_data();
        }else {
            $this->data['product_inventory'] = $this->main_model->get_new_data();
            $this->data['product']           = $this->product_model->get_new_data();
        }

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base_form';
        $this->data['script_content'] = 'v_script_form';

        $this->data['css_templates'] =  $this->tampilan->formwizard()['css'];
        $this->data['js_templates']  =  $this->tampilan->formwizard()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action($id = NULL){
        $data_post_inventory = $this->main_model->array_from_post(array('code', 'sale1','sale2','sale3','cost1','cost2','cost3','cost_supplier','cost_distributor','qty1','qty2','qty3','qty4','qty5','qty_limit','location','is_active','is_order'));
        $this->main_model->save($data_post_inventory, $id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('inventory', 'refresh');
    }

    public function get_data(){
        header('Content-Type: application/json');
        $data['data'] = $this->main_model->get();
        echo json_encode($data);
    }

    public function statistik(){
        header('Content-Type: application/json');
        $data['statistik']['product'] = $this->main_model->get_statistik();
        $data['statistik']['product'] = '';
        echo json_encode($data);
    }

    public function delete_single(){
        $id = $this->input->get('id');
        $this->main_model->delete($id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('inventory', 'refresh');
    }

    public function delete_selected(){
        $ids = $this->input->post('id');
        foreach ($ids as $id){
            $this->main_model->delete($id);
        }

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('inventory', 'refresh');
    }
}