<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 5:15 PM
 */

class Logis_in extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("cart");

        $this->load->model('logis_in_m','main_model');
        $this->load->model('logis_in_detail_m','detail_model');
        $this->load->model('inventory_m','inventory_model');
        $this->load->model('supplier_m','supplier_model');
        $this->load->model('product_m','product_model');
        $this->load->model('category_m','category_model');
        $this->load->model('m_upload_product', 'product_upload_model');
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
            $stock_order_detail = $cart_item['stock_order_id'];

            $data_detail_update['received_qty'] = $qty[$i];
            $this->detail_model->save($data_detail_update, $stock_order_detail);

            $where = array('product_id' => $cart_item['id'], 'store_id' => $this->session->userdata('store_id'));
            $inventory = $this->inventory_model->get_by($where, TRUE);

            $data_inventory['qty2'] = $inventory->qty2 + $qty[$i];
            $data_inventory['qty3'] = $inventory->qty3 + $qty[$i];
            $this->inventory_model->save($data_inventory, $inventory->id);
        }

        $data_stock_update['received'] = date('Y-m-d');
        $data_stock_update['user_approve'] = 1;
        $data_stock_update['status'] = "Approve";
        $this->main_model->save($data_stock_update, $id);

        $data_result['id_stock_order'] = $id;
        header('Content-Type: application/json');
        echo json_encode($data_result);
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'list_logis_in/tampilan';
        $this->data['script_content'] = 'list_logis_in/script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }
    
    public function daily_logis(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'daily_logis_in/tampilan';
        $this->data['script_content'] = 'daily_logis_in/script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function approve($id){
        $this->data['logis_in'] = $this->main_model->get_list_logis_in($id, TRUE);
        $this->data['logis_in']->from = ($this->data['logis_in']->supplier_id) ? $this->data['logis_in']->supplier : $this->data['logis_in']->from_name;

        $where = array("stock_order_id" => $id);
        $this->db->where($where);
        $products = $this->detail_model->get_detail_product();

        $this->cart->destroy();

        foreach ($products as $product){
            $data = array(
                "id" => $product->product_id,
                "name" => $product->name,
                "barcode" => $product->barcode,
                "qty" => $product->request_qty,
                "request_qty" => $product->request_qty,
                "price" => $product->supply_price,
                "stock_order_id" => $product->id
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

    ######################################################################################

    public function input($status = NULL){

        if(!$status){
            $this->cart->destroy();
        }

        #======================== TEMPLATE ==========================#
        $this->data['logis_in'] = $this->main_model->get_new_data();
        $this->data['items'] = $this->cart->contents();

        $this->data['view_content'] = 'input_data/tampilan';
        $this->data['script_content'] = 'input_data/script';

        $this->data['css_templates'] = $this->tampilan->typehead()['css'];
        $this->data['js_templates']  = $this->tampilan->typehead()['js'];

        $this->load->view('template/v_base_template', $this->data);
    }

    public function product_action_form(){

        $this->data['product'] = $this->product_model->get_new_data();
        $this->data['product_inventory'] = $this->inventory_model->get_new_data();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'product/tampilan';
        $this->data['script_content'] = 'product/script';

        $this->data['css_templates'] = $this->tampilan->formwizard()['css'] .
            $this->tampilan->upload()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates'] = $this->tampilan->formwizard()['js'] .
            $this->tampilan->upload()['js'] .
            $this->tampilan->typehead()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function product_process(){
            # Product data
            $data_post = $this->product_model->array_from_post(
                array('name', 'barcode', 'description', 'is_active', 'is_delete',
                    'supplier_id', 'category_id'
                )
            );

            $data_post['is_active'] = ($data_post['is_active']) ? 'checked' : '';
            $data_post['is_delete'] = ($data_post['is_delete']) ? 'checked' : '';

            $data_post['supplier_id']     = $this->supplier_model->get_id($data_post['supplier_id']);
            $data_post['category_id']     = $this->category_model->get_id($data_post['category_id']);
            
            if($this->product_upload_model->get()) {
                $data_post['file'] = $this->product_upload_model->get()[0]->file;
                $data_post['path'] = $this->product_upload_model->get()[0]->path;
            }

            $id_product = $this->product_model->save($data_post, NULL);
            
            $this->product_upload_model->delete_all();

            # Inventory data
            $inventory = $this->inventory_model->get_join_product(array("product_id" => $id_product), TRUE);
            $id_inventory = ($inventory) ? $inventory->inv_id : NULL;
            $data_post_inventory = $this->inventory_model->array_from_post(
                array('sale1', 'sale2', 'sale3', 'cost1', 'cost2',
                    'cost_supplier', 'cost_distributor', 'qty1', 'qty2',
                    'qty3', 'qty4', 'qty5', 'qty_limit', 'location',
                    'product_id', 'store_id'
                )
            );

            $data_post_inventory['store_id'] = $this->session->userdata('store_id');
            $data_post_inventory['sale1_cd'] = to_sumberwang($data_post_inventory['sale1']);
            $data_post_inventory['sale2_cd'] = to_sumberwang($data_post_inventory['sale2']);
            $data_post_inventory['sale3_cd'] = to_sumberwang($data_post_inventory['sale3']);
            $data_post_inventory['cost1_cd'] = to_sumberwang($data_post_inventory['cost1']);
            $data_post_inventory['cost2_cd'] = to_sumberwang($data_post_inventory['cost2']);
            $data_post_inventory['cost_supplier_cd'] = to_sumberwang($data_post_inventory['cost_supplier']);
            $data_post_inventory['cost_distributor_cd'] = to_sumberwang($data_post_inventory['cost_distributor']);

            $data_post_inventory['barcode'] = $data_post['barcode'];
            $data_post_inventory['is_active'] = ($data_post['is_active']) ? 'checked' : '';
            $data_post_inventory['is_delete'] = ($data_post['is_delete']) ? 'checked' : '';
            $data_post_inventory['product_id'] = $id_product;
            $data_post_inventory['store_id'] = $data_post_inventory['store_id'];
            $this->inventory_model->save($data_post_inventory, $id_inventory);

            $data_cart = array(
                "id" => $id_product,
                "name" => $data_post['name'],
                "barcode" => $data_post['barcode'],
                "qty" => $data_post_inventory['qty1'],
                "price" => $data_post_inventory['cost_supplier']
            );
            $this->cart->insert($data_cart);

            redirect("logis_in/input/add");

    }

    public function input_order_proses(){
        $data_post = $this->main_model->array_from_post(
            array('code','faktur_supplier','description','supplier_id')
        );

        $data_result['supplier_id'] = $data_post['supplier_id'];

        $data_post['supplier_id'] = $this->supplier_model->get_id($data_post['supplier_id']);
        $data_post['status'] = "Pending";
        $data_post['received'] = date('Y-m-d');
        $data_post['request'] = date('Y-m-d');;
        $data_post['destination'] = $this->session->userdata('store_id');
        $data_post['from_place'] = $this->session->userdata('store_id');
        $data_post['is_delete'] = "";
        $data_post['user_input'] = $this->session->userdata('id');

        $id_stock_order = $this->main_model->save($data_post, NULL);

        $cart_item = $this->cart->contents();
        foreach ($cart_item as $item) {
            $data_post_detail['request_qty']    = $item['qty'];
            $data_post_detail['supply_price']   = $item['price'];
            $data_post_detail['stock_order_id'] = $id_stock_order;
            $data_post_detail['product_id']     = $item['id'];

            $this->detail_model->save($data_post_detail, NULL);
        }

        $data_result['id_stock_order'] = $id_stock_order;
        header('Content-Type: application/json');
        echo json_encode($data_result);
    }

    #######################################################################################

    public function repeate_order(){
        $this->cart->destroy();

        $this->data['logis_in'] = $this->main_model->get_new_data();
        $this->data['items'] = $this->cart->contents();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'repeat_order/tampilan';
        $this->data['script_content'] = 'repeat_order/script';

        $this->data['css_templates'] = $this->tampilan->typehead()['css'];
        $this->data['js_templates']  = $this->tampilan->typehead()['js'];

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
                "id" => $product[0]->product_id,
                "name" => $product[0]->name,
                "barcode" => $product[0]->barcode,
                "qty" => 1,
                "price" => $product[0]->cost_supplier
            );
            $this->cart->insert($data);
        }

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('repeat_order/cv_chart_product', $this->data, true);
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
        echo $this->load->view('repeat_order/cv_chart_product', $this->data, true);
    }

    public function update_cart()
    {
        $data = array(
            "rowid" => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('repeat_order/cv_chart_product', $this->data, true);
    }

    public function repeate_order_proses(){
        $data_post = $this->main_model->array_from_post(
            array('code','faktur_supplier','description','supplier_id')
        );

        $data_post['supplier_id'] = $this->supplier_model->get_id($data_post['supplier_id']);
        $data_post['status'] = "Repeat";
        $data_post['received'] = date('Y-m-d');
        $data_post['request'] = date('Y-m-d');
        $data_post['destination'] = $this->session->userdata('store_id');
        $data_post['from_place'] = $this->session->userdata('store_id');
        $data_post['is_delete'] = "";
        $data_post['user_input'] = $this->session->userdata('id');

        $id_stock_order = $this->main_model->save($data_post, NULL);

        $cart_item = $this->cart->contents();
        foreach ($cart_item as $item) {
            $data_post_detail['request_qty']    = $item['qty'];
            $data_post_detail['supply_price']   = $item['price'];
            $data_post_detail['stock_order_id'] = $id_stock_order;
            $data_post_detail['product_id']     = $item['id'];

            $this->detail_model->save($data_post_detail, NULL);
        }

        $data_result['id_stock_order'] = $id_stock_order;
        header('Content-Type: application/json');
        echo json_encode($data_result);
    }

    public function surat_jalan($id, $status = NULL){
        $this->data['logis_in'] = $this->main_model->get($id);
        $this->data['logis_in_data'] = $this->main_model->get_list_logis_in($id);
        $this->db->where(array('stock_order_id' => $id));
        $this->data['logis_in_detail'] = $this->detail_model->get_detail_product();
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'invoice/tampilan';
        $this->data['script_content'] = 'invoice/script';

        $this->data['css_templates'] = NULL;
        $this->data['js_templates'] = NULL;

        $this->load->view('template/v_base_template', $this->data);
    }
    
    ##################################################################
    # Rekap Surat Jalan
    ##################################################################
    public function rekap_purchase_order(){
        
        $format = $this->input->get('optionyes');
        if(!$format){
            $format = 'all';
        }
        
        if($format == 'daily'){
            $this->db->where('DATE(stock_order.created) = "'. date('Y-m-d') .'"');
            $this->data['judul_rekap'] = "Daily Purchase Order";
            $this->data['sub_judul_rekap'] = date('Y-m-d');
        }elseif($format == 'date'){
            $this->db->where('DATE(stock_order.created) = "'. $this->input->get('from') .'"');
            $this->data['judul_rekap'] = "Purchase Order";
            $this->data['sub_judul_rekap'] = date('Y-m-d');
        }elseif($format == 'destination'){
            $toko = $this->supplier_model->get_id($this->input->get('store'));
            $this->data['judul_rekap'] = "Purchase Order";
            $this->data['sub_judul_rekap'] = $this->supplier_model->get_name($this->input->get('store'));
            $this->db->where('stock_order.supplier_id = "'. $toko .'"');
           
        }elseif($format == 'all'){

            $this->data['judul_rekap'] = "Purchase Order";
            $this->data['sub_judul_rekap'] = "All Data";
        }
        $this->db->group_by('`stock_order`.`id`');
        $this->db->where('stock_order.status = "Approve"');
        $this->db->where('stock_order.destination = "'. $this->session->userdata('store_id') .'"');
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