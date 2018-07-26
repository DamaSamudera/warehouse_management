<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/1/2018
 * Time: 8:24 AM
 */

class Customers extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_customers', 'main_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] = $this->tampilan->datatable()['css'] ;
        $this->data['js_templates'] = $this->tampilan->datatable()['js'] ;
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action_form($id = NULL){
        if($id){
            $this->data['customer']           = $this->main_model->get($id);
        }else {
            $this->data['customer']           = $this->main_model->get_new_data();
        }

        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base_form';
        $this->data['script_content'] = 'v_script_form';

        $this->data['css_templates'] = $this->tampilan->formwizard()['css'];
        $this->data['js_templates'] = $this->tampilan->formwizard()['js'];
        $this->load->view('template/v_base_template', $this->data);
    }

    public function action($id = NULL){
        $data_post = $this->main_model->array_from_post(array('code', 'name', 'phone', 'handphone', 'address', 'area','email', 'point'));
        $this->main_model->save($data_post, $id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('customers', 'refresh');
    }

    public function get_data($status = NULL)
    {
        header('Content-Type: application/json');
        if($status){
            $where = array();
            if($status == 'active'){
                $where = array("is_active" => 'checked');
            }else{
                $where = array("is_active" => '');
            }
            $data['data'] = $this->main_model->get_by($where);
        }else {
            $data['data'] = $this->main_model->get();
        }
        echo json_encode($data);
    }

    public function delete_single(){
        $id = $this->input->get('id');
        $this->main_model->delete($id);

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('customers', 'refresh');
    }

    public function delete_selected(){
        $ids = $this->input->post('id');
        foreach ($ids as $id){
            $this->main_model->delete($id);
        }

        $this->session->set_flashdata('message_status', '<div class="col-md-12"><div class="pgn push-on-sidebar-open pgn-bar"><div class="alert alert-info"><div class="container"><span>This notification looks so perfect!</span><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div></div></div></div>');
        redirect('customers', 'refresh');
    }
}