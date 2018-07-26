<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 4:00 AM
 */

class Sales_draft extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_sales_draft', 'main_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function get_data(){
        header('Content-Type: application/json');
        $data['data'] = $this->main_model->get();
        echo json_encode($data);
    }

    public function delete_single(){
        $id = $this->input->get('id');
        $this->main_model->delete($id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('sales_draft', 'refresh');
    }

    public function delete_selected(){
        $ids = $this->input->post('id');
        foreach ($ids as $id){
            $this->main_model->delete($id);
        }

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('sales_draft', 'refresh');
    }
}