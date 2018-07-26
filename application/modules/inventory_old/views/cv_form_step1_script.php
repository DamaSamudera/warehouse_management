<script type="text/javascript">
    $(document).ready(function() {
        $('input:checkbox[name=is_active]').attr('checked', false);
        var init = new Switchery('#is_active');
    });

    $(document).ready(function () {

        var source_inventory = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url:'<?= base_url('inventory/get_list_product'); ?>?query=%QUERY',
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
</script>