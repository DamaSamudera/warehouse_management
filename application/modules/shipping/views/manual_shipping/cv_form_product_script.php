<script type="text/javascript">
    $(document).ready(function () {

        var source_inventory = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url:'<?= base_url('shipping/get_list_inventory'); ?>?query=%QUERY',
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
                url: "<?php echo base_url('shipping/add_to_cart'); ?>",
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
            url: "<?php echo base_url('shipping/remove_cart'); ?>",
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

    $(document).on('click', '.process', function(){
        var status = $(this).data("status");
        $.ajax({
            url:"<?= base_url('shipping'); ?>/" + status + "/<?= $this->uri->segment(3); ?>",
            method:"POST",
            data: $('#form_input').serialize(),
            success:function(data)
            {
                console.log(data);
                //location.reload();
                window.location.replace("<?= base_url('shipping/complete')?>");
            }
        });

    });


    $(document).ready(function () {

        if (window.FileReader) {
            $('#file1').on('change', function (e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var csv = reader.result.split(',');
                    $('#textarea1').val(csv.join('\n'));
                    for(var i = 0; i < csv.length; i++){
                        if(i % 3 == 0 || i % 4 == 0 ){
                            console.log("Hasil " + csv[i]);
                        }
                    }

                }
                reader.readAsText(file);
            });
        } else {
            console.log("no support");
        }

    });
</script>