<script type="text/javascript">
    /**
     *
     */
    function get_month_sale() {
        $.ajax({
            url: '<?= base_url('assets/sample/dashboard_monthly_statistik.json')?>',
            type: "GET",
            success: function (data) {
                console.log(data);
                //if success close modal and reload ajax table
                $("#order_val").html(data.data.order);
                $("#return_val").html(data.data.return);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }
</script>