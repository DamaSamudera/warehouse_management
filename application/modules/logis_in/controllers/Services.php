<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 5:15 PM
 */
require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('logis_in_m', 'main_model');
        $this->load->model('logis_in_detail_m', 'detail_model');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function all_logis_in_get(){
        // get parameter id jika ada
        $where = $this->get('query');
        $this->db->where('destination', $this->session->userdata('store_id'));
        $logis_ins['data'] = $this->main_model->get_list_logis_in();

        // Check if the users data store contains users (in case the database result returns NULL)
        if ($logis_ins) {
            // Set the response and exit
            $this->response($logis_ins, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    
    public function daily_logis_in_get(){
        // get parameter id jika ada
        $where = $this->get('query');
        $this->db->where('destination', $this->session->userdata('store_id'));
        $this->db->where('DATE(stock_order.created)', date('Y-m-d'));
        $logis_ins['data'] = $this->main_model->get_list_logis_in();

        // Check if the users data store contains users (in case the database result returns NULL)
        if ($logis_ins) {
            // Set the response and exit
            $this->response($logis_ins, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function detail_logis_in_post(){
        // get parameter id jika ada
        $where = $this->post('inventory');
        $this->db->where('stock_order_id', $where);
        $logis_ins = $this->detail_model->get_detail_product();

        // Check if the users data store contains users (in case the database result returns NULL)
        if ($logis_ins) {
            // Set the response and exit
            $this->response($logis_ins, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function save_post(){
        $id = $this->get('id');

        # Product data
        $data_post = $this->main_model->array_from_post(
            array('code','request','received','status','faktur_supplier','description','from_place','destination','user_input','user_approve','is_delete','supplier_id')
        );

        $logis_in_id = $this->main_model->save($data_post, $id);

        for ($i = 1; $i < 5; $i++){
            $data_post_detail['request_qty']    = $i;
            $data_post_detail['received_qty']   = $i;
            $data_post_detail['supply_price']   = $i;
            $data_post_detail['order_price']    = $i;
            $data_post_detail['stock_order_id'] = $logis_in_id;
            $data_post_detail['product_id']     = $i;

            $this->detail_model->save($data_post_detail, NULL);
        }

        $message = [
            'data_logis_in' => $data_post,
            'message' => 'Menambahkan data logistic in'
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

}