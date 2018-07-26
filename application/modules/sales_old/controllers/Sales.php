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
        $this->load->model('m_sales','main_model');
        $this->load->model('m_sales_detail','detail_model');
    }

    // ------------------------------------------------------------------------

    public function index($id = NULL){
        $this->cart->destroy();

        if($id){
            $this->data['sale'] = $this->main_model->get($id);
        }else {
            $this->data['sale'] = $this->main_model->get_new_data();
        }

        $this->data['items'] = $this->cart->contents();

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->chart()['css'] ;
        $this->data['js_templates'] = $this->tampilan->chart()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    // ------------------------------------------------------------------------

    public function add_to_cart(){
        $data = array(
            "id"  => rand(1,10),
            "name"  => "Name Product",
            "qty"  => 1,
            "price"  => 2000,
            "sc" => NULL,
            "disc" => 0,
            "after_disc" => 2000
        );
        $this->cart->insert($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_element', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function remove_cart()
    {
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid'  => $row_id,
            'qty'  => 0
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_element', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function update_cart(){
        $data = array(
            "rowid"  => $_POST["row_id"],
            $_POST["field"] => $_POST["value"]
        );
        $this->cart->update($data);

        $this->data['items'] = $this->cart->contents();
        echo $this->load->view('cv_chart_element', $this->data, true);
    }

    // ------------------------------------------------------------------------

    public function total_cart(){
        $total = 0;
        foreach ($this->cart->contents() as $items) {
            $total += kalkulasi_sub_total_item($items);
        }
        echo to_rupiah($total);
    }

    public function process_sales($status = NULL, $id = NULL){
        $data_post = $this->main_model->array_from_post(array('code','status','sub_total','tax','special_discount','note'));
        $data_post['status'] = $status;
        $data_post['sub_total'] = explode(',', to_angka($data_post['sub_total']))[0];
        $data_post['special_discount'] = $data_post['special_discount'];
        $data_post['tax']    = 0;
        $this->main_model->save($data_post, $id);

        foreach ($this->cart->contents() as $items){
            $data_detail['qty'] = $items['qty'];
            $data_detail['disc'] = $items['disc'];
            $data_detail['sc'] = $items['sc'];
            $data_detail['price'] = $items['price'];
            $this->detail_model->save($data_detail, NULL);
        }

        print_r($_POST);
    }

    public function add_member(){
        echo $this->load->view('cv_member_element', $this->data, true);
    }
}