<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/29/2018
 * Time: 2:18 AM
 */

class Logis_out_m extends MY_Model
{
    protected $_table_name = "shipping";
    protected $_timestamps = TRUE;

    public function get_new_data(){
        $po = new stdClass();
        $po->code = "SH" . 30 . date('ymd') . $this->get_id();
        $po->status = "";
        return $po;
    }

    public function get_id(){
        $this->db->select('COUNT(*) AS id');
        $this->db->where('date(created) =' .date('"Y-m-d"'));
        return $this->db->get($this->_table_name)->row()->id + 1;
    }

    public function get_all($id = NULL, $single = FALSE){

        $this->db->select('
            shipping.id,
            shipping.`code`,
            shipping.created,
            shipping.modified,
            shipping.`status`,
            shipping.request,
            shipping.delivery,
            shipping.received,
            shipping.mode_delivery,
            shipping.estimate,
            shipping.note,
            shipping.from_place,
            shipping.destination,
            shipping.user_input,
            shipping.user_approve,
            shipping.is_delete,
            date(shipping.modified) AS sDate,
            store_dest.`name` AS des_name,
            store_dest.`code` AS des_code,
            store.`code` AS fro_code,
            store.`name` AS fro_name,
            inp_emp.`code` AS inp_code,
            inp_emp.`name` AS inp_name,
            app_emp.`code` AS app_code,
            app_emp.`name` AS app_name
        ');

        $this->db->join('store ', 'store.id = shipping.from_place', 'LEFT');
        $this->db->join('store AS store_dest', 'store_dest ON store_dest.id = shipping.destination', 'LEFT');
        $this->db->join('employee AS inp_emp', 'shipping.user_input = inp_emp.id', 'LEFT');
        $this->db->join('employee AS app_emp', 'app_emp.id = shipping.user_approve', 'LEFT');

        return parent::get($id, $single);
    }
    
    public function get_rekap($id = NULL, $single = FALSE){

        $this->db->select('
            shipping.id,
            shipping.`code`,
            shipping.created,
            shipping.modified,
            shipping.`status` AS description,
            shipping.request,
            shipping.delivery,
            shipping.received,
            shipping.mode_delivery,
            shipping.estimate,
            shipping.note,
            shipping.from_place,
            shipping.destination,
            shipping.user_input,
            shipping.user_approve,
            shipping.is_delete,
            date(shipping.modified) AS sDate,
            store_dest.`name` AS des_name,
            store_dest.`code` AS des_code,
            store.`code` AS fro_code,
            store.`name` AS fro_name,
            inp_emp.`code` AS inp_code,
            inp_emp.`name` AS inp_name,
            app_emp.`code` AS app_code,
            app_emp.`name` AS app_name,
            SUM(shipping_detail.request_qty) AS sQty,
            SUM(shipping_detail.delivery_price) AS sTotal
        ');

        $this->db->join('store ', 'store.id = shipping.from_place', 'LEFT');
        $this->db->join('shipping_detail ', 'shipping_detail.shipping_id = shipping.id', 'LEFT');
        $this->db->join('store AS store_dest', 'store_dest ON store_dest.id = shipping.destination', 'LEFT');
        $this->db->join('employee AS inp_emp', 'shipping.user_input = inp_emp.id', 'LEFT');
        $this->db->join('employee AS app_emp', 'app_emp.id = shipping.user_approve', 'LEFT');

        return parent::get($id, $single);
    }

    public function get_list_logis_out($id = NULL, $single = FALSE){
            $this->db->select('
            shipping.id,
            shipping.`code`,
            shipping.created,
            shipping.`status`,
            shipping.request,
            shipping.delivery,
            shipping.received,
            shipping.mode_delivery,
            shipping.estimate,
            shipping.note,
            shipping.destination,
            shipping.user_input,
            shipping.user_approve,
            shipping.is_delete,
            date(shipping.modified) As dateF,
            store.name AS tName,
            ( SELECT CONCAT( `code`, \' | \', `name` ) FROM store WHERE id = from_place ) AS from_name,
            ( SELECT SUM(request_qty) FROM `shipping_detail` WHERE shipping_detail.shipping_id = shipping.id ) AS sum_rq,
            ( SELECT SUM(received_qty) FROM `shipping_detail` WHERE shipping_detail.shipping_id = shipping.id ) AS sum_rc
        ');
            $this->db->join('store', 'shipping.from_place = store.id', 'INNER');
            return parent::get($id, $single);
        }
}