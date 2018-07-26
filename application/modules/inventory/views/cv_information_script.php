<script type="text/javascript">
    function statistic_information() {
        $.ajax({
            url: '<?= base_url('assets/sample/product_statistic.json')?>',
            type: "POST",
            success: function (data) {
                console.log(data);
                data = data.statistik;
                $('#last_modified').html(data.product.update);
                $('#active_product').html(data.product.active_product);
                $('#percent_active').html(parseFloat(data.product.percent_product).toFixed(2));
                $('#percent_progress').attr('style', 'width: ' + data.product.percent_product + '%');
                $('#sales_description').html('<h5 class="hint-text no-margin bold">' + data.seller.product_barcode + '-' + data.seller.product_name + '</h5>\n' +
                    '                                <h5 class="small font-montserrat hint-text no-margin">BEST SELLERS until ' + data.seller.sales_date + '</h5>\n' +
                    '                                <h3 class="m-b-0 text-complete">' + data.seller.qty + ' pcs</h3>');

                $('#card-circular').card({
                    refresh: false
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    $('#card-product-statistic').card({
        progress: 'circle',
        onRefresh: function() {
            setTimeout(function() {
                statistic_information();
                // Hides progress indicator
                $('#card-product-statistic').card({
                    refresh: false
                });
            }, 2000);
        }
    });
</script>