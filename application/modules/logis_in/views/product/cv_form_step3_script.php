<script type="text/javascript">
    Dropzone.autoDiscover = false;
    $("#upload_file").dropzone({
        init: function () {
            // var thisDropzone = this;
            // $.get('upload.php', function (data) {
            //
            //     <!-- 5 -->
            //     $.each(data, function (key, value) {
            //
            //         var mockFile = {name: value.name, size: value.size};
            //
            //         thisDropzone.options.addedfile.call(thisDropzone, mockFile);
            //
            //         thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "uploads/" + value.name);
            //
            //     });

            // });

            // thisDropzone.on('success', function (file, response) {
            //     console.log('Error: ' + response);
            // });
        }
    });
</script>