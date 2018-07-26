<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/2/2018
 * Time: 8:47 AM
 */

class M_inventory extends MY_Model
{
    protected $_table_name  = 'n_inventory';
    protected $_timestamps  = TRUE;

    function get_new_data(){
        $inventory = new stdClass();
        $inventory->sale1 = '';
        $inventory->sale2 = '';
        $inventory->sale3 = '';
        $inventory->cost1 = '';
        $inventory->cost2 = '';
        $inventory->cost3 = '';
        $inventory->cost_supplier = '';
        $inventory->cost_distributor = '';
        $inventory->qty1 = '';
        $inventory->qty2 = '';
        $inventory->qty3 = '';
        $inventory->qty4 = '';
        $inventory->qty5 = '';
        $inventory->qty_limit = '';
        $inventory->location = '';
        return $inventory;
    }
}