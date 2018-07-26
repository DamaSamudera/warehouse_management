<script type="text/javascript">

    var initTableWithSearch = function(status) {
        //deklarasi table
        var table = $('#table_' + status);
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
            "ajax": "<?= base_url( 'product/services/all?status='); ?>" + status,
            "columns": [
                // { "data": null },
                { "data": null },
                {   "data": "barcode",
                    "className": "v-align-middle"},
                { "data": "name",
                    "className": "v-align-middle" },
                { "data": "description",
                    "className": "v-align-middle" }
                //     ,
                // { "data": null }
            ],
            "order": [[ 2, "desc" ]],
            'columnDefs': [
                {
                    "targets": 0,
                    'searchable': false,
                    'orderable': false,
                    "className": "v-align-middle",
                    "render": function ( data, type, row, meta ) {
                        if(data.path){
                            return '<img class="img-responsive" width="150px" height="150px" src="'+data.path+'" />';
                        }else{
                            return '<img src="<?= base_url('assets/product/no-image.png'); ?>" width="150px" />';
                        }
                    }
                }
            ]
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

    $('.btn-delete-table').on('click', function(e) {
        console.log(e);
        $('#confirm-delete').modal('toggle');
        $('#confirm-yes').data('form','#form_'+e.currentTarget.dataset.status);
    });

    $(document).on('click', ".btn-delete", function(e) {
        $('#confirm-delete').modal('toggle');
        $('#delete-id').val(e.currentTarget.dataset.id);
        $('#confirm-yes').data('form','#delete-one');
    });

    $('#confirm-yes').on('click', function(e) {
        console.log($('#confirm-yes').data('form'));
        $($('#confirm-yes').data('form')).submit();
    });
</script>