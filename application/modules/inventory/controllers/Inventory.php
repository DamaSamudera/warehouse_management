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
        $this->load->model('m_suppliers', 'supplier_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates'] = $this->tampilan->datatable()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }
    
    public function stock_control(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'stock_control/v_base';
        $this->data['script_content'] = 'stock_control/v_script';

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

        $this->data['css_templates'] =  $this->tampilan->formwizard()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates']  =  $this->tampilan->formwizard()['js'] .
            $this->tampilan->typehead()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action($id = NULL){
        $data_post_inventory = $this->main_model->array_from_post(array('code', 'sale1','sale2','sale3','cost1','cost2','cost_supplier','cost_distributor','qty1','qty2','qty3','qty4','qty_limit','location','is_active','product_id'));
        $data_post_inventory['store_id'] = $this->session->userdata('store_id');
        $this->main_model->save($data_post_inventory, $id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('inventory', 'refresh');
    }

    public function get_data($status = NULL)
    {
        header('Content-Type: application/json');
        if($status){
            $where = array();
            if($status == 'active'){
                $where = array("inventory.is_active" => 'checked');
            }else{
                $where = array("inventory.is_active" => '');
            }
            $where['product.is_delete'] = 0;
            $where['inventory.store_id'] = $this->session->userdata('store_id');
            $data['data'] = $this->main_model->get_by($where);
        }else {
            $data['data'] = $this->main_model->get();
        }
        echo json_encode($data);
    }
    
    public function get_data_control()
    {
        header('Content-Type: application/json');
            $where['product.is_delete'] = 0;
            $where['inventory.store_id'] = $this->session->userdata('store_id');
            $data['data'] = $this->main_model->get_control($where);
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

    public function get_list_product()
    {
        header('Content-Type: application/json');
        $where = $this->input->get('query');
        $this->db->like('name', $where, 'both');
        $this->db->or_like('barcode', $where, 'both');
        $result = $this->product_model->get();
        echo json_encode($result);
    }

    function get_product(){
        $product = $this->input->post('product');
        if ($product) {
            $data_product = explode(' | ', $product);
            $where = array('barcode' => $data_product[0], 'name' => $data_product[1]);
            $this->data['product']           = $this->product_model->get_by($where, TRUE);
            $supplier = $this->supplier_model->get($this->data['product']->supplier_id);
            $this->data['product']->supplier_id = $supplier->code . ' | ' . $supplier->name;
            echo $this->load->view('cv_product', $this->data, true);
        }
    }
}