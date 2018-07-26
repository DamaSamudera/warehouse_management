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
                        console.log(result);
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
                url: "<?php echo base_url('sales/add_to_cart'); ?>",
                method: "POST",
                data: {product: product},
                success: function (data) {
                    $('#cart_details').html(data);
                    $('.add_cart').val('');
                    get_total();
                }
            });
            return false;
        }
    });

    $(document).on('click', '.remove_cart', function (e) {
        e.preventDefault();
        var row_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url('sales/remove_cart'); ?>",
            method: "POST",
            data: {row_id: row_id},
            success: function (data) {
                $('#cart_details').html(data);
                get_total();
            }
        });
        console.log("Remove Cart");
        console.log(row_id);
        return false;
    });

    function updatecart(component) {
        var row_id = component.data("id");
        var field = component.data("field");
        var value = component.val();
        $.ajax({
            url: "<?php echo base_url('sales/update_cart'); ?>",
            method: "POST",
            data: {row_id: row_id, field: field, value: value},
            success: function (data) {
                $('#cart_details').html(data);
                $('.add_cart').val('');
                get_total();
            }
        });
    }

    $(document).on('keydown', '.update_cart', function (e) {
        if (e.which == 13) {
            updatecart($(this));
            return false;
        }
    });

    $(document).on('focusout', '.update_cart', function (e) {
        e.preventDefault();
        updatecart($(this));
        return false;
    });

    $(document).ready(function() {
        $('.cs-options').on('click', 'li', function (komponen) {
            var value = $(this).data("value");
            console.log(value);
            $('#payment_type').val(value);
            var payment_type = $('#payment_type').val();
            $.ajax({
                url: "<?php echo base_url('sales/update_price'); ?>",
                method: "POST",
                data: {payment_type: payment_type},
                success: function (data) {
                    console.log(data);
                    $('#cart_details').html(data);
                }
            });
        });
    });
</script>