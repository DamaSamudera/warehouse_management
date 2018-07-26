<script type="text/javascript">
    $(document).ready(function () {

        var source_supplier = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '<?= base_url('product/get_list_supplier'); ?>?query=%QUERY',
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
            limit: 10
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        var source_category = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '<?= base_url('product/get_list_category'); ?>?query=%QUERY',
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

        source_category.initialize();

        $('#category').typeahead(null, {
            display: 'value',
            source: source_category.ttAdapter(),
            limit: 10
        }).on('typeahead:select', function (event, selection) {
            var kategori = $('#category').val();
            kategori = kategori.substring(0, 2);
            var fullDate = new Date();
            console.log(fullDate);
            var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : (fullDate.getMonth() + 1);

            if (twoDigitMonth < 10) twoDigitMonth = "0" + twoDigitMonth;
            var twoDigitDate = fullDate.getDate() + "";
            if (twoDigitDate < 10) twoDigitDate = "0" + twoDigitDate;
            var twoDigitYear = (fullDate.getFullYear() + "").substring(4, 3);
            var currentDate = twoDigitYear + "" + twoDigitMonth + "" + twoDigitDate;
            var barcode = "<?= substr($this->session->userdata('area'),0, 1); ?>" + kategori + currentDate;
            $.ajax({
                url: "<?php echo base_url('product/get_id_product'); ?>",
                method: "POST",
                data: {category: barcode},
                success: function (data) {
                    console.log(data);
                    $('#field-code').val(barcode + "" + data);
                }
            });

        });


    });
</script>