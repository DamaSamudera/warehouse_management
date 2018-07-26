<script type="text/javascript">
    $(document).ready(function () {

        var source_supplier = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url:'<?= base_url('stock_orders/get_list_supplier'); ?>?query=%QUERY',
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