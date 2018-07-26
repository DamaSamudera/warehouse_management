<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 1:14 AM
 */
require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('supplier_m', 'main_model');
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
        $suppliers = $this->main_model->get($id);
        
        $where = $this->get('query');
        if($where){
            $this->db->like('name', $where, 'both');
            $this->db->or_like('code', $where, 'both');
            $suppliers = $this->main_model->get($id);
        }

        // If the id parameter doesn't exist return all the users
        if ($id === NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($suppliers) {
                // Set the response and exit
                $this->response($suppliers, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
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
        $supplier = NULL;
        if (!empty($suppliers)) {
            if (isset($suppliers->id) && $suppliers->id == $id) {
                $supplier = $suppliers;
            }
        }

        if (!empty($supplier)) {
            $this->set_response($supplier, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Barang tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}