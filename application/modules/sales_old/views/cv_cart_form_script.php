<script type="text/javascript">
    $(document).on('keydown', '.add_cart', function (e) {
        e.preventDefault();
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
        }
        console.log("Add Cart");
        console.log(product);
        return false;
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

    $(document).on('focusout', '.update_cart', function (e) {
        e.preventDefault();
        var row_id = $(this).data("id");
        var field = $(this).data("field");
        var value = $(this).val();
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
        console.log("Update Cart");
        console.log(row_id);
        return false;
    });
</script>