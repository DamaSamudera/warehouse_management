<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/10/2018
 * Time: 11:48 PM
 */

class Notification extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function save(){
        $where_warehouse['for_warehouse'] = $this->input->post("id_warehouse");
        $data_user_warehouse = $this->main_model->get_list_user($where_warehouse);
        $status = '';
        switch ($this->input->post("id_warehouse")){
            case 0:
                $status = "Proses";
                break;
            case 1:
                $status = "Shipping";
                break;
            case 2:
                $status = "Complete";
                break;
        }

        $type = $this->input->post("type");

        foreach ($data_user_warehouse as $user_warehouse) {
            $data['content'] = "Order dengan code <a href='" . base_url() . "'>" . $this->input->post("content") . " sudah masuk status " . $status;
            $data['for_user'] = $user_warehouse->id;
            $data['type'] = $type;
            $this->main_model->save($data, NULL);
        }


        $where_store['for_store'] = $this->input->post("id_store");
        $data_user_store = $this->main_model->get_list_user($where_store);

        foreach ($data_user_store as $user_store) {
            $data['content'] = "Order dengan code <a href='" . base_url() . "'>" . $this->input->post("content") . " sudah masuk status " . $status;
            $data['for_user'] = $user_store->id;
            $this->main_model->save($data, NULL);
        }

        $data_content['type'] = ($type == 1) ? "Order" : "Sales";
        $data_content['content']  = $data['content'];
        $data_content['tanggal']  = date('Y-m-d H:i:s');

        echo $this->load->view("notification/c_list_notification", $data_content);

    }

    function get_data(){
        if($this->session->userdata('for_store')) {
            $id  = $this->session->userdata('for_store');
        }else{
            $id  = $this->session->userdata('for_warehouse');
        }

        $data = $this->main_model->get_by(array("for_user"=>$id));
        foreach ($data as $d) {
            $data_content['type'] = ($d->type == 1) ? "Order" : "Sales";
            $data_content['content']  = $d->content;
            $data_content['tanggal']  = $d->modified;

            echo $this->load->view("notification/c_list_notification", $data_content);
        }
    }

    function send_notification(){
        $pusher = $this->ci_pusher->get_pusher();

        // Set message
        $data['message'] = 'This message was sent at ' . date('Y-m-d H:i:s');

        // Send message
        $event = $pusher->trigger('fns_chanel', 'shipping', $data);

        if ($event === TRUE)
        {
            echo 'Event triggered successfully!';
        }
        else
        {
            echo 'Ouch, something happend. Could not trigger event.';
        }
    }
}