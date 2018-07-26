<script type="text/javascript">

    var initTableWithSearch = function () {
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
            "ajax": "<?= base_url('logis_in/get_data'); ?>",
            "columns": [

                {
                    "data": "so_code",
                    "className": "v-align-middle"
                },
                {
                    "data": "created",
                    "className": "v-align-middle"
                },
                {
                    "data": "supplier",
                    "className": "v-align-middle"
                },
                {"data": null},
                {
                    "data": "sum_sp",
                    "className": "v-align-middle"
                },
                {
                    "data": "faktur_supplier",
                    "className": "v-align-middle"
                },
                {"data": null},
                {"data": null}
            ],
            "order": [[1, "desc"]],
            'columnDefs': [
                {
                    'targets': 3,
                    'className': 'v-align-middle',
                    'render': function (data, type, full, meta) {
                        var req = (data.sum_rq) ? parseInt(data.sum_rq) : 0;
                        var sed = (data.sum_sq) ? parseInt(data.sum_sq) : 0;
                        var rec = (data.sum_rc) ? parseInt(data.sum_rc) : 0;

                        var hasil = "";
                        if (sed >= req) {
                            hasil = "<p class=\"font-montserrat text-complete no-margin fs-16\">\n" +
                                        "<i class=\"fa fa-caret-up\"></i> +" + sed + "\n" +
                                        "<span class=\"font-arial fs-12 hint-text m-l-5\">" + req + "</span>\n" +
                                    "</p>";
                        }

                        if(rec < req){
                            hasil = "<p class=\"font-montserrat text-danger no-margin fs-16\">\n" +
                                "<i class=\"fa fa-caret-down\"></i> " + (rec-req) + "\n" +
                                "<span class=\"font-arial fs-12 hint-text m-l-5\">" + req + "</span>\n" +
                                "</p>";
                        }

                        return hasil;
                    }
                },
                {
                    'targets': 6,
                    'className': 'v-align-middle',
                    'render': function (data, type, full, meta) {
                        console.log(data);
                        return '<span class="label label-success">' + data.status + '</span>';
                    }
                },
                {
                    "targets": 7,
                    'searchable': false,
                    'orderable': false,
                    "className": "v-align-middle",
                    "render": function (data, type, row, meta) {
                        var sts = (data.sts);
                         if (sts == "stock order"){
                        return '<span style="margin-right: 10px">' +
                            '<a data-toggle="modal" class="text-danger btn-delete" data-id="' + data.id + '"><i class="pg-trash_line"></i></a>' +
                            '</span><span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="' + data.id + '" href="<?= base_url("logis_in/action_form/"); ?>' + data.id + '"><i class="fa fa-check"></i></a></span>';
                        } else if(sts =="process"){
                            return '<span style="margin-right: 10px">' +
                            '<a data-toggle="modal" class="text-danger btn-delete" data-id="' + data.id + '"><i class="i class="fa fa-eye"></i></a></span>' +
                            '</span><span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="' + data.id + '" href="<?= base_url("logis_in/action_form/"); ?>' + data.id + '"><i class="fa fa-eye""></i></a></span>';
                        }
                    }
                }]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table').keyup(function () {
            table.fnFilter($(this).val());
        });

        //select checkbox
        $('#table').on('click', 'input[type=checkbox]', function () {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected');
            } else {
                $(this).closest('tr').removeClass('selected');
            }
        });

    }

    $('.btn-delete-table').on('click', function (e) {
        console.log(e);
        $('#confirm-delete').modal('toggle');
        $('#confirm-yes').data('form', '#form');
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