<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/29/2018
 * Time: 1:44 PM
 */

class Logis_out extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("cart");

        $this->load->model('logis_out_m','main_model');
        $this->load->model('logis_out_detail_m','detail_model');
        $this->load->model('inventory_m','inventory_model');
        $this->load->model('store_m','store_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'manual_shipping/tampilan';
        $this->data['script_content'] = 'manual_shipping/script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function list_shipping(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'list_shipping/tampilan';
        $this->data['script_content'] = 'list_shipping/script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function approve_update_cart()
    {
        $data = array(
            "rowid" => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('approve/cv_chart_product', $this->data, true);
    }

    public function approve_proses($id){
        $id_detail = $this->input->post('id');
        $rowid  = $this->input->post('rowid');
        $qty    = $this->input->post('qty');

        for($i = 0; $i < count($id_detail); $i++) {
            $cart_item = $this->cart->get_item($rowid[$i]);
            $shipping_detail = $cart_item['shipping_id'];

            $data_detail_update['received_qty'] = $qty[$i];
            $this->detail_model->save($data_detail_update, $shipping_detail);

            $where = array('id' => $cart_item['id'], 'store_id' => $this->session->userdata('store_id'));
            $inventory = $this->inventory_model->get_by($where, TRUE);

            $data_inventory['qty2'] = $inventory->qty2 + $qty[$i];
            $data_inventory['qty3'] = $inventory->qty3 + $qty[$i];
            $this->inventory_model->save($data_inventory, $inventory->id);
        }

        $data_stock_update['received'] = date('Y-m-d');
        $data_stock_update['user_approve'] = $this->session->userdata('id');
        $data_stock_update['status'] = "Approve";
        $this->main_model->save($data_stock_update, $id);

        $data_result['id_stock_order'] = $id;
        header('Content-Type: application/json');
        echo json_encode($data_result);
    }

    ########################################################
    # Shipping
    ########################################################

    public function manual_shipping(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'manual_shipping/tampilan';
        $this->data['script_content'] = 'manual_shipping/script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function form_manual_shipping(){
        $this->cart->destroy();

        $this->data['logis_out'] = $this->main_model->get_new_data();
        $this->data['items'] = $this->cart->contents();

        $this->data['view_content'] = 'form_shipping/tampilan';
        $this->data['script_content'] = 'form_shipping/script';

        $this->data['css_templates'] =  $this->tampilan->datepicker()['css'] .
                                        $this->tampilan->typehead()['css'];
        $this->data['js_templates']  =  $this->tampilan->datepicker()['js'] .
                                        $this->tampilan->typehead()['js'];

        $this->load->view('template/v_base_template', $this->data);
    }

    public function add_to_cart(){
        $product = $this->input->post('product');
        if ($product) {
            $data_product = explode(' | ', $product);
            $where = array('inventory.barcode' => $data_product[0], 'name' => $data_product[1], 'store_id' => $this->session->userdata('store_id'));
            $this->db->where($where);
            $product = $this->inventory_model->get_join_product();
            if($product){
                $data = array(
                    "id" => $product[0]->inv_id,
                    "name" => $product[0]->name,
                    "barcode" => $product[0]->barcode,
                    "qty" => 1,
                    "price" => $product[0]->cost_distributor
                );
                $this->cart->insert($data);
            }

            $this->data['items'] = $this->cart->contents();
            echo $this->load->view('form_shipping/cv_chart_product', $this->data, true);
        }
    }

    public function remove_cart()
    {
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('form_shipping/cv_chart_product', $this->data, true);
    }

    public function update_cart()
    {
        $data = array(
            "rowid" => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('form_shipping/cv_chart_product', $this->data, true);
    }

    public function manual_shipping_proses(){
        $data_post = $this->main_model->array_from_post(
            array('code','status','request','mode_delivery','note','destination','user_input')
        );

        $data_post['destination'] = $this->store_model->get_id($data_post['destination']);
        $data_post['from_place'] = $this->session->userdata('store_id');
        $data_post['mode_delivery'] = 'Manual Shipping';
        $data_post['status'] = 'sending';
        $data_post['delivery'] = date('Y-m-d H:i:s');
        $data_post['estimate'] = date('Y-m-d H:i:s');
        $data_post['user_input'] = $this->session->userdata('id');
        $id_shipping = $this->main_model->save($data_post, NULL);


        $cart_item = $this->cart->contents();
        foreach ($cart_item as $item) {
            $data_post_detail['request_qty']        = $item['qty'];
            $data_post_detail['delivery_price']     = $item['price'];
            $data_post_detail['shipping_id']        = $id_shipping;
            $data_post_detail['inventory_id']       = $item['id'];

            $this->detail_model->save($data_post_detail, NULL);


            $data_store = $this->inventory_model->get($data_post_detail['inventory_id']);
            $data_save['qty2'] = $data_store->qty2 - $item['qty'];
            $data_save['qty4'] = $data_store->qty4 + $item['qty'];
            $this->inventory_model->save($data_save, $item['id']);

        }

        $data_result['id_shipping'] = $id_shipping;
        header('Content-Type: application/json');
        echo json_encode($data_result);
    }

    public function surat_jalan($id, $status = NULL){
        $this->data['logis_out'] = $this->main_model->get($id);
        $this->data['logis_out_data'] = $this->main_model->get_all($id);

        $where = array('shipping_id' => $id);
        $this->data['logis_out_detail'] = $this->detail_model->get_detail_product($where);
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'invoice/tampilan';
        $this->data['script_content'] = 'invoice/script';

        $this->data['css_templates'] = NULL;
        $this->data['js_templates'] = NULL;

        $this->load->view('template/v_base_template', $this->data);
    }

    public function approve($id){
        $this->data['logis_out'] = $this->main_model->get_list_logis_out($id, TRUE);
        $this->data['logis_out']->from = $this->data['logis_out']->from_name;

        $where = array("shipping_id" => $id);
        $this->db->where($where);
        $products = $this->detail_model->get_detail_product();

        $this->cart->destroy();

        foreach ($products as $product){
            $data = array(
                "id" => $product->inventory_id,
                "name" => $product->name,
                "barcode" => $product->barcode,
                "qty" => $product->request_qty,
                "request_qty" => $product->request_qty,
                "price" => $product->delivery_price,
                "shipping_id" => $product->shipping_id
            );
            $this->cart->insert($data);
        }
        $this->data['items'] = $this->cart->contents();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'approve/tampilan';
        $this->data['script_content'] = 'approve/script';

        $this->data['css_templates'] = NULL;
        $this->data['js_templates'] = NULL;

        $this->load->view('template/v_base_template', $this->data);
    }
    
    ##################################################################
    # File PDT
    ##################################################################
    public function add_to_cart_file(){
        $product = $this->input->post('barcode');
        $qty = $this->input->post('qty');
        if ($product) {
            $where = array('inventory.barcode' => $product, 'store_id' => $this->session->userdata('store_id'));
            
            $this->db->where($where);
            $product = $this->inventory_model->get_join_product();
            if($product){
                $data = array(
                    "id" => $product[0]->inv_id,
                    "name" => $product[0]->name,
                    "barcode" => $product[0]->barcode,
                    "qty" => $qty,
                    "price" => $product[0]->cost_distributor
                );
                $this->cart->insert($data);
            }
        }
        
        $this->data['items'] = $this->cart->contents();
            echo $this->load->view('form_shipping/cv_chart_product', $this->data, true);
    }
    
    ##################################################################
    # Rekap Surat Jalan
    ##################################################################
    public function rekap_surat_jalan(){
        
        $format = $this->input->get('optionyes');
        if(!$format){
            $format = 'all';
        }
        
        if($format == 'daily'){
            $this->db->where('shipping.from_place = "'. $this->session->userdata('store_id') .'"');
            $this->db->where('DATE(shipping.created) = "'. date('Y-m-d') .'"');
            $this->data['judul_rekap'] = "Daily Shipping";
            $this->data['sub_judul_rekap'] = date('Y-m-d');
        }elseif($format == 'date'){
            $this->db->where('shipping.from_place = "'. $this->session->userdata('store_id') .'"');
            $this->db->where('DATE(shipping.created) = "'. $this->input->get('from') .'"');
            $this->data['judul_rekap'] = "Shipping";
            $this->data['sub_judul_rekap'] = date('Y-m-d');
        }elseif($format == 'destination'){
            $toko = $this->store_model->get_id($this->input->get('store'));
            $this->data['judul_rekap'] = "Shipping";
            $this->data['sub_judul_rekap'] = $this->store_model->get_name($this->input->get('store'));
            $this->db->where('shipping.destination = "'. $toko .'"');
           
        }elseif($format == 'all'){
            $this->db->where('shipping.from_place = "'. $this->session->userdata('store_id') .'"');
            $this->data['judul_rekap'] = "Shipping";
            $this->data['sub_judul_rekap'] = "All Data";
        }
        $this->db->group_by('`shipping`.`id`');
        
            $this->db->where('shipping.from_place = "'. $this->session->userdata('store_id') .'"');
        $this->data['logis_out'] = $this->main_model->get_rekap();
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'invoice/rekap_surat_jalan';
        $this->data['script_content'] = 'invoice/rekap_surat_jalan_script';

        $this->data['css_templates'] = $this->tampilan->datepicker()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates'] = $this->tampilan->datepicker()['js'] .
            $this->tampilan->typehead()['js'];

        $this->load->view('template/v_base_template', $this->data);
    }
}