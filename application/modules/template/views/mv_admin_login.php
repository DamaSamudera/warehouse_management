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
    <li class="">
        <a href="<?= base_url('inventory'); ?>"><span class="title">Inventory</span></a>
        <span class="<?=($this->uri->segment(1)==='inventory')?'bg-success':''?> icon-thumbnail"><i class="fa fa-cubes"></i></span>
    </li>
    <li class="<?=($this->uri->segment(1)==='logis_in')?'open active':'' ?> ">
        <a href="#"><span class="title">Logistic In</span>
        <span class="<?=($this->uri->segment(1)==='logis_in')?'open active':'' ?> arrow"></span></a>
        <span class="icon-thumbnail">Li</span>
        <ul class="sub-menu">
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

</ul>