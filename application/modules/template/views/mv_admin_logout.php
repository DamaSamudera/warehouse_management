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
    <li>
        <a href="<?= base_url('inventory'); ?>"><span class="title">Inventory</span></a>
        <span class="<?=($this->uri->segment(1)==='inventory')?'bg-success':''?> icon-thumbnail"><i class="fa fa-cubes"></i></span>
    </li>
     <li class="<?=($this->uri->segment(1)==='logis_out')?'open active':'' ?>
        <?=($this->uri->segment(1)==='shipping')?'open active':'' ?>
        <?=($this->uri->segment(1)==='')?'open active':'' ?> ">
        <a href="#"><span class="title">Logistic Out</span>
        <span class="<?=($this->uri->segment(1)==='logis_out')?'open active':'' ?> arrow"></span></a>
        <span class="icon-thumbnail">Lo</span>
        <ul class ="sub-menu">
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