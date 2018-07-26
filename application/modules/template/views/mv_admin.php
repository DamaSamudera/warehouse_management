<!-- BEGIN SIDEBAR MENU ITEMS-->
<ul class="menu-items">
    <li class="m-t-30">
        <a href="<?php echo base_url('dashboard') ?>">
            <span class="title">Dashboard</span>
        </a>
        <span class="<?=($this->uri->segment(1)==='dashboard')?'bg-success':''?> icon-thumbnail"><i class="pg-home"></i></span>
    </li>
    <li class="">
        <a href="javascript:;"><span class="title">Sales</span>
            <span class="arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-shopping-cart"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url('sales') ?>"><span class="title">Cashier</span>
                </a>
                <span class="icon-thumbnail"><i class="fa fa-calculator"></i></span>
            </li>
            <!--<li>-->
            <!--    <a href="<?php echo base_url('sales_draft') ?>"><span class="title">Draft Sales</span>-->
            <!--    </a>-->
            <!--    <span class="icon-thumbnail">Ds</span>-->
            <!--</li>-->
            <li>
                <a href="<?php echo base_url('sales_daily') ?>"><span class="title">Daily Sales</span>
                </a>
                <span class="icon-thumbnail">dS</span>
            </li>
            <li>
                <a href="<?php echo base_url('sales_daily/sales_sc') ?>"><span class="title">SC Profit</span>
                </a>
                <span class="icon-thumbnail">Sp</span>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="<?= base_url('product'); ?>"><span class="title">Product</span></a>
        <span class="<?=($this->uri->segment(1)==='product')?'bg-success':''?> icon-thumbnail"><i class="fa fa-tag"></i></span>
    </li>
    <li class="">
        <a href="<?= base_url('customers'); ?>"><span class="title">Customers</span></a>
        <span class="<?=($this->uri->segment(1)==='customers')?'bg-success':''?> icon-thumbnail">Cu</span>
    </li>
    <li class="">
        <a href="<?= base_url('suppliers'); ?>"><span class="title">Supplier</span></a>
        <span class="<?=($this->uri->segment(1)==='suppliers')?'bg-success':''?> icon-thumbnail">Su</span>
    </li>
    <li class="<?=($this->uri->segment(1)==='inventory')?'open active':'' ?> <?=($this->uri->segment(1)==='')?'open active':'' ?> ">
        <a href="javascript:;"><span class="title">Inventory</span>
            <span class="<?=($this->uri->segment(1)==='inventory')?'open active':'' ?> <?=($this->uri->segment(1)==='logis_in')?'open active':'' ?> arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-cubes"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url('inventory') ?>">Inventory List</a>
                <span class="<?=($this->uri->segment(1)==='inventory')?'bg-success':''?> icon-thumbnail">iL</span>
            </li>
            <li>
                <a href="<?php echo base_url('logis_in') ?>">Purchase Order</a>
                <span class="<?=($this->uri->segment(1)==='')?'bg-success':''?> icon-thumbnail">Po</span>
            </li>
            <li>
                <a href="<?php echo base_url('inventory/stock_control') ?>">Stock Control</a>
                <span class="<?=($this->uri->segment(1)==='')?'bg-success':''?> icon-thumbnail">Po</span>
            </li>
        </ul>
    </li>
    <li class="<?=($this->uri->segment(1)==='logis_in')?'open active':'' ?>
                <?=($this->uri->segment(1)==='logis_out')?'open active':'' ?>
                <?=($this->uri->segment(1)==='shipping')?'open active':'' ?>
                <?=($this->uri->segment(1)==='store_order')?'open active':'' ?> ">
        <a href="javascript:;"><span class="title">Logistik</span>
            <span class="<?=($this->uri->segment(1)==='logis_in')?'open active':'' ?>
                <?=($this->uri->segment(1)==='logis_out')?'open active':'' ?>
                <?=($this->uri->segment(1)==='shipping')?'open active':'' ?>
                <?=($this->uri->segment(1)==='store_order')?'open active':'' ?>arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-cubes"></i></span>
        <ul class="sub-menu">
            <li class="<?=($this->uri->segment(1)==='logis_in')?'open active':'' ?> ">
                <a href="javascript:;"><span class="title">Logistic In</span>
                <span class="arrow <?=($this->uri->segment(1)==='logis_in')?'open active':'' ?>"></span></a>
                <span class="icon-thumbnail">Li</span>
                <ul class="sub-menu" style="<?=($this->uri->segment(1)==='logis_in')?'display: block;':'' ?> ">
                    <li>
                        <a href="<?php echo base_url('logis_in/daily_logis') ?>">Daily Logistic In</a>
                        <span
                            <?php
                            if($this->uri->uri_string() =="logis_in/daily_logis")
                            {echo 'class="bg-success icon-thumbnail"';}
                            else { echo 'class="icon-thumbnail"'; }
                            ?>
                        >DLi</span>
                    </li>
                    <li>
                        <a href="<?= base_url('logis_in/input'); ?>">Input Data</a>
                        <span
                            <?php
                            if($this->uri->uri_string() =="logis_in/input")
                            {echo 'class="bg-success icon-thumbnail"';}
                            else { echo 'class="icon-thumbnail"'; }
                            ?>
                        >Id</span>
                    </li>
                    <li>
                        <a href="<?= base_url('logis_in/repeate_order'); ?>">Repeat Order</a>
                        <span
                            <?php
                            if($this->uri->uri_string() =="logis_in/repeate_order")
                            {echo 'class="bg-success icon-thumbnail"';}
                            else { echo 'class="icon-thumbnail"'; }
                            ?>
                        >Ro</span>
                    </li>
                </ul>
            </li>
            <li class="<?=($this->uri->segment(1)==='logis_out')?'open active':'' ?>
                <?=($this->uri->segment(1)==='shipping')?'open active':'' ?>
                <?=($this->uri->segment(1)==='store_order')?'open active':'' ?> ">
                <a href="javascript:;"><span class="title">Logistic Out</span>
                <span class="<?=($this->uri->segment(1)==='logis_out')?'open active':'' ?>
                <?=($this->uri->segment(1)==='shipping')?'open active':'' ?>
                <?=($this->uri->segment(1)==='store_order')?'open active':'' ?> arrow"></span></a>
                <span class="icon-thumbnail">Lo</span>
                <ul class ="sub-menu" style="<?=($this->uri->segment(1)==='logis_out')?'display: block;':'' ?>
                <?=($this->uri->segment(1)==='shipping')?'display: block;':'' ?>
                <?=($this->uri->segment(1)==='store_order')?'display: block;':'' ?> ">
                    <li>
                        <a href="<?php echo base_url('logis_out/manual_shipping') ?>">Daily Logistic Out</a>
                        <span
                            <?php
                            if($this->uri->uri_string() =="logis_out")
                            {echo 'class="bg-success icon-thumbnail"';}
                            else { echo 'class="icon-thumbnail"'; }
                            ?>
                        >DLo</span>
                    </li>
                    <li>
                        <a href="<?php echo base_url('logis_out/form_manual_shipping') ?>">Shipping</a>
                        <span
                            <?php
                            if($this->uri->uri_string() =="shipping")
                            {echo 'class="bg-success icon-thumbnail"';}
                            else { echo 'class="icon-thumbnail"'; }
                            ?>
                        >Sh</span>
                    </li>
                    <li>
                        <a href="<?php echo base_url('store_order') ?>">Order Toko</a>
                        <span class="<?=($this->uri->segment(1)==='store_order')?'bg-success':''?> icon-thumbnail">Ot</span>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="<?= base_url('employees') ?>"><span class="title">Employee</span></a>
        <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
    </li>
    <li class="">
        <a href="javascript:;"><span class="title">Reports</span>
            <span class="arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-line-chart"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="javascript:;">Sales</a>
                <span class="icon-thumbnail">SLS</span>
            </li>
            <li>
                <a href="javascript:;">Manage Targets</a>
                <span class="icon-thumbnail">MTG</span>
            </li>
            <li>
                <a href="javascript:;">Inventory</a>
                <span class="icon-thumbnail">INV</span>
            </li>
            <li>
                <a href="javascript:;">Daily Amount</a>
                <span class="icon-thumbnail">DAM</span>
            </li>
            <li>
                <a href="javascript:;">Daily Amounts Salesperson</a>
                <span class="icon-thumbnail">DAS</span>
            </li>
            <li>
                <a href="javascript:;">Stock Aging</a>
                <span class="icon-thumbnail">SAG</span>
            </li>
            <li>
                <a href="javascript:;">Stock Aging Summary</a>
                <span class="icon-thumbnail">SAS</span>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="javascript:;"><span class="title">Settings</span>
            <span class="arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-cogs"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="javascript:;">Company</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">CO</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('setting_company') ?>">Company**</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">Warehouses</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">WR</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('warehouse') ?>">New Warehouse</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">Stores</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">ST</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('store') ?>">New Store</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">POS Registers</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">PR</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('pos_register') ?>">New POS Registers</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Payment Types</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">PT</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('payment_type') ?>">New Payment type</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">Data Imports</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">DI</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('data_import') ?>">New Product</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">Tools</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">TL</span>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('setting_pos_receipt') ?>">POS Receipt Settings</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>