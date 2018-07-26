<!-- BEGIN SIDEBAR MENU ITEMS-->
<ul class="menu-items">
    <li class="m-t-30">
        <a href="<?php echo base_url('dashboard') ?>">
            <span class="title">Dashboard</span>
        </a>
        <span class="<?=($this->uri->segment(1)==='dashboard')?'bg-success':''?> icon-thumbnail"><i class="pg-home"></i></span>
    </li>
    <li class="">
        <a href="<?= base_url('product'); ?>"><span class="title">Product</span></a>
        <span class="<?=($this->uri->segment(1)==='product')?'bg-success':''?> icon-thumbnail"><i class="fa fa-tag"></i></span>
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
        <a href="<?= base_url('suppliers'); ?>"><span class="title">Supplier</span></a>
        <span class="<?=($this->uri->segment(1)==='suppliers')?'bg-success':''?> icon-thumbnail">Su</span>
    </li>
</ul>