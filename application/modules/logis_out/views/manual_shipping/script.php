<script type="text/javascript">

    function toRupiah(bilangan) {
        var	reverse = bilangan.toString().split('').reverse().join(''),
            ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
        return "Rp." + ribuan;
    }

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
            "ajax": "<?= base_url('logis_out/services/shipping_all'); ?>",
            "columns": [
                {"data": 'code'},
                {"data": 'modified'},
                {"data": 'des_name'},
                {"data": null},
                {"data": 'inp_name'},
                {"data": null}
            ],
            "order": [[1, "desc"]],
            'columnDefs': [
                {
                    "targets": 3,
                    "render": function (data, type, row, meta) {
                        console.log(data);
                        return '<span class="label label-success">' + data.status + '</span>';
                    }
                },
                {
                    "targets": 5,
                    'searchable': false,
                    'orderable': false,
                    "render": function (data, type, row, meta) {
                        return '<span style="margin-right: 10px">' +
                            '<a data-toggle="modal" class="text-danger btn-delete" data-id="' + data.id + '"> <i class="pg-trash_line"> </i></a>' +
                            // '</span><span style="margin-right: 10px"><span><a class="text-success btn_action_form" data-status="edit" data-id="' + data.id + '" href="<?= base_url("logis_in/approve/"); ?>' + data.id + '"><i class="fa fa-check"></i></a></span>' +
                            '<span style="margin-right: 10px"><a class="text-success details-control" data-id="\'+data.id+\'" href="#"> <i class="fa fa-eye"> </i></a></span>' +
                            '<span><a class="text-success btn_action_form" data-status="edit" data-id="\' + data.id + \'" href="<?= base_url("logis_out/surat_jalan/"); ?>' + data.id + '"><i class="fa fa-file-text-o"> </i></a></span>';

                    }
                }]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table').keyup(function () {
            table.fnFilter($(this).val());
        });

    };
    
    var _format = function (d) {
        // `d` is the original data object for the row
        // console.log(d);
        var data_detail = null;
        $.ajax({
            url: "<?php echo base_url('logis_out/services/shipping_detail'); ?>",
            method: "POST",
            data: {inventory: d.id},
            success: function (data) {
                $('.detail').html('');
                data = data.data;
                var total = 0;
                var totalqty = 0;
                for(var i = 0; i < data.length; i++){
                    var req = (data[i].request_qty) ? data[i].request_qty : '-';
                    $('.detail').append('<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' +data[i].barcode+ '</td>' +
                        '<td>' +data[i].name+ '</td>' +
                        '<td>' +data[i].description+ '</td>' +
                        '<td>' +req+ '</td>' +
                        '<td>' +toRupiah((data[i].request_qty*data[i].delivery_price))+ '</td>' +
                        '</tr>');
                    totalqty += (parseInt(req));
                    total += (data[i].request_qty*data[i].delivery_price);
                }
                $('.total').html('<tr><td colspan="4" class="text-right">Total</td><td>'+totalqty+'</td><td>'+toRupiah(total)+'</td></tr>');
            }
        });
        return '<table class="table table-inline">' +
            '<thead>' +
            '<tr>' +
            '<th style="width: 5%;">No</th>' +
            '<th style="width: 20%;">Barcode</th>' +
            '<th style="width: 20%;">Nama Product</th>' +
            '<th style="width: 20%;">Deskripsi</th>' +
            '<th style="width: 15%;">Qty</th>' +
            '<th style="width: 20%;">Subtotal</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody class="detail">' +
            '<tr>' +
            '<td colspan="6">No Detail</td>' +
            '</tr>' +
            '</tbody>' +
            '<tfoot class="total">' +
            '</tfoot>' +
            '</table>';


    }

    $(document).on( 'click', 'a.details-control', function (e) {
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
    } );

    $(document).ready(function(){
        //call
        initTableWithSearch();

    });

</script>