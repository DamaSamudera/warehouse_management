<script type="text/javascript">
    var idleTime = 0;
    $(document).ready(function () {
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 6000); // 1 minute
        // var idleInterval = setInterval(timerIncrement, 600);

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });
    });

    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 50) {
            window.location.replace("<?= base_url("lockscreen"); ?>");
        }
    }
</script>