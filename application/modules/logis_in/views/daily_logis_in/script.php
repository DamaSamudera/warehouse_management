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
            "ajax": "<?= base_url('logis_in/services/daily_logis_in'); ?>",
            "columns": [
                {"data": 'code'},
                {"data": 'created'},
                {"data": null},
                {"data": null},
                {"data": 'faktur_supplier'},
                {"data": null},
                {"data": null}
            ],
            "order": [[1, "desc"]],
            'columnDefs': [
                {
                    'targets': 2,
                    'render': function (data, type, full, meta) {
                        if(data.supplier){
                            return '<span class="label label-success">' + data.supplier + '</span>';
                        }else{
                            return '<span class="label label-success">' + data.from_name + '</span>';
                        }
                    }
                },
                {
                    'targets': 3,
                    'render': function (data, type, full, meta) {
                            var req = (data.sum_rq) ? data.sum_rq : '-';
                            var rec = (data.sum_rc) ? data.sum_rc : '-';
                            return  '<span class="col-sm-8 label label-warning">Req : ' + req + '</span><br/><br/>' +
                                    '<span class="col-sm-8 label label-success">Rec : ' + rec + '</span>';
                    }
                },
                {
                    'targets': 5,
                    'render': function (data, type, full, meta) {
                        console.log(data);
                        return '<span class="label label-success">' + data.status + '</span>';
                    }
                },
                {
                    "targets": 6,
                    'searchable': false,
                    'orderable': false,
                    "render": function (data, type, row, meta) {
                            return  '<span style="margin-right: 10px"><a class="text-primary details-control" data-id="\'+data.id+\'" href="#"> <i class="fa fa-eye"></i></a></span>' ;
                    }
                }]
        };

        table.dataTable(settings);

        //search datatable
        $('#search-table').keyup(function () {
            table.fnFilter($(this).val());
        });

    }

    var _format = function (d) {
        // `d` is the original data object for the row
        // console.log(d);
        var data_detail = null;
        $.ajax({
            url: "<?php echo base_url('logis_in/services/detail_logis_in'); ?>",
            method: "POST",
            data: {inventory: d.id},
            success: function (data) {
                $('.detail').html('');
                var total = 0;
                var totalqty =0;
                for(var i = 0; i < data.length; i++){
                    var rec = (data[i].received_qty) ? data[i].received_qty : '-';
                    $('.detail').append('<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' +data[i].barcode+ '</td>' +
                        '<td>' +data[i].name+ '</td>' +
                        '<td>' +data[i].description+ '</td>' +
                        '<td>' +rec+ '</td>' +
                        '<td>' +toRupiah((data[i].received_qty*data[i].supply_price))+ '</td>' +
                        '</tr>');
                        totalqty += (parseInt(rec));
                    total += (data[i].received_qty*data[i].supply_price);
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

    $(document).ready(function(){
        //call
        initTableWithSearch();

    });
</script>