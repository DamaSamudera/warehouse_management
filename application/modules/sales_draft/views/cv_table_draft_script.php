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
            "ajax": "<?= base_url( 'sales_draft/get_data'); ?>",
            "columns": [
                { "data": null },
                {   "data": "code",
                    "className": "v-align-middle"},
                { "data": "created",
                    "className": "v-align-middle" },
                { "data": "modified",
                    "className": "v-align-middle" },
                { "data": "sub_total",
                    "className": "v-align-middle" },
                { "data": "note",
                    "className": "v-align-middle" },
                { "data": null }
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'v-align-middle',
                'render': function (data, type, full, meta){
                    return '<div class="checkbox text-center"><input id="' + data.id + '" type="checkbox" name="id[]" value="' + data.id + '"><label class="no-padding no-margin" for="' + data.id + '"></label></div>';
                }
            },
                {
                    "targets": 6,
                    'searchable': false,
                    'orderable': false,
                    "className": "v-align-middle",
                    "render": function ( data, type, row, meta ) {
                        return '<span style="margin-right: 10px">' +
                            '<a data-toggle="modal" class="text-danger btn-delete" data-id="' + data.id + '"><i class="pg-trash_line"></i></a>' +
                            '</span><span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="'+data.id+'" href="<?= base_url("sales/index/"); ?>'+data.id+'"><i class="fa fa-edit"></i></a></span>';
                    }
                } ]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });

        //select checkbox
        $('#table').on('click', 'input[type=checkbox]', function(){
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
        $('#confirm-yes').data('form','#form_draft');
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