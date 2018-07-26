<script type="text/javascript">
    
    function toRupiah(bilangan) {
        var	reverse = bilangan.toString().split('').reverse().join(''),
            ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        return "Rp." + ribuan;
    }

    var no = 0;

    var initTableWithSearch = function() {
        //deklarasi table
        var table = $('#table_control');
        //konfigurasi table
        var settings = {
            "sDom": "<t><'row'<p i>>",
            "destroy": true,
            "scrollCollapse": true,
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5,
            "ajax": "<?= base_url( 'inventory/get_data_control/'); ?>",
            "columns": [
                { "data": null},
                { "data": "description" },
                { "data": "sName" },
                { "data": "qty1" },
                { "data": "qty2" },
                { "data": "qty3" },
                { "data": "qty4" },
                { "data": null },
                { "data": null },
                { "data": null }
                
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [
                {
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'v-align-middle',
                    'render': function (data, type, full, meta){
                        return data.barcode;
                    }
                },
            {
                'targets': 7,
                'searchable': false,
                'orderable': false,
                'className': 'v-align-middle',
                'render': function (data, type, full, meta){
                    if(data.is_warehouse == 1){
                        var omzet = data.qty4 * data.cost_distributor;
                        return '<span class="label label-success">' + toRupiah(omzet); + '</span>';
                    }else if(data.is_warehouse == 0){
                        var omzet = data.qty4 * data.sale1;
                        return '<span class="label label-success">' + toRupiah(omzet); + '</span>';
                    }
                    
                    
                }
            },{
                'targets': 8,
                'searchable': false,
                'orderable': false,
                'className': 'v-align-middle',
                'render': function (data, type, full, meta){
                    if(data.is_warehouse == 1){
                        var asset = data.qty3 * data.cost_supplier;
                        return '<span class="label label-success">' + toRupiah(asset); + '</span>';
                    }else if(data.is_warehouse == 0){
                        var asset = data.qty3 * data.cost_distributor;
                        return '<span class="label label-info">' + toRupiah(asset); + '</span>';
                    }
                }
            },{
                'targets': 9,
                'searchable': false,
                'orderable': false,
                'className': 'v-align-middle',
                'render': function (data, type, full, meta){
                    if(data.is_warehouse == 1){
                    var omzet = data.qty4 * data.cost_distributor;
                    var asset = data.qty3 * data.cost_supplier;
                    var profit = asset - omzet;
                    return '<span class="label label-success">' + toRupiah(profit); + '</span>';
                    }else if(data.is_warehouse == 0){
                    var omzet = data.qty4 * data.sale1;
                    var asset = data.qty3 * data.cost_distributor;
                    var profit = asset - omzet;
                    return '<span class="label label-warning">' + toRupiah(profit); + '</span>';
                    }
                    
                }
            } ]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table-' + status).keyup(function() {
            table.fnFilter($(this).val());
        });

        //select checkbox
        $('#table_' + status).on('click', 'input[type=checkbox]', function(){
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected');
            } else {
                $(this).closest('tr').removeClass('selected');
            }
        });

    }


    var _format = function (d) {
        // `d` is the original data object for the row
        console.log(d);
        return '<table class="table table-inline">' +
            '<tr>' +
            '<td>' +
            '<div class="row">\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-left">&nbsp;</p>\n' +
            '                                <p class="pull-right bold">Price Information</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + toRupiah(d.cost_supplier) +'['+ d.cost_supplier_cd + ']</p>\n' +
            '                                <p class="pull-left">Cost Supplier</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + toRupiah(d.cost1) +'['+ d.cost1_cd + ']</p>\n' +
            '                                <p class="pull-left">Cost Price 1</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + toRupiah(d.sale1) +'['+ d.sale1_cd + ']</p>\n' +
            '                                <p class="pull-left">Sale Price 1</p>\n' +
            '                            </div>\n' +
            '                        </div>' +
            '                        </div>' +
            '</td>' +
            '<td>' +
            '<div class="row">\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-left">&nbsp;</p>\n' +
            '                                <p class="pull-right bold">&nbsp;</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' +  toRupiah(d.cost_distributor) +'['+ d.cost_distributor_cd + ']</p>\n' +
            '                                <p class="pull-left">Cost Distributor</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + toRupiah(d.sale2) +'['+ d.sale2_cd + ']</p>\n' +
            '                                <p class="pull-left">Sale Price 2</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + toRupiah(d.cost2) +'['+ d.cost2_cd + ']</p>\n' +
            '                                <p class="pull-left">Cost Price 2</p>\n' +
            '                            </div>\n' +
            '                        </div>' +
            '                        </div>' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>' +
            '<div class="row">\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-left">&nbsp;</p>\n' +
            '                                <p class="pull-right bold">Stock Information</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty1 + '</p>\n' +
            '                                <p class="pull-left">Stok Awal</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty3 + '</p>\n' +
            '                                <p class="pull-left">Stok Masuk</p>\n' +
            '                            </div>\n' +
            '                        </div>' +
            '                        </div>' +
            '</td>' +
            '<td>' +
            '<div class="row">\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-left">&nbsp;</p>\n' +
            '                                <p class="pull-right bold">&nbsp;</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty2 + '</p>\n' +
            '                                <p class="pull-left">Stok Akhir</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty4 + '</p>\n' +
            '                                <p class="pull-left">Stock Keluar</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty_limit + '</p>\n' +
            '                                <p class="pull-left">Qty Limit</p>\n' +
            '                            </div>\n' +
            '                        </div>' +
            '                        </div>' +
            '</td>' +
            '</tr>' +
            '</table>';
    }
</script>