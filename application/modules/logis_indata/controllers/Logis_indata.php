<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 12:56 PM
 */

class Logis_indata extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
        $this->load->model('m_logis_indata', 'main_model');
        $this->load->model('m_logis_indata_detail', 'detail_model');
        $this->load->model('m_inventory', 'inventory_model');
        $this->load->model('m_supplier', 'supplier_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action_form($id = NULL)
    {
        //$this->cart->destroy();

        $this->data['logis_in'] = $this->data['shipping'] = $this->main_model->get_new_data();
        $where = array("stock_order_id" => $id);
        $products = $this->detail_model->get_by($where);

//        foreach ($products as $product){
//            $data = array(
//                "id" => $product->id_cart,
//                "id_inv" => $product->id_inv,
//                "name" => $product->name,
//                "barcode" => $product->barcode,
//                "qty" => $product->request_qty,
//                "request_qty" => $product->request_qty,
//                "send_qty" => $product->send_qty,
//                "price" => $product->cost_supplier
//            );
//            $this->cart->insert($data);
//        }
        $this->data['items'] = $this->cart->contents();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'manual_logis_in/v_base_form';
        $this->data['script_content'] = 'manual_logis_in/v_script_form';

        $this->data['css_templates'] = $this->tampilan->formwizard()['css'] .
            $this->tampilan->datepicker()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates'] = $this->tampilan->formwizard()['js'] .
            $this->tampilan->datepicker()['js'] .
            $this->tampilan->typehead()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function get_data()
    {
        header('Content-Type: application/json');
        $where = array("destination" => $this->session->userdata('n_store_id'));
        $data['data'] = $this->main_model->get_by($where);
        echo json_encode($data);
    }

    public function update_cart()
    {
        $data = array(
            "rowid" => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('manual_logis_indata/cv_chart_product', $this->data, true);
    }

    public function proses($status = NULL, $id = NULL){
        $data_post = $this->main_model->array_from_post(array('code', 'order_id_supplier', 'created','faktur_supplier', 'description','destination', 'user_request', 'status'));
        $data_post['order_id_supplier'] = $this->supplier_model->get_id($_POST['order_id_supplier']);
        $data_post['status'] = "stock order";
        $data_post['destination'] = $this->session->userdata('n_store_id');
        $data_post['from_place'] = $this->session->userdata('n_store_id');
        $data_post['user_request'] = $this->session->userdata('id');
        $id_shipping = $this->main_model->save($data_post, NULL);


        foreach ($this->cart->contents() as $items) {
            $data_detail['stock_order_id'] = $id_shipping;
            $data_detail['request_qty'] = $items["qty"];
            $data_detail['product_id'] = $items["id"];
            $data_detail['supply_price'] = $items["price"];

            $this->detail_model->save($data_detail, NULL);
        }
        print_r($id_shipping);

    }
}