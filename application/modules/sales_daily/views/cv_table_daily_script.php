<script type="text/javascript">

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
            "ajax": "<?= base_url( 'sales_daily/get_data'); ?>",
            "columns": [
                {   "data": "sale_id",
                    "className": "v-align-middle"},
                {   "data": "sale_cd",
                    "className": "v-align-middle"},
                { "data": "sale_created",
                    "className": "v-align-middle" },
                { "data": "sub_total",
                    "className": "v-align-middle" },
                { "data": "sub_total",
                    "className": "v-align-middle" },
                { "data": "note",
                    "className": "v-align-middle" },
                { "data": null }
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [
                {
                    "targets": 6,
                    'searchable': false,
                    'orderable': false,
                    "className": "v-align-middle",
                    "render": function ( data, type, row, meta ) {
                        return '<span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="'+data.id+'" href="<?= base_url("sales_draft/detail/"); ?>'+data.id+'"><i class="fa fa-eye"></i></a></span>';
                    }
                } ]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });


    }

</script>