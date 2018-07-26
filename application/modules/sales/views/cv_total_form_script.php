<script type="text/javascript">
    function convertToAngka(rupiah)
    {
        return parseInt(rupiah.replace(/[^0-9]/g, ''), 10);
    }

    function convertToRupiah(angka)
    {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('')+',00';
    }

    function get_total(){
        $.ajax({
            url:"<?php echo base_url('sales/total_cart'); ?>",
            success:function(data)
            {
                $('#total').val(data);
                kalkulasi_bayar();
            }
        });
    }

    function kalkulasi_bayar() {
        var temp = ''+convertToAngka($('#total').val());
        var sub_total = parseFloat(temp.substring(0, temp.length-2));
        var tax = parseFloat(0);
        var special_discount = parseFloat($('#special_discount').val());
        var total_with_tax = sub_total + ((sub_total*tax)/100);
        var total = sub_total - ((total_with_tax * special_discount)/100);
        $('#pay').text(convertToRupiah(total));
        kalkulasi_kembali();
    }

    function kalkulasi_kembali(){
        var pay = $('#pay').text().split(',')[0];
        var cash = $('#cash').val().split(',')[0];
        if(pay == 'Rp. NaN'){
            $('#pay').text('Rp. 0,00');
        }else{
            var total = convertToAngka(cash) - convertToAngka(pay);
            $('#change').text(convertToRupiah(total));
        }
    }

    $(".payment").focusout(function(e){
        kalkulasi_bayar();
    });

    $(document).ready(function() {
        $("input:text").focus(function() { $(this).select(); } );
    });

    $(document).on('click', '.process', function(){
        var status = $(this).data("status");
        $.ajax({
            url:"<?= base_url('sales/process_sales'); ?>/" + status + "/<?= $this->uri->segment(3); ?>",
            method:"POST",
            data: $('#form_input').serialize(),
            success:function(data)
            {
                //console.log(data);
                //location.reload();
                window.location.replace("<?= base_url('sales')?>");
            }
        });

    });

    $(document).on('click', "#member-remove", function (e) {
        $('#member-form').html('');
    });


    $(document).on('keydown', '.payment', function (e) {
        var codemember = $(this).val();
        if (e.which == 13) {
            kalkulasi_bayar();
            return false;
        }
    });

    $(document).on('keydown', '#member-id', function (e) {
        var codemember = $(this).val();
        if (e.which == 13) {
            $.ajax({
                url: "<?php echo base_url('sales/add_member'); ?>",
                method: "POST",
                data: {codemember: codemember},
                success: function (data) {
                    $('#member-form').html(data);
                }
            });
            return false;
        }
    });

    get_total();
</script>