<!-- START WIDGET widget_statTile-->
<div id="card-monthly-statistic" class="widget-10 card no-border bg-white no-margin widget-loader-bar">
    <div class="card-header top-left top-right ">
        <div class="card-title text-black hint-text">
                                <span class="font-montserrat fs-11 all-caps">
                                    Monthly Statistic <i class="fa fa-chevron-right"></i>
                                </span>
        </div>
        <div class="card-controls">
            <ul>
                <li>
                    <a data-toggle="refresh" class="card-refresh text-black" href="#">
                        <i class="card-icon card-icon-refresh"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-block p-t-40">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="no-margin p-b-5 text-danger semi-bold"><?= date("F"); ?></h4>
                <div class="pull-left small">
                    <span>Orders</span>
                    <span class=" text-success font-montserrat">
                                            <span id="order_val">-</span>%
                                        </span>
                </div>
                <div class="pull-left m-l-20 small">
                    <span>Return</span>
                    <span class=" text-danger font-montserrat">
                                             <span id="return_val">-</span>%
                                        </span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="p-t-10 full-width">
            <a href="#" class="btn-circle-arrow b-grey">
                <i class="pg-arrow_minimize text-danger"></i></a>
            <a href="#"><span class="hint-text small">Show more</span></a>
        </div>
    </div>
</div>
<!-- END WIDGET -->