<script type="text/javascript">
    $(document).ready(function () {

        var source_inventory = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url:'<?= base_url('product/services/all_inventory'); ?>?query=%QUERY',
                wildcard: '%QUERY',
                filter: function (results) {
                    // Map the remote source JSON array to a JavaScript object array
                    return $.map(results, function (result) {
                        return {
                            value: (result.barcode + " | " + result.name)
                        };
                    });
                }
            }
        });

        source_inventory.initialize();

        $('#product').typeahead(null, {
            display: 'value',
            source: source_inventory.ttAdapter(),
            limit:10
        });

    });

    $(document).on('keydown', '.add_cart', function (e) {
        var product = $(this).val();
        if (e.which == 13) {
            $.ajax({
                url: "<?php echo base_url('logis_out/add_to_cart'); ?>",
                method: "POST",
                data: {product: product},
                success: function (data) {
                    $('#cart_details').html(data);
                    $('.add_cart').val('');
                }
            });
        }
    });

    $(document).on('click', '.remove_cart', function (e) {
        e.preventDefault();
        var row_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url('logis_out/remove_cart'); ?>",
            method: "POST",
            data: {row_id: row_id},
            success: function (data) {
                $('#cart_details').html(data);
            }
        });
        console.log("Remove Cart");
        console.log(row_id);
        return false;
    });

    $(document).on('change', '.update_cart', function (e) {
        updatecart($(this));

    });

    function updatecart(component) {
        var row_id = component.data("id");
        var field = component.data("field");
        var value = component.val();
        $.ajax({
            url: "<?php echo base_url('logis_out/update_cart'); ?>",
            method: "POST",
            data: {row_id: row_id, field: field, value: value},
            success: function (data) {
                $('#cart_details').html(data);
                $('.add_cart').val('');
                get_total();
            }
        });
    }

    $(document).on('click', '.process', function(){
        $.ajax({
            url:"<?= base_url('logis_out/manual_shipping_proses'); ?>",
            method:"POST",
            data: $('#form_input').serialize(),
            success:function(data)
            {
                //console.log(data);
                window.location.replace("<?= base_url('logis_out/surat_jalan')?>/" + data.id_shipping + "/Manual Shipping");
            }
        });

    });
    
    
    
    
    
    $(document).ready(function () {

        if (window.FileReader) {
            $('#filePDT').on('change', function (e) {
                alert("Changed");
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var csv = reader.result.split('\n');
                    $('#textarea1').val(csv.join('\n'));
                    for(var i = 0; i < csv.length-1; i++){
                            var csv_result = csv[i].split(',');
                            console.log("Barcode " + csv_result[3]);
                            console.log("Qty " + csv_result[4]);
                        $.ajax({
                            url: "<?php echo base_url('logis_out/add_to_cart_file'); ?>",
                            method: "POST",
                            data: {barcode: csv_result[3], qty: csv_result[4]},
                            success: function (data) {
                                console.log(data);
                                $('#cart_details').html(data);
                            }
                        });
                    }

                }
                reader.readAsText(file);
            });
        } else {
            console.log("no support");
        }

    });
</script>