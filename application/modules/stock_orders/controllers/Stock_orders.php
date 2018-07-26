<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 12:41 PM
 */

class Stock_orders extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Ajax_pagination');
        $this->load->library("cart");

        $this->load->model('m_stock_orders', 'main_model');
        $this->load->model('m_stock_orders_detail', 'detail_model');
        $this->load->model('m_supplier', 'supplier_model');
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

    public function action_form($mode = NULL, $id = NULL)
    {
        $this->cart->destroy();
        if ($id) {
            $this->data['shipping'] = $this->main_model->get($id);
        } else {
            $this->data['shipping'] = $this->main_model->get_new_data($mode);
        }

        $this->data['items'] = $this->cart->contents();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base_form';
        $this->data['script_content'] = 'v_script_form';

        $this->data['css_templates'] = $this->tampilan->formwizard()['css'] .
            $this->tampilan->datepicker()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates'] = $this->tampilan->formwizard()['js'] .
            $this->tampilan->datepicker()['js'] .
            $this->tampilan->typehead()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    // ------------------------------------------------------------------------

    public function add_to_cart()
    {
        $product = $this->input->post('product');
        if ($product) {
            $data_product = explode(' | ', $product);
            $where = array('barcode' => $data_product[0], 'name' => $data_product[1]);
            $product = $this->inventory_model->get_by($where, TRUE);
            $data = array(
                "id" => $product->id,
                "name" => $product->name,
                "barcode" => $product->barcode,
                "qty" => 1,
                "price" => $product->cost_supplier,
                "sc" => NULL,
                "disc" => 0,
                "after_disc" => $product->sale1
            );
            $this->cart->insert($data);
        }

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_product', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function remove_cart()
    {
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_product', $this->data, true);
    }
    
    public function update_cart()
    {
        $data = array(
            "rowid" => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_product', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function process($status = NULL, $id = NULL)
    {
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
    }

    public function get_list_supplier()
    {
        header('Content-Type: application/json');
        $where = $this->input->get('query');
        $result = $this->supplier_model->get_list_supplier($where);
        echo json_encode($result);
    }

    public function get_list_inventory()
    {
        header('Content-Type: application/json');
        $where = $this->input->get('query');
        $this->db->like('name', $where, 'both');
        $this->db->or_like('code', $where, 'both');
        $this->db->where('n_inventory.is_active', 'checked');
        $this->db->where('n_store_id', $this->session->userdata('n_store_id'));
        $result = $this->inventory_model->get();
        echo json_encode($result);
    }

    public function get_data()
    {
        header('Content-Type: application/json');
        $where = array("from_place" => $this->session->userdata('n_store_id'));
        $data['data'] = $this->main_model->get_by($where);
        echo json_encode($data);
    }

    // ------------------------------------------------------------------------

    public function complete()
    {
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'complete_shipping/v_base';
        $this->data['script_content'] = 'complete_shipping/v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates'] = $this->tampilan->datatable()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }
}