<!-- FAKTUR PEMBELIAN SUPPLIER -->
<nav class="navbar navbar-default bg-master-lighter sm-padding-10 full-width p-t-0 p-b-0" role="navigation">
    <div class="container-fluid full-width">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle collapsed btn btn-link no-padding" data-toggle="collapse"
                    data-target="#sub-nav">
                <i class="pg pg-more v-align-middle"></i>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="sub-nav">
            <div class="row">
                <div class="col-sm-4">
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="nav-item no-print"><a onclick="window.print()" data-toggle="tooltip" data-placement="bottom"
                                                title="Print" class="no-print"><i class="fa fa-print"></i></a></li>
                        <!--<li class="nav-item"><a href="#" data-toggle="tooltip" data-placement="bottom"-->
                        <!--                        title="Download"><i class="fa fa-download"></i></a></li>-->
                    </ul>
                </div>
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <ul class="navbar-nav d-flex flex-row justify-content-sm-end">
                        <li class="nav-item">
                            <a href="#" class="p-r-10"><img width="25" height="25" alt="" class="icon-pdf"
                                                            data-src-retina="assets/img/invoice/pdf2x.png"
                                                            data-src="assets/img/invoice/pdf.png"
                                                            src="assets/img/invoice/pdf2x.png"></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="p-r-10"><img width="25" height="25" alt="" class="icon-image"
                                                            data-src-retina="assets/img/invoice/image2x.png"
                                                            data-src="assets/img/invoice/image.png"
                                                            src="assets/img/invoice/image2x.png"></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="p-r-10"><img width="25" height="25" alt="" class="icon-doc"
                                                            data-src-retina="assets/img/invoice/doc2x.png"
                                                            data-src="assets/img/invoice/doc.png"
                                                            src="assets/img/invoice/doc2x.png"></a>
                        </li>
                        <li class="nav-item"><a href="#" class="p-r-10"
                                                onclick="$.Pages.setFullScreen(document.querySelector('html'));"><i
                                        class="fa fa-expand"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- START CONTAINER FLUID -->
<div class=" container-fluid   container-fixed-lg">
    <!-- START card -->
    <div class="card card-default m-t-20">
        <div class="card-block">
            <div class="invoice padding-50 sm-padding-10">
                <div>
                    <div class="pull-left">
                        <img width="150" alt="" class="invoice-logo"
                             data-src-retina="<?= base_url().'assets/img/logo.png' ?>"
                             data-src="<?= base_url().'assets/img/logo.png' ?>"
                             src="<?= base_url().'assets/img/logo.png' ?>">
                        <address class="m-t-10">
                            FNS Management
                            <br>(022) 541-1720
                            <br>
                        </address>
                    </div>
                    <div class="pull-right sm-m-t-20">
                        <h5 class="font-montserrat all-caps hint-text">Faktur Pembelian Supplier</h5>
                        <span class="pull-right label label-success p-t-5 m-l-5 p-b-5 inline fs-12"><strong><?= $logis_in_data->tName; ?></strong></span>
                        <span></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <br>
                <br>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-7 col-sm-height sm-no-padding">
                            <p class="small no-margin"><strong>Pembelian dari</strong></p>
                            <h5 class="semi-bold m-t-0"><?= $logis_in_data->sName?></h5>
                            <address>
                                <!-- alamat supplier -->
                                <strong>Alamat Supplier</strong></br>
                                <?= $logis_in_data->sAddress?>
                            </address>
                        </div>
                        <div class="pull-right col-lg-5 sm-no-padding sm-p-b-20 d-flex justify-content-between">
                            <div>
                                <div class="font-montserrat bold all-caps">No Faktur Gudang </div>
                                <div class="font-montserrat bold all-caps">Tanggal </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="text-right">
                                <div class=""><?= $logis_in->code ?></div>
                                <div class=""><?= $logis_in_data->dateF ?></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-invoice">
                    <table class="table m-t-50">
                        <thead>
                        <tr>
                            <th class="">Product Item</th>
                            <th class="text-center">Request QTY</th>
                            <th class="text-center">Received QTY</th>
                            <th class="text-right"> Harga Supplier</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total_qty = 0; $total_cost = 0; ?>
                        <?php foreach ($logis_in_detail as $detail): ?>
                            <tr>
                                <td class="">
                                    <p class="text-black"><?= $detail->barcode?></p>
                                    <p class="small hint-text">
                                        <?= $detail->name  ?>
                                    </p>
                                </td>
                                <td class="text-center"><?= $detail->request_qty ?></td>
                                <td class="text-center"><?= $detail->received_qty ?></td>
                                <td class="text-right"><?= to_rupiah($detail->supply_price) ?></td>
                                <td class="text-right"><?= to_rupiah($detail->received_qty * $detail->supply_price) ?></td>
                            </tr>
                        <?php $total_qty += $detail->received_qty; ?>
                        <?php $total_cost += ($detail->received_qty*$detail->supply_price); ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <br>
                    <div class="text-center">
                        <!--<p>Diketahui oleh,</p>-->

                        <div class="row">
                            <div class="col-lg-6">
                                <strong>Kepala Gudang</strong>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p>(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp)</p>
                            </div>
                            <div class="col-lg-6">
                                <strong>Admin Logistik</strong>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p>(&nbsp &nbsp &nbsp <?= $logis_in_data->inp_emp ?> &nbsp &nbsp &nbsp)</p>
                            </div>
                        </div>
                    </div>
                <br>
                <br>
                <div class="p-l-15 p-r-15">
                    <div class="row b-a b-grey">
                        <div class="col-md-2 p-l-15 sm-p-t-15 clearfix sm-p-b-15 d-flex flex-column justify-content-center">
                            <h5 class="font-montserrat all-caps small no-margin hint-text bold">Total Item</h5>
                            <h3 class="no-margin"><?= $total_qty ?></h3>
                        </div>
                        <div class="col-md-5 clearfix sm-p-b-15 d-flex flex-column justify-content-center">

                        </div>
                        <div class="col-md-5 text-right bg-master-darker col-sm-height padding-15 d-flex flex-column justify-content-center align-items-end">
                            <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">
                                Price Total</h5>
                            <h1 class="no-margin text-white"><?= to_rupiah($total_cost) ?></h1>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- <div>
                    <span class="m-l-70 text-black sm-pull-right">+34 346 4546 445</span>
                    <span class="m-l-40 text-black sm-pull-right">support@revox.io</span>
                </div> -->
            </div>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->
<!-- END Faktur Pembelian -->