<script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('91df44dc3df0c8ce7c74', {
        cluster: 'ap1',
        encrypted: true
    });

    var channel = pusher.subscribe('shipping');
    channel.bind('request_shipping', function (data) {
        $.ajax({
            url: "<?= base_url('notification/save'); ?>",
            type: "POST",
            data: {
                id_store: data.id_store,
                id_warehouse: data.id_warehouse,
                content: data.content,
                status: data.status,
                type: data.type
            },
            success: function (data) {
                $("#no_notification").remove();
                $("#notifikasi").append(data);
                $("#notification-center").append('<span class="bubble"></span>');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    });

    $("#notifikasi").load("<?php echo base_url('notification/get_data'); ?>");
</script>