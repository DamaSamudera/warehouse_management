<script type="text/javascript">


    $(document).on('click', '.process', function(){
        var status = $(this).data("status");
        $.ajax({
            url:"<?= base_url('logis_indata/proses'); ?>/" + status + "/<?= $this->uri->segment(3); ?>",
            method:"POST",
            data: $('#form_input').serialize(),
            success:function(data)
            {
                console.log(data);
                //location.reload();
                //window.location.replace("<?= base_url('logis_in')?>");
            }
        });

    });


    $(document).on('change', '.update_cart', function (e) {
        updatecart($(this));

    });

    function updatecart(component) {
        var row_id = component.data("id");
        var field = component.data("field");
        var value = component.val();
        $.ajax({
            url: "<?php echo base_url('logis_in/update_cart'); ?>",
            method: "POST",
            data: {row_id: row_id, field: field, value: value},
            success: function (data) {
                $('#cart_details').html(data);
                $('.add_cart').val('');
                get_total();
            }
        });
    }
</script>