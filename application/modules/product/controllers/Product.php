<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 7:40 PM
 */

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_upload_product', 'product_upload_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'list_product/tampilan';
        $this->data['script_content'] = 'list_product/script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'];
        $this->data['js_templates']  = $this->tampilan->datatable()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }
    
    public function upload_file() {
        $config['upload_path']      = './assets/product';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '1000000';
        $config['overwrite']        = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();
			$path = base_url("assets/product/" . $data['raw_name'] . $data['file_ext']);

			//Compress Image
			$conf['image_library'] = 'gd2';
			$conf['source_image'] = './assets/product/' . $data['file_name'];
			$conf['create_thumb'] = FALSE;
			$conf['maintain_ratio'] = FALSE;
			$conf['quality'] = '60%';
			$conf['width'] = 640;
			$conf['height'] = 640;
			$conf['new_image'] = './assets/product/' . $data['file_name'];
			$this->load->library('image_lib', $conf);
			$this->image_lib->resize();
				
            $data_save['file'] = file_get_contents($data['full_path']);
            $data_save['path'] = $path;
            $this->product_upload_model->save($data_save, NULL);
            
            // $data = $this->upload->data();
            // $data_save['file'] = file_get_contents($data['full_path']);
            // $data_save['path'] = base_url('assets/product/') . $data['file_name'];
            // $this->product_upload_model->save($data_save, NULL);
        }
    }

}