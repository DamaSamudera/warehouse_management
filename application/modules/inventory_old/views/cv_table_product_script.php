<script type="text/javascript">

    var initTableWithSearch = function (status) {
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
            "ajax": "<?= base_url('inventory/get_data'); ?>",
            "columns": [
                {"data": null},
                {
                    "data": "code",
                    "className": "v-align-middle"
                },
                {
                    "data": "created",
                    "className": "v-align-middle"
                },
                {"data": null}
            ],
            "order": [[1, "desc"]],
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'v-align-middle',
                'render': function (data, type, full, meta) {
                    return '<div class="checkbox text-center"><input id="store_' + data.id + '" type="checkbox" name="id[]" value="' + data.id + '"><label class="no-padding no-margin" for="store_' + data.id + '"></label></div>';
                }
            },
                {
                    "targets": 3,
                    'searchable': false,
                    'orderable': false,
                    "className": "v-align-middle",
                    "render": function (data, type, row, meta) {
                        return '<span style="margin-right: 10px">' +
                            '<a data-toggle="modal" class="text-danger btn-delete" data-id="' + data.id + '"><i class="pg-trash_line"></i></a>' +
                            '</span>' +
                            '<span style="margin-right: 10px"><a class="text-success btn_action_form" data-status="edit" data-id="' + data.id + '" href="<?= base_url("inventory/action_form/"); ?>' + data.id + '"><i class="fa fa-edit"></i></a></span>' +
                            '<span style="margin-right: 10px"><a class="text-success details-control" data-id="' + data.id + '" href="#"><i class="fa fa-eye"></i></a></span>';
                    }
                }]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table-' + status).keyup(function () {
            table.fnFilter($(this).val());
        });

        //select checkbox
        $('#table_' + status).on('click', 'input[type=checkbox]', function () {
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
            '                                <p class="pull-right bold">' + d.sale1 + '</p>\n' +
            '                                <p class="pull-left">Sale Price 1</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.sale2 + '</p>\n' +
            '                                <p class="pull-left">Sale Price 2</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.sale3 + '</p>\n' +
            '                                <p class="pull-left">Sale Price 3</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.cost_distributor + '</p>\n' +
            '                                <p class="pull-left">Cost Distributor</p>\n' +
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
            '                                <p class="pull-right bold">' + d.cost1 + '</p>\n' +
            '                                <p class="pull-left">Cost Price 1</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.cost2 + '</p>\n' +
            '                                <p class="pull-left">Cost Price 2</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.cost3 + '</p>\n' +
            '                                <p class="pull-left">Cost Price 3</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.cost_supplier + '</p>\n' +
            '                                <p class="pull-left">Cost Supplier</p>\n' +
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
            '                                <p class="pull-left">Qty 1</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty2 + '</p>\n' +
            '                                <p class="pull-left">Qty 2</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty3 + '</p>\n' +
            '                                <p class="pull-left">Qty 3</p>\n' +
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
            '                                <p class="pull-right bold">' + d.qty4 + '</p>\n' +
            '                                <p class="pull-left">Qty 4</p>\n' +
            '                            </div>\n' +
            '                            <div class="col-lg-12">\n' +
            '                                <p class="pull-right bold">' + d.qty5 + '</p>\n' +
            '                                <p class="pull-left">Qty 5</p>\n' +
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

    $(document).on('click', 'a.details-control', function (e) {
        var tr = $(this).closest('tr');
        var dt = '#' + $(this).closest('table').attr("id");
        if ($(this).hasClass('shown') && $(this).next().hasClass('row-details')) {
            $(this).removeClass('shown');
            $(this).next().remove();
            return;
        }
        var row = $(dt).DataTable().row(tr);

        $(this).parents('tbody').find('.shown').removeClass('shown');
        $(this).parents('tbody').find('.row-details').remove();

        row.child(_format(row.data())).show();
        tr.addClass('shown');
        tr.next().addClass('row-details');
    });

    $('.btn-delete-table').on('click', function (e) {
        console.log(e);
        $('#confirm-delete').modal('toggle');
        $('#confirm-yes').data('form', '#form_' + e.currentTarget.dataset.status);
    });

    $(document).on('click', ".btn-delete", function (e) {
        $('#confirm-delete').modal('toggle');
        $('#delete-id').val(e.currentTarget.dataset.id);
        $('#confirm-yes').data('form', '#delete-one');
    });

    $('#confirm-yes').on('click', function (e) {
        console.log($('#confirm-yes').data('form'));
        $($('#confirm-yes').data('form')).submit();
    });
</script>