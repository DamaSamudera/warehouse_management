<!-- BEGIN VENDOR JS -->
<!-- BEGIN VENDOR JS -->
<script src="<?= base_url('assets/plugins/pace/pace.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/modernizr.custom.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/tether/js/tether.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/jquery/jquery-easy.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/jquery-unveil/jquery.unveil.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/jquery-bez/jquery.bez.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-actual/jquery.actual.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/classie/classie.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/js/jquery.validate.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/plugins/switchery/js/switchery.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jquery-autonumeric/autoNumeric.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-filestyle/jquery-filestyle.min.js') ?>"></script>
<script src="<?= base_url("assets/plugins/skycons/skycons.js") ?>" type="text/javascript"></script>
<!-- END VENDOR JS -->

<!-- LOAD PLUGIN -->
<?= $js_templates; ?>

<!-- BEGIN CORE TEMPLATE JS -->
<script src="<?= base_url('assets/pages/js/pages.js') ?>" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->

<!-- BEGIN PAGE LEVEL JS -->
<script src="<?= base_url('assets/js/scripts.js') ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->

<!-- Custome Script -->
<?php if(isset($script_content)) $this->load->view($script_content); ?>

<?php
if($this->uri->segment(1) != 'login' && $this->uri->segment(1) != 'lockscreen') {
    //$this->load->view('lockscreen/v_script');
    //$this->load->view('notification/notification_script');
    $this->load->view('note/v_script');
}
?>

<script>

    $(document).ready(function(){
        $( ".fr-wrapper div" ).first().css( "display", "none" );
        console.log($(".fr-wrapper"));
    });
</script>
</body>
</html>