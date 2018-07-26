<!-- START WIDGET widget_progressTileFlat-->
<div class="card no-border bg-success">
    <div class="full-height d-flex flex-column">
        <div class="card-header ">
            <div class="card-title text-black">
                                        <span class="font-montserrat fs-11 all-caps">
                                            Account Information <i class="fa fa-chevron-right"></i>
                                        </span>
            </div>
            <div class="card-controls">
                <ul>
                    <li>
                        <a href="#" class="text-white">
                            <i class="pg-arrow_minimize"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-l-20 p-r-20 ">
            <div class="row">
                <div class="col-md-2 p-t-10">
                                            <span class="thumbnail-wrapper d32 circular inline">
                                                <img src="http://127.0.0.1/product/fns_application/assets/img/profiles/avatar.jpg"
                                                     alt=""
                                                     data-src="http://127.0.0.1/product/fns_application/assets/img/profiles/avatar.jpg"
                                                     data-src-retina="http://127.0.0.1/product/fns_application/assets/img/profiles/avatar_small2x.jpg"
                                                     width="50">
                                            </span>
                </div>
                <div class="col-md-10">
                    <h4 class="no-margin text-white"><?= $this->session->userdata('code') . ' ' . $this->session->userdata('name'); ?></h4>
                    <p class="small hint-text"><?= $this->session->userdata('role'); ?></p>
                </div>
            </div>
            <div class="widget-17-weather p-b-15">
                <div class="row">
                    <div class="col-12 p-r-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="pull-left">Email</p>
                                <p class="pull-right bold"><?= $this->session->userdata('email'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="pull-left">Phone</p>
                                <p class="pull-right bold"><?= $this->session->userdata('phone'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="pull-left">Place</p>
                                <p class="pull-right bold"><?= ($this->session->userdata('f_warehouse')) ? $this->session->userdata('f_warehouse') : $this->session->userdata('f_store'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="pull-left">Code</p>
                                <p class="pull-right bold"><?= $this->session->userdata('code'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WIDGET -->