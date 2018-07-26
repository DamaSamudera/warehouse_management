<script type="text/javascript">

    var noteid = '';
    var newnote = true;
    $(document).on('click', '.list > ul > li', function(e) {
        newnote = false;
        noteid = $(this).find('.note-id').val();
    });

    $(".new-note-link").click(function(e) {
        newnote = true;
    });

    $(".close-note-link").click(function(e) {
        var valuenote = $(".quick-note-editor").html();
        var uri = (newnote) ? "<?= base_url('note/proses'); ?>" : "<?= base_url('note/proses'); ?>/" + noteid;
        $.ajax({
            url : uri,
            type: "POST",
            data: {valuenote: valuenote, id: noteid},
            success: function(data)
            {
                //alert("success" + data);
                $("#note-list-item").load("<?php echo base_url('note/get_data'); ?>");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    });

    $("#note-list-item").load("<?php echo base_url('note/get_data'); ?>");

    $(".btn-remove-notes").click(function(e) {
        e.preventDefault();
        $.ajax({
            url : "<?= base_url('note/delete'); ?>",
            type: "POST",
            data: $("#quick-note-list").serialize(),
            success: function(data)
            {
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
        return false;
    });

</script>