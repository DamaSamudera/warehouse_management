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
        $inventory->sale1 = 0;
        $inventory->sale2 = 0;
        $inventory->sale3 = 0;
        $inventory->cost1 = 0;
        $inventory->cost2 = 0;
        $inventory->cost3 = 0;
        $inventory->cost_supplier = 0;
        $inventory->cost_distributor = 0;
        $inventory->qty1 = 0;
        $inventory->qty2 = 0;
        $inventory->qty3 = 0;
        $inventory->qty4 = 0;
        $inventory->qty5 = 0;
        $inventory->qty_limit = 0;
        $inventory->location = '';
        return $inventory;
    }
}