<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/29/2018
 * Time: 11:29 AM
 */

require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('store_m','main_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function all_get()
    {
        // get parameter id jika ada
        $id = $this->get('id');

        $stores['data'] = $this->main_model->get($id);
        // If the id parameter doesn't exist return all the users
        if ($id == NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($stores) {
                // Set the response and exit
                $this->response($stores, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
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
        $store = NULL;
        if (!empty($stores['data'])) {
            if (isset($stores['data']->id) && $stores['data']->id == $id) {
                $store = $stores;
            }
        }

        if (!empty($store)) {
            $this->set_response($store, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Barang tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function all_store_get()
    {
        // get parameter id jika ada
        $where = $this->get('query');
        $this->db->like('name', $where, 'both');
        $this->db->or_like('code', $where, 'both');
        $products = $this->main_model->get_list_store();

        // Check if the users data store contains users (in case the database result returns NULL)
        if ($products) {
            // Set the response and exit
            $this->response($products, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}