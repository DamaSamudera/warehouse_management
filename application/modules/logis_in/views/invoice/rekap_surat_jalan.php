<style>
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
    .tooltip{
        display: none !important;
    }
}
</style>

<!-- Rekap Surat Jalan -->
<nav class="navbar navbar-default bg-master-lighter sm-padding-10 full-width p-t-0 p-b-0 no-print" role="navigation">
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
    
    <div class="card card-default m-t-20 no-print">
        <div class="card card-transparent">
            <div class="card-block no-padding">
                <div id="card-circular-minimal" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Laporan Rekap Purchase Order</div>
                            <div class="card-controls">
                              <ul>
                                <li><a href="#" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh-lg-master"></i></a>
                                </li>
                              </ul>
                            </div>
                    </div>
                    <div class="card-block">
                            <h3>
										<span class="semi-bold">Laporan </span> Berdasarkan</h3>
                            <form id="form-work" action="" method="get" class="form-horizontal" role="form" autocomplete="off">
                              <div class="form-group row">
                                  <div class="col-md-6 radio radio-success">
                                      <input type="radio" value="daily" name="optionyes" id="today" checked>
                                    <label for="today">Rekap Hari Ini</label>
                                  </div>
                                  <div class="col-md-6 radio radio-success">
                                      <input type="radio" value="all" name="optionyes" id="all">
                                    <label for="all">Seluruh Data</label>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-4 radio radio-success">
                                      <input type="radio" value="date" name="optionyes" id="date">
                                    <label for="date">Tanggal</label>
                                  </div>
                                  <div id="datepicker-component2" class="input-group date col-md-8 p-l-0">
                                      <input type="text" name="from" class="form-control"><span class="input-group-addon"><i
                								class="fa fa-calendar"></i></span>
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-4 radio radio-success">
                                      <input type="radio" value="destination" name="optionyes" id="destination">
                                    <label for="destination">Supplier</label>
                                  </div>
                                  <div class="col-md-8 p-l-0">
                                      <input type="text" name="store" id="store" class="form-control" placeholder="Type supplier name">
                                    </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-md-12 text-right">
                                  <button class="btn btn-success" type="submit">Submit</button>
                                  <button class="btn btn-default"><i class="pg-close"></i> Reset</button>
                                </div>
                              </div>
                              </form>
                          </div>
                        </div>
             </div>
        </div>
    </div>
    
    <!-- START card -->
    <div class="card card-default m-t-20">
        <div class="card-block">
            <div class="invoice padding-50 sm-padding-10 ">
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
                        <h5 class="font-montserrat all-caps bold"><strong>Rekap Purchase Order</strong></h5>
                        <span class="pull-right label label-success p-t-5 m-l-5 p-b-5 inline fs-12"><strong><?= $judul_rekap; ?></strong> <?= $sub_judul_rekap; ?></span>
                        <span></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <br>
                <br>
                <!--
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-7 col-sm-height sm-no-padding">
                            <p class="small no-margin"><strong>Tujuan pengiriman</strong></p>
                            <h5 class="semi-bold m-t-0"></h5>
                            <p class="small no-margin"><strong>Dikirim Dari</strong></p>
                            <h5 class="semi-bold m-t-0"></h5>
                        </div>
                        <div class="pull-right col-lg-5 sm-no-padding sm-p-b-20 d-flex justify-content-between">
                            <div>
                                <div class="font-montserrat bold all-caps">Tanggal </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="text-right">
                                <div class=""></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <!-- Detail Barang -->
                <div class="table-responsive table-invoice">
                    <table class="table m-t-50">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">No Faktur</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Faktur Supplier</th>
                            <th class="text-right">Deskripsi</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total_qty = 0; $total_cost = 0; $i=1; ?>
                        <?php foreach ($logis_out as $detail): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td class="">
                                    <p class="text-black"><?= $detail->code ?></p>
                                </td>
                                <td class="text-center"><?= $detail->sName ?></td>
                                <td class="text-center"><?= $detail->faktur_supplier ?></td>
                                <td class="text-center"><?= $detail->description ?></td>
                                <td class="text-center"><?= $detail->sQty ?></td>
                                <td class="text-right"><?= to_rupiah($detail->sTotal) ?></td>
                                <?php $i++; ?>
                            </tr>
                        <?php $total_qty += $detail->sQty; ?>
                        <?php $total_cost += ($detail->sTotal); ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <br>
                <!-- signature -->

                    <div class="text-center">
                        <p>Hormat Kami,</p>
                        <br>
                        <br>
                                <br>
                                <br>
                                <br>
                                <p>(&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp)</p>
                    </div>
                                    

                <!-- End signature -->
                <br>
                <br>
                <div class="p-l-15 p-r-15">
                    <div class="row b-a b-grey">
                        <div class="col-md-2 justify-content-center">
                            <h5 class="font-montserrat all-caps small no-margin hint-text bold">Total Item</h5>
                            <h3 class="no-margin"><?= $total_qty ?></h3>
                        </div>
                        <div class="col-md-5 clearfix sm-p-b-15 d-flex flex-column justify-content-center">
                        </div>
                        <div class="col-md-5 text-right bg-master-darker justify-content-center align-items-end">
                            <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">
                                Price Total</h5>
                         <h1 class="no-margin text-white"><?= to_rupiah($total_cost) ?></h1>
                        </div>
                    </div>
                </div>
                <hr class="no-print">
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