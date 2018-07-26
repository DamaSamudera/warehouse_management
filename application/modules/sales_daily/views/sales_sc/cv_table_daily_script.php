<script type="text/javascript">

    function toRupiah(bilangan) {
        var	reverse = bilangan.toString().split('').reverse().join(''),
            ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        return "Rp." + ribuan;
    }

    var initTableWithSearch = function() {
        //deklarasi table
        var table = $('#table');
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
            "ajax": "<?= base_url( 'sales_daily/get_sales_sc'); ?>",
            "columns": [
                {   "data": "code",
                    "className": "v-align-middle"},
                {   "data": "sc_name",
                    "className": "v-align-middle"},
                { "data": null },
                { "data": "sd_qty",
                    "className": "v-align-middle" }
                // { "data": null }
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [
                {
                    "targets": 2,
                    'searchable': false,
                    'orderable': false,
                    "className": "v-align-middle",
                    "render": function ( data, type, row, meta ) {
                        
                        return '<span class="v-align-left">' + toRupiah(data.sd_price); + '</span>';
                    }
                }
                // {
                //     "targets": 4,
                //     'searchable': false,
                //     'orderable': false,
                //     "className": "v-align-middle",
                //     "render": function ( data, type, row, meta ) {
                //         return '<span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="'+data.id+'" href="<?= base_url("sales_draft/detail/"); ?>'+data.id+'"><i class="fa fa-eye"></i></a></span>';
                //     }
                // } 
                ]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });


    }

</script>