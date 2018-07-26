<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/28/2018
 * Time: 1:53 AM
 */

class Logis_in_m extends MY_Model
{
    protected $_table_name = "stock_order";
    protected $_timestamps = TRUE;

    public function get_new_data(){
        $po = new stdClass();
        $po->code = "PO" . 30 . date('ymd') . $this->get_id();
        $po->status = "";
        return $po;
    }

    public function get_id(){
        $this->db->select('COUNT(*) AS id');
        $this->db->where('date(created) =' .date('"Y-m-d"'));
        return $this->db->get($this->_table_name)->row()->id + 1;
    }

    public function get_list_logis_in($id = NULL, $single = FALSE){
        $this->db->select('
            stock_order.id,
            stock_order.`code`,
            stock_order.created,
            stock_order.modified,
            stock_order.request,
            stock_order.received,
            stock_order.`status`,
            stock_order.faktur_supplier,
            stock_order.description,
            stock_order.from_place,
            stock_order.destination,
            stock_order.user_input,
            stock_order.supplier_id,
            stock_order.is_delete,
            stock_order.user_approve,
            date(stock_order.modified) As dateF,
            store.name AS tName,
            inp_emp.name AS inp_emp,
            supplier.name AS sName ,
            supplier.address AS sAddress,
            ( SELECT CONCAT( `code`, \' | \', name) FROM supplier WHERE id = supplier_id ) AS supplier,
            ( SELECT CONCAT( `code`, \' | \', `name` ) FROM store WHERE id = from_place ) AS from_name,
            ( SELECT SUM(request_qty) FROM `stock_order_detail` WHERE stock_order_id = stock_order.id ) AS sum_rq,
            ( SELECT SUM(received_qty) FROM `stock_order_detail` WHERE stock_order_id = stock_order.id ) AS sum_rc
        ');
        $this->db->join('supplier', 'stock_order.supplier_id = supplier.id', 'INNER');
        $this->db->join('employee AS inp_emp', 'inp_emp.id = stock_order.user_input', 'LEFT');
        $this->db->join('store', 'stock_order.from_place = store.id', 'INNER');
        return parent::get($id, $single);
    }
    
    public function get_rekap($id = NULL, $single = FALSE){
        $this->db->select('
            stock_order.id,
            stock_order.`code`,
            stock_order.created,
            stock_order.modified,
            stock_order.request,
            stock_order.received,
            stock_order.`status`,
            stock_order.faktur_supplier,
            stock_order.description,
            stock_order.from_place,
            stock_order.destination,
            stock_order.user_input,
            stock_order.supplier_id,
            stock_order.is_delete,
            stock_order.user_approve,
            SUM(stock_order_detail.received_qty) AS sQty,
            SUM(stock_order_detail.supply_price) AS sTotal,
            date(stock_order.modified) As dateF,
            store.name AS tName,
            inp_emp.name AS inp_emp,
            supplier.name AS sName ,
            supplier.address AS sAddress,
            ( SELECT CONCAT( `code`, \' | \', name) FROM supplier WHERE id = supplier_id ) AS supplier,
            ( SELECT CONCAT( `code`, \' | \', `name` ) FROM store WHERE id = from_place ) AS from_name,
            ( SELECT SUM(request_qty) FROM `stock_order_detail` WHERE stock_order_id = stock_order.id ) AS sum_rq,
            ( SELECT SUM(received_qty) FROM `stock_order_detail` WHERE stock_order_id = stock_order.id ) AS sum_rc
        ');
        $this->db->join('stock_order_detail ', 'stock_order_detail.stock_order_id = stock_order.id', 'LEFT');
        $this->db->join('supplier', 'stock_order.supplier_id = supplier.id', 'INNER');
        $this->db->join('employee AS inp_emp', 'inp_emp.id = stock_order.user_input', 'LEFT');
        $this->db->join('store', 'stock_order.from_place = store.id', 'INNER');
        return parent::get($id, $single);
    }
}