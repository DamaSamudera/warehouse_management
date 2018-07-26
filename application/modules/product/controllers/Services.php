<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/27/2018
 * Time: 11:09 AM
 */
require APPPATH . 'libraries/REST_Controller.php';

class Services extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->model('product_m', 'main_model');
        $this->load->model('inventory_m', 'inventory_model');
        $this->load->model('category_m', 'category_model');
        $this->load->model('m_upload_product', 'product_upload_model');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
    
    public function all_inventory_get()
    {
        // get parameter id jika ada
        $where = $this->get('query');
        $this->db->where('inventory.store_id', $this->session->userdata('store_id'));
        //$this->db->where("`name` LIKE 'BDs%' ESCAPE '!' OR `inventory`.`barcode` LIKE 'BDs%' ESCAPE '!' and `inventory`.`store_id`= '" . $this->session->userdata('store_id'). "'");
        $this->db->like('name', $where, 'both');
        $this->db->or_like('inventory.barcode', $where, 'both');
        $products = $this->inventory_model->get_join_product();
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

    // public function all_inventory_get()
    // {
    //     // get parameter id jika ada
    //     $where = $this->get('query');
    //     $this->db->like('name', $where, 'both');
    //     $this->db->or_like('inventory.barcode', $where, 'both');
    //     $products = $this->inventory_model->get_join_product();

    //     // Check if the users data store contains users (in case the database result returns NULL)
    //     if ($products) {
    //         // Set the response and exit
    //         $this->response($products, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //     } else {
    //         // Set the response and exit
    //         $this->response([
    //             'status' => FALSE,
    //             'message' => 'No users were found'
    //         ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //     }
    // }

    public function all_category_get()
    {
        // get parameter id jika ada
        $where = $this->get('query');
        $this->db->like('name', $where, 'both');
        $this->db->or_like('code', $where, 'both');
        $products = $this->category_model->get();

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

    public function id_product_post(){
        $where = $this->post('category');
        $data = $this->main_model->get_id($where);
        $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function all_get()
    {
        // get parameter id jika ada
        $id = $this->get('id');
        $status = $this->get('status');
        $this->db->select('product.id,
product.`name`,
product.barcode,
product.description,
product.path,
product.is_active,
product.is_delete,
product.created,
product.modified,
product.supplier_id,
product.category_id');
        $products['data'] = $this->main_model->get($id);

        // If the id parameter doesn't exist return all the users
        if ($id == NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($products) {
                // Set the response and exit
                $this->response($products, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
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
        $product = NULL;
        if (!empty($products)) {
            if (isset($products->id) && $products->id == $id) {
                $product = $products;
            }
        }

        if (!empty($product)) {
            $this->set_response($product, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Barang tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function save_post()
    {
        $id = $this->get('id');

        # Product data
        $data_post = $this->main_model->array_from_post(
            array('name', 'barcode', 'description', 'is_active', 'is_delete',
                'supplier_id', 'category_id'
            )
        );

        $data_post['is_active'] = ($data_post['is_active']) ? 'checked' : '';
        $data_post['is_delete'] = ($data_post['is_delete']) ? 'checked' : '';
        
        if($this->product_upload_model->get()) {
            $data_post['file'] = $this->product_upload_model->get()[0]->file;
            $data_post['path'] = $this->product_upload_model->get()[0]->path;
        }

        $id_product = $this->main_model->save($data_post, $id);

        # Inventory data
        $inventory = $this->inventory_model->get_join_product(array("product_id" => $id_product), TRUE);
        $id_inventory = ($inventory) ? $inventory->id : NULL;
        $data_post_inventory = $this->inventory_model->array_from_post(
            array('sale1', 'sale2', 'sale3', 'cost1', 'cost2',
                'cost_supplier', 'cost_distributor', 'qty1', 'qty2',
                'qty3', 'qty4', 'qty5', 'qty_limit', 'location',
                'product_id', 'store_id'
            )
        );

        $data_post_inventory['sale1_cd'] = to_sumberwang($data_post_inventory['sale1']);
        $data_post_inventory['sale2_cd'] = to_sumberwang($data_post_inventory['sale2']);
        $data_post_inventory['sale3_cd'] = to_sumberwang($data_post_inventory['sale3']);
        $data_post_inventory['cost1_cd'] = to_sumberwang($data_post_inventory['cost1']);
        $data_post_inventory['cost2_cd'] = to_sumberwang($data_post_inventory['cost2']);
        $data_post_inventory['cost_supplier_cd'] = to_sumberwang($data_post_inventory['cost_supplier']);
        $data_post_inventory['cost_distributor_cd'] = to_sumberwang($data_post_inventory['cost_distributor']);

        $data_post_inventory['barcode'] = $data_post['barcode'];
        $data_post_inventory['is_active'] = ($data_post['is_active']) ? 'checked' : '';
        $data_post_inventory['is_delete'] = ($data_post['is_delete']) ? 'checked' : '';
        $data_post_inventory['product_id'] = $id_product;
        $data_post_inventory['store_id'] = $data_post_inventory['store_id'];
        $this->inventory_model->save($data_post_inventory, $id_inventory);

        $message = [
            'id' => $id_inventory, // Automatically generated by the model
            'data_product' => $data_post,
            'data_inventory' => $data_post_inventory,
            'message' => 'Menambahkan data product dan inventory'
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function update_delete_post()
    {
        $id = $this->get('id');
        $data_post['is_delete'] = TRUE;
        $this->main_model->save($data_post, $id);
        $message = [
            'status' => TRUE,
            'message' => 'Update data product berhasil'
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    ########################################################################################
    # Add-Ons
    ########################################################################################

    public function upload_picture_product()
    {
        $config['upload_path'] = './assets/product';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000000';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $message = [
                'error' => $this->upload->display_errors(),
                'message' => 'Upload Image error'
            ];
            $this->response($message, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            $info = $this->upload->data();
            $path = base_url("assets/product/" . $info['raw_name'] . $info['file_ext']);

            //Compress Image
            $conf['image_library'] = 'gd2';
            $conf['source_image'] = './assets/product/' . $info['file_name'];
            $conf['create_thumb'] = FALSE;
            $conf['maintain_ratio'] = FALSE;
            $conf['quality'] = '60%';
            $conf['width'] = 640;
            $conf['height'] = 640;
            $conf['new_image'] = './assets/product/' . $info['file_name'];
            $this->load->library('image_lib', $conf);
            $this->image_lib->resize();

            $data_save['file'] = file_get_contents($info['full_path']);
            $data_save['path'] = $path;
            //$this->product_upload_model->save($data_save, NULL);
        }
    }
}