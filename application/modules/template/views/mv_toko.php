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
            <li>
                <a href="<?php echo base_url('sales_draft') ?>"><span class="title">Draft Sales</span>
                </a>
                <span class="icon-thumbnail">Ds</span>
            </li>
            <li>
                <a href="<?php echo base_url('sales_daily') ?>"><span class="title">Daily Sales</span>
                </a>
                <span class="icon-thumbnail">dS</span>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="<?= base_url('customers') ?>">
            <span class="title">Customers</span>
        </a>
        <span class="icon-thumbnail">Cu<!-- <i class = "fa fa-user"></i> --></span>
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
                <a href="<?php echo base_url('stock_orders') ?>">Stock Order</a>
                <span class="icon-thumbnail">So</span>
            </li>
            <li>
                <a href="<?php echo base_url('logis_in') ?>">Logistic In</a>
                <span class="icon-thumbnail">Li</span>
            </li>
            <li>
                <a href="<?php echo base_url('logis_out') ?>">Logistic Out</a>
                <span class="icon-thumbnail">Lo</span>
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
                <a href="<?= base_url('setting_company') ?>">Store</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">SO</span>
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
                    <li>
                        <a href="<?= base_url('pos_register') ?>">POS Registers Active/Inactive</a>
                        <span class="icon-thumbnail">Sm</span>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('data_import') ?>">Data Imports</a>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">DI</span>
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