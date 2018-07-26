<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 12:56 PM
 */

class Logis_in extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
        $this->load->model('m_logis_in', 'main_model');
        $this->load->model('m_logis_in_detail', 'detail_model');
        $this->load->model('m_inventory', 'inventory_model');
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
        $this->cart->destroy();

        $this->data['logis_in'] = $this->main_model->get($id);
        $where = array("stock_order_id" => $id);
        $products = $this->detail_model->get_by($where);

        foreach ($products as $product){
            $data = array(
                "id" => $product->id_cart,
                "id_inv" => $product->id_inv,
                "name" => $product->name,
                "barcode" => $product->barcode,
                "qty" => $product->request_qty,
                "request_qty" => $product->request_qty,
                "send_qty" => $product->send_qty,
                "price" => $product->cost_supplier
            );
            $this->cart->insert($data);
        }
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
        echo $this->load->view('manual_logis_in/cv_chart_product', $this->data, true);
    }

    public function proses($status = NULL, $id = NULL){
        $data_post['status'] = $status;
        $data_post['received_at'] = date('Ymd');
        $data_post['user_approve'] = $this->session->userdata('id');
        $id_shipping = $this->main_model->save($data_post, $id);


        foreach ($this->cart->contents() as $items) {
            $data_detail['received_qty'] = $items["qty"];

            $this->detail_model->save($data_detail, $items['id']);

            $data_inv = $this->inventory_model->get($items['id_inv']);
            $new_inv['qty1'] = $data_inv->qty1 + $items["qty"];
            $this->inventory_model->save($new_inv, $data_inv->id);
        }


    }
}