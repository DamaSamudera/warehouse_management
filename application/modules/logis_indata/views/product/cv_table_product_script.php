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
            "ajax": "<?= base_url( 'product/get_data/'); ?>" + status,
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
            //     {
            //     'targets': 0,
            //     'searchable': false,
            //     'orderable': false,
            //     'className': 'v-align-middle',
            //     'render': function (data, type, full, meta){
            //         return '<div class="checkbox text-center"><input id="product_' + data.id + '" type="checkbox" name="id[]" value="' + data.id + '"><label class="no-padding no-margin" for="product_' + data.id + '"></label></div>';
            //     }
            // },
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
                // ,

                // {
                //     "targets": 5,
                //     'searchable': false,
                //     'orderable': false,
                //     "className": "v-align-middle",
                //     "render": function ( data, type, row, meta ) {
                //         return '<span style="margin-right: 10px">' +
                //             '<a data-toggle="modal" class="text-danger btn-delete" data-id="' + data.id + '"><i class="pg-trash_line"></i></a>' +
                //             '</span><span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="'+data.id+'" href="<?= base_url("product/action_form/"); ?>'+data.id+'"><i class="fa fa-edit"></i></a></span>';
                //     }
                // } 
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