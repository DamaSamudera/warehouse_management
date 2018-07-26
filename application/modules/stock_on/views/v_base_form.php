<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Stock OpName</a></li>
                <li class="breadcrumb-item active">Action</li>
            </ol>
            <!-- END BREADCRUMB -->
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<div class="container-fluid padding-25 sm-padding-10">
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-transparent ">
                    <!-- Status Progress -->
                    <ul class="pb m-t-10">
                        <li class="pb current"><span>1</span> Draft <i class="pg pg-arrow_right"></i></li>
                        <li><span>2</span> Completed</li>
                        <li><span>3</span> Approved</li>
                    </ul>

                    <div class="row m-t-20">
                        <div class="col-md-4 b-r b-dashed b-grey sm-b-b">
                            <div class="card-header ">
                                <div class="card-title">Information</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-block m-t-20">
                                <form class="m-t-20" role="form">
                                    <div class="form-group form-group-default">
                                        <label>Store</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="form-group form-group-default disabled">
                                        <label>Reference code</label>
                                        <input type="email" class="form-control" value="You can put anything here"
                                               disabled="">
                                    </div>
                                    <div class="form-group form-group-default input-group">
                                        <div class="form-input-group">
                                            <label>Completed at</label>
                                            <input type="email" class="form-control" placeholder="Pick a date"
                                                   id="datepicker-component2">
                                        </div>
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Notes</label>
                                        <textarea class="form-control" id="name"
                                                  placeholder="Briefly Describe your Abilities"
                                                  aria-invalid="false"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- products for opname -->
                            <div class="card-header ">
                                <div class="card-title">Products</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-block m-t-20">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group form-group-default input-group typehead">
                                            <div class="form-input-group">
                                                <label>Product Barcode / Name</label>
                                                <input type="text" name="product"
                                                       class="form-control add_cart typeahead" id="baseplace"
                                                       value="AK000001 | GELANG KULIT KOMBIN">
                                            </div>
                                            <div class="input-group-addon">
                                                <i class="fa fa-barcode"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pull-right">
                                            <div class="col-xs-12">
                                                <div class="btn-group m-b-5 btn-lg">
                                                    <button data-toggle="tooltip" type="button" class="btn btn-success"
                                                            data-original-title="Upload Stock Opname"><i
                                                                class="fa fa-cloud-upload"></i></button>
                                                    <button data-toggle="tooltip" type="button" class="btn btn-danger"
                                                            data-original-title="Reset"><i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive" id="">
                                    <table class="table table-hover" id="basicTable">
                                        <thead>
                                        <tr>
                                            <th style="width:1%; padding: 5px !important;" class="text-center">
                                                <button class="btn btn-link">
                                                </button>
                                            </th>
                                            <th style="width:79%">Product</th>
                                            <th style="width:21%">Counted Qty</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="v-align-middle">
                                                <div class="text-center">
                                                    <a data-toggle="close"
                                                       class="card-close text-danger remove_inventory" href="#"
                                                       id="'.$items[" rowid"].'"><i
                                                            class="card-icon card-icon-close"></i></a>
                                                    <input type="hidden" value="'.$items[" id"].'" name="id[]"/>
                                                    <input type="hidden" value="'.$items[" rowid"].'" name="rowid[]"/>
                                                </div>
                                            </td>
                                            <td class="v-align-middle">

                                            </td>
                                            <td class="v-align-middle">
                                                <input type="number" class="form-control update_cart" value="" name=""
                                                       data-field="" data-id=""/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>