<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 3:43 AM
 */

class Sales extends MY_Controller
{

    // ------------------------------------------------------------------------

    function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
        $this->load->model('m_sales', 'main_model');
        $this->load->model('m_sales_detail', 'detail_model');
        $this->load->model('m_inventory', 'inventory_model');
        $this->load->model('m_customers', 'customer_model');
    }

    // ------------------------------------------------------------------------

    public function index($id = NULL)
    {
        $this->cart->destroy();

        if ($id) {
            $this->data['sale'] = $this->main_model->get($id);
        } else {
            $this->data['sale'] = $this->main_model->get_new_data();
        }

        $this->data['items'] = $this->cart->contents();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->formwizard()['css'] .
            $this->tampilan->typehead()['css'];
        $this->data['js_templates'] = $this->tampilan->formwizard()['js'] .
            $this->tampilan->typehead()['js'];

        $this->load->view('template/v_base_template', $this->data);
    }

    // ------------------------------------------------------------------------

    public function add_to_cart()
    {
        $product = $this->input->post('product');
        if ($product) {
            $data_product = explode(' | ', $product);
            $where = array('inventory.barcode' => $data_product[0], 'name' => $data_product[1]);
            $product = $this->inventory_model->get_by($where, TRUE);
            $data = array(
                "id" => $product->id,
                "name" => $product->name,
                "qty" => 1,
                "price" => $product->sale1,
                "sc" => NULL,
                "disc" => 0,
                "after_disc" => $product->sale1
            );
            $this->cart->insert($data);
        }

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_element', $this->data, true);

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
        echo $this->load->view('cv_chart_element', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function update_cart()
    {
        $data = array(
            "rowid" => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_element', $this->data, true);
    }

    public function get_list_inventory()
    {
        header('Content-Type: application/json');
        $where = $this->input->get('query');
        $this->db->like('name', $where, 'both');
        $this->db->or_like('barcode', $where, 'both');
        $this->db->where('inventory.is_active', 'checked');
        $this->db->where('store_id', $this->session->userdata('store_id'));
        $result = $this->inventory_model->get();
        echo json_encode($result);
    }

    // ------------------------------------------------------------------------

    public function total_cart()
    {
        $total = 0;
        foreach ($this->cart->contents() as $items) {
            $total += kalkulasi_sub_total_item($items);
        }
        echo to_rupiah($total);
    }

    public function process_sales($status = NULL, $id = NULL)
    {
        $data_post = $this->main_model->array_from_post(array('code', 'status', 'sub_total', 'tax', 'special_discount', 'note', 'customer_id'));
        $data_post['status'] = $status;
        $data_post['cashier'] = $this->session->userdata('id');
        $data_post['store_id'] = $this->session->userdata('store_id');
        $data_post['sub_total'] = explode(',', to_angka($data_post['sub_total']))[0];
        $data_post['special_discount'] = $data_post['special_discount'];
        $data_post['tax'] = 0;
        $id_sales = $this->main_model->save($data_post, $id);

        foreach ($this->cart->contents() as $items) {
            $data_detail['qty'] = $items['qty'];
            $data_detail['disc'] = $items['disc'];
            $data_detail['sc'] = $items['sc'];
            $data_detail['price'] = $items['price'];
            $data_detail['sales_id'] = $id_sales;
            $data_detail['inventory_id'] = $items['id'];
            
            $this->detail_model->save($data_detail, NULL);
            
            $data_store = $this->inventory_model->get($data_detail['inventory_id']);
            $data_save['qty2'] = $data_store->qty2 - $items['qty'];
            $data_save['qty4'] = $data_store->qty4 + $items['qty'];
            $this->inventory_model->save($data_save, $data_detail['inventory_id']);
        }

        print_r($_POST);
    }

    public function add_member()
    {
        $where = array('code', $this->input->post('codemember'));
        $this->data['customer'] = $this->customer_model->get_by($where, TRUE);
        echo $this->load->view('cv_member_element', $this->data, true);
    }

    public function update_price(){
        $payment_type = $this->input->post('payment_type');
        foreach ($this->cart->contents() as $items) {
            $data_product = $this->inventory_model->get($items["id"]);
            $harga = '0';
            if($payment_type == 1){
                $harga = $data_product->sale1;
            }elseif ($payment_type == 2){
                $harga = $data_product->sale2;
            }elseif ($payment_type == 3){
                $harga = $data_product->cost_distributor;
            }

            $data = array(
                "rowid" => $items["rowid"],
                "price" => $harga
            );
            $this->cart->update($data);
        }

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_element', $this->data, true);
    }
}