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
            "ajax": "<?= base_url( 'shipping/get_data/'); ?>",
            "columns": [
                { "data": null },
                { "data": null },
                { "data": "modified",
                    "className": "v-align-middle" },
                { "data": "modified",
                    "className": "v-align-middle" },
                { "data": "n_store_id",
                    "className": "v-align-middle" },
                { "data": "note",
                    "className": "v-align-middle" },
                { "data": null },
                { "data": null }
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'v-align-middle',
                'render': function (data, type, full, meta){
                    return '<div class="checkbox text-center"><input id="customer_' + data.id + '" type="checkbox" name="id[]" value="' + data.id + '"><label class="no-padding no-margin" for="customer_' + data.id + '"></label></div>';
                }
            },
                {
                    'targets': 1,
                    'className': 'v-align-middle',
                    'render': function (data, type, full, meta){
                        return '<a href="">' + data.code + '</a><br/><span class="label label-success">' + data.type + ' Shipping</span>  ';
                    }
                },
                {
                    'targets': 6,
                    'className': 'v-align-middle',
                    'render': function (data, type, full, meta){
                        return '<span class="label label-success">' + data.status + '</span>';
                    }
                },
                {
                    'targets': 7,
                    'className': 'v-align-middle',
                    'render': function (data, type, full, meta){
                        var usr = 'None';
                        if(data.n_employee_id_req)
                            usr = data.n_employee_id_req;
                        return usr;
                    }
                }]
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