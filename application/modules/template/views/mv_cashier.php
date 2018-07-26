<!-- BEGIN SIDEBAR MENU ITEMS-->
<ul class="menu-items">
    <li class="m-t-30">
        <a href="<?php echo base_url('dashboard') ?>">
            <span class="title">Dashboard</span>
        </a>
        <span class="<?=($this->uri->segment(1)==='dashboard')?'bg-success':''?> icon-thumbnail"><i class="pg-home"></i></span>
    </li>
    <li class="<?=($this->uri->segment(1)==='sales')?'open active':'' ?> <?=($this->uri->segment(1)==='sales_daily')?'open active':'' ?> <?=($this->uri->segment(1)==='sales_draft')?'open active':'' ?>">
        <a href="javascript:;"><span class="title">Sales</span>
            <span class="<?=($this->uri->segment(1)==='sales')?'open active':''?> arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-shopping-cart"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url('sales') ?>"><span class="title">Cashier</span>
                </a>
                <span class="<?=($this->uri->segment(1)==='sales')?'bg-success':''?> icon-thumbnail"><i class="fa fa-calculator"></i></span>
            </li>
            <li>
                <a href="<?php echo base_url('sales_draft') ?>"><span class="title">Draft Sales</span>
                </a>
                <span class="<?=($this->uri->segment(1)==='sales_draft')?'bg-success':''?> icon-thumbnail">Ds</span>
            </li>
            <li>
                <a href="<?php echo base_url('sales_daily') ?>"><span class="title">Daily Sales</span>
                </a>
                <span class="<?=($this->uri->segment(1)==='sales_daily')?'bg-success':''?> icon-thumbnail">dS</span>
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
</ul>