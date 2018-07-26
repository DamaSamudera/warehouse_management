<script type="text/javascript">
    $(document).ready(function() {
        $('#form-login').validate();

        $('.edit-froala').froalaEditor({
            toolbarVisibleWithoutSelection: true,
            toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'color', 'emoticons', '-', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '-', 'insertImage', 'insertLink', 'insertFile', 'insertVideo', 'undo', 'redo'],
            toolbarButtonsXS: null,
            toolbarButtonsSM: null,
            toolbarButtonsMD: null
        })
    });
</script>