<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/10/2018
 * Time: 5:36 PM
 */

class Shipping extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("cart");
        $this->load->model('m_shipping', 'main_model');
        $this->load->model('m_shipping_detail', 'detail_model');
        $this->load->model('m_store', 'store_model');
        $this->load->model('m_inventory', 'inventory_model');
    }

    public function index()
    {
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates'] = $this->tampilan->datatable()['js'];
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
        $this->data['view_content'] = 'manual_shipping/v_base_form';
        $this->data['script_content'] = 'manual_shipping/v_script_form';

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
        $data = array(
            "id" => 23,
            "name" => "Name Product",
            "qty" => 1,
            "price" => 2000,
            "sc" => NULL,
            "disc" => 0,
            "after_disc" => 2000
        );
        $this->cart->insert($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('manual_shipping/cv_chart_product', $this->data, true);
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
        echo $this->load->view('manual_shipping/cv_chart_product', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function process($status = NULL, $id = NULL)
    {
        $data_post = $this->main_model->array_from_post(array('code', 'n_store_id', 'estimate', 'note', 'type', 'n_employee_id_cek', 'status'));
        $data_post['n_store_id'] = $this->store_model->get_id($data_post['n_store_id']);
        $data_post['type'] = $status;
        $data_post['status'] = 'sending';
        $data_post['delivery'] = date('Y-m-d H:i:s');;
        $data_post['n_employee_id_cek'] = $this->session->userdata('id');
        $id_shipping = $this->main_model->save($data_post, $id);


        foreach ($this->cart->contents() as $items) {
            $data_detail['n_shipping_id'] = $id_shipping;
            $data_detail['qty'] = $items["qty"];
            $data_detail['n_inventory_id'] = $items["id"];

            $this->detail_model->save($data_detail, NULL);
        }
    }

    public function get_list_store()
    {
        header('Content-Type: application/json');
        $where = $this->input->get('query');
        $result = $this->store_model->get_list_store($where);
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
        $where = array("from_n_store_id" => $this->session->userdata('n_store_id'));
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