<!-- BEGIN SIDEBAR MENU ITEMS-->
<ul class="menu-items">
    <li class="m-t-30">
        <a href="<?php echo base_url('dashboard') ?>">
            <span class="title">Dashboard</span>
        </a>
        <span class="bg-spmn icon-thumbnail"><i class="fa fa-th-large"></i></span>
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
        <span class="icon-thumbnail"><i class="fa fa-tag"></i></span>
    </li>
    <li class="">
        <a href="javascript:;">
            <span class="title">Customers</span>
        </a>
        <span class="icon-thumbnail">Cu<!-- <i class = "fa fa-user"></i> --></span>
        <ul class="sub-menu">
            <li>
                <a href="<?= base_url('customers') ?>">Memberships</a>
                <span class="icon-thumbnail">Mb</span>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="javascript:;"><span class="title">Inventory</span>
            <span class="arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-cubes"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url('inventory') ?>">Inventory List</a>
                <span class="icon-thumbnail">iL</span>
            </li>
            <li>
                <a href="<?php echo base_url('inventory/stock_control') ?>">Stock Control</a>
                <span class="icon-thumbnail">sC</span>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="<?= base_url('logis_out/list_shipping'); ?>"><span class="title">Logistic In</span></a>
        <span class="icon-thumbnail"><i class="fa fa-tag"></i></span>
    </li>
</ul>