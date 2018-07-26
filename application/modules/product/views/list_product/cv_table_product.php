<form method="post" id="form_<?= $status ?>" class="form-delete" action="<?= base_url('product/delete_selected')?>">
    <div class="card card-transparent">
        <div class="card-header ">
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table-active" class="form-control pull-right" placeholder="Search">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table class="table table-hover table-responsive-block" id="table_<?= $status ?>">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Barcode</th>
                    <th>Nama</th>
                    <th>Decription</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</form>