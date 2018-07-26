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

        $('#store').typeahead(null, {
            display: 'value',
            source: source_supplier.ttAdapter(),
            limit:10
        });

        $('#datepicker-component2').datepicker({ dateFormat: 'yyyy-mm-dd' });

    });
</script>