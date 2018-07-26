<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/29/2018
 * Time: 2:04 AM
 */

require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('logis_out_m','main_model');
        $this->load->model('logis_out_detail_m','detail_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function save_shipping_post(){
        $id = $this->get('id');

        $data_post = $this->main_model->array_from_post(
            array('code','status','request','delivery','received','mode_delivery','estimate','note','from_place','destination','user_input','user_approve','is_delete')
        );

        $shipping_id = $this->main_model->save($data_post, $id);

        for ($i = 1; $i < 5; $i++){
            $data_post_detail['request_qty']    = $i;
            $data_post_detail['received_qty']   = $i;
            $data_post_detail['delivery_price']   = $i;
            $data_post_detail['order_price']    = $i;
            $data_post_detail['shipping_id'] = $shipping_id;
            $data_post_detail['inventory_id']     = $i;

            $this->detail_model->save($data_post_detail, NULL);
        }

        $message = [
            'data_logis_out' => $data_post,
            'message' => 'Menambahkan data logistic in'
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function my_shipping_get()
    {
        // get parameter id jika ada
        $id = $this->get('id');
        $this->db->where('destination', $this->session->userdata('store_id'));
        $shippings['data'] = $this->main_model->get_all($id);
        // If the id parameter doesn't exist return all the users
        if ($id == NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($shippings) {
                // Set the response and exit
                $this->response($shippings, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $data['data'] = null;
                $this->response($data, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        $id = (int)$id;
        // Validate the id.
        if ($id <= 0) {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.
        $shipping = NULL;
        if (!empty($shippings['data'])) {
            if (isset($shippings['data']->id) && $shippings['data']->id == $id) {
                $shipping = $shippings;
            }
        }

        if (!empty($shipping)) {
            $this->set_response($shipping, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Barang tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function shipping_all_get()
    {
        // get parameter id jika ada
        $id = $this->get('id');

        $shippings['data'] = $this->main_model->get_all($id);
        // If the id parameter doesn't exist return all the users
        if ($id == NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($shippings) {
                // Set the response and exit
                $this->response($shippings, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $data['data'] = null;
                $this->response($data, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        $id = (int)$id;
        // Validate the id.
        if ($id <= 0) {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.
        $shipping = NULL;
        if (!empty($shippings['data'])) {
            if (isset($shippings['data']->id) && $shippings['data']->id == $id) {
                $shipping = $shippings;
            }
        }

        if (!empty($shipping)) {
            $this->set_response($shipping, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Barang tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function shipping_detail_post()
    {
        // get parameter id jika ada
        $id = $this->post('inventory');
        $where = array('shipping_id' => $id);
        $shippings['data'] = $this->detail_model->get_detail_product($where);
        // If the id parameter doesn't exist return all the users
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($shippings) {
                // Set the response and exit
                $this->response($shippings, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $data['data'] = null;
                $this->response($data, REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
        }
}