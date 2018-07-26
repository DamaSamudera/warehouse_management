<script type="text/javascript">
    $(document).ready(function () {

        var source_supplier = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url:'<?= base_url('supplier/services/all'); ?>?query=%QUERY',
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

        source_supplier.initialize();

        $('#supplier').typeahead(null, {
            display: 'value',
            source: source_supplier.ttAdapter(),
            limit:10
        });

    });
</script>









<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('click', '.process', function () {
            $.ajax({
                url: "<?= base_url('logis_in/input_order_proses'); ?>",
                method: "POST",
                data: $('#form_input').serialize(),
                success: function (data) {
                    //console.log(data);
                    window.location.replace("<?= base_url('logis_in/daily_logis')?> ");
                }
            });

        });
    });
</script>