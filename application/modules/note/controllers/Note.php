<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 7:35 PM
 */

class Note extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_note','main_model');
    }

    function proses($id = NULL){
        $data['content'] = $this->input->post('valuenote');
        $this->main_model->save($data, $id);
    }

    function get_data(){
        $this->data['notes'] = $this->main_model->get();
        echo $this->load->view('cv_note_list', $this->data, TRUE);
    }

    function delete(){
        foreach ($_POST['note_id'] as $id) {
            $this->main_model->delete($id);
        }
    }
}