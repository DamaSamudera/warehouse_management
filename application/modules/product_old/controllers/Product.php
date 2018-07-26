<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/28/2018
 * Time: 9:10 PM
 */

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_product', 'main_model');
        $this->load->model('m_inventory', 'inventory_model');
        $this->load->model('m_upload_product', 'product_upload_model');
        $this->load->model('m_suppliers', 'supplier_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates']  = $this->tampilan->datatable()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action_form($id = NULL){
        if($id){
            $this->data['product']           = $this->main_model->get($id);
            $supplier = $this->supplier_model->get($this->data['product']->n_supplier_id);
            $this->data['product']->n_supplier_id = $supplier->code . ' | ' . $supplier->name;
            $this->data['product_inventory'] = $this->inventory_model->get_by(array("n_product_id" => $id), TRUE);
        }else {
            $this->data['product']           = $this->main_model->get_new_data();
            $this->data['product_inventory'] = $this->inventory_model->get_new_data();
        }
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

    public function action($id = NULL){
        $data_post = $this->main_model->array_from_post(array('name','description','barcode','is_active','is_order','is_stock_tracking', 'n_supplier_id'));
        $data_post['is_active']         = ($data_post['is_active']) ? 'checked' : '';
        $data_post['is_order']          = ($data_post['is_order']) ? 'checked' : '';
        $data_post['is_stock_tracking'] = ($data_post['is_stock_tracking']) ? 'checked' : '';
        $data_post['n_supplier_id']     = $this->supplier_model->get_id($data_post['n_supplier_id']);
        if($this->product_upload_model->get()) {
            $data_post['file'] = $this->product_upload_model->get()[0]->file;
            $data_post['path'] = $this->product_upload_model->get()[0]->path;
        }
        $id_product = $this->main_model->save($data_post, $id);

        $this->product_upload_model->delete_all();

        $inventory = $this->inventory_model->get_by(array("n_product_id" => $id_product), TRUE);
        $id_inventory = NULL;
        if($inventory)
            $id_inventory = $inventory->id;
        $data_post_inventory = $this->inventory_model->array_from_post(array('sale1','sale2','sale3','cost1','cost2','cost3','cost_supplier','cost_distributor','qty1','qty2','qty3','qty4','qty5','qty_limit','location','is_active','is_order', 'n_product_id'));
        $data_post_inventory['code'] = $data_post['barcode'];
        $data_post_inventory['is_active']         = ($data_post['is_active']) ? 'checked' : '';
        $data_post_inventory['is_order']          = ($data_post['is_order']) ? 'checked' : '';
        $data_post_inventory['n_product_id'] = $id_product;
        $data_post_inventory['n_store_id'] = $this->session->userdata('n_store_id');
        $this->inventory_model->save($data_post_inventory, $id_inventory);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('product', 'refresh');
    }

    public function delete_single(){
        $id = $this->input->get('id');
        $inventory = $this->inventory_model->get_by(array("n_product_id" => $id), TRUE);
        $this->inventory_model->delete($inventory->id);
        $this->main_model->delete($id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('product', 'refresh');
    }

    public function delete_selected(){
        $ids = $this->input->post('id');
        foreach ($ids as $id){
            $inventory = $this->inventory_model->get_by(array("n_product_id" => $id), TRUE);
            $this->inventory_model->delete($inventory->id);
            $this->main_model->delete($id);
        }

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('product', 'refresh');
    }

    public function upload_file() {
        $config['upload_path']      = './assets/product';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '1000000';
        $config['overwrite']        = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();
            $data_save['file'] = file_get_contents($data['full_path']);
            $data_save['path'] = base_url('assets/product/') . $data['file_name'];
            $this->product_upload_model->save($data_save, NULL);
        }
    }

    public function get_data($status = NULL)
    {
        header('Content-Type: application/json');
        if($status){
            $where = array();
            if($status == 'active'){
                $where = array("is_active" => 'checked');
            }else{
                $where = array("is_active" => '');
            }
            $data['data'] = $this->main_model->get_by($where);
        }else {
            $data['data'] = $this->main_model->get();
        }
        echo json_encode($data);
    }

    public function statistik(){
        header('Content-Type: application/json');
        $data['statistik']['product'] = $this->main_model->get_statistik();
        $data['statistik']['product'] = '';
        echo json_encode($data);
    }

    public function get_list_supplier(){
        header('Content-Type: application/json');
        $where = $this->input->get('query');
        $result = $this->supplier_model->get_list_supplier($where);
        echo json_encode($result);
    }
}