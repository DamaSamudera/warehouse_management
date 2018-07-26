<script type="text/javascript">
    $(document).ready(function () {

        var source_inventory = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url:'<?= base_url('stock_orders/get_list_inventory'); ?>?query=%QUERY',
                wildcard: '%QUERY',
                filter: function (results) {
                    // Map the remote source JSON array to a JavaScript object array
                    return $.map(results, function (result) {
                        return {
                            value: (result.code + " | " + result.name)
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
                url: "<?php echo base_url('stock_orders/add_to_cart'); ?>",
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
            url: "<?php echo base_url('stock_orders/remove_cart'); ?>",
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
            url: "<?php echo base_url('stock_orders/update_cart'); ?>",
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
        var status = $(this).data("stock order");
        $.ajax({
            url:"<?= base_url('stock_orders/process'); ?>/" + status + "/<?= $this->uri->segment(3); ?>",
            method:"POST",
            data: $('#form_input').serialize(),
            success:function(data)
            {
                console.log(data);
                //location.reload();
                window.location.replace("<?= base_url('stock_orders')?>");
            }
        });

    });
</script>