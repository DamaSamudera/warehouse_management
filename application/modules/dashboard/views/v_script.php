<?php $this->load->view('cv_monthly_statistic_script'); ?>
<?php $this->load->view('cv_order_statistic_script'); ?>
<script type="text/javascript">

        /**
         *
         */
        $(document).ready(function () {

            get_info_order_statistik();
            get_month_sale();

            $('#card-monthly-statistic').card({
                progress: 'circle',
                onRefresh: function () {
                    setTimeout(function () {
                        get_month_sale();

                        $('#card-monthly-statistic').card({
                            refresh: false
                        });
                    }, 2000);
                }
            });

            $('#card-order-statistic').card({
                progress: 'circle',
                onRefresh: function() {
                    setTimeout(function() {
                        get_info_order_statistik();
                        // Hides progress indicator
                        $('#card-order-statistic').card({
                            refresh: false
                        });
                    }, 2000);
                }
            });

            <?php if($this->session->flashdata('first_login')):?>
                $('body').pgNotification({
                    style: 'circle',
                    title: '<?= $this->session->userdata('name'); ?>',
                    message: "Welcome Back to FNS Management",
                    position: "top-right",
                    timeout: 50000,
                    type: "info",
                    thumbnail: '<img width="40" height="40" style="display: inline-block;" src="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">'
                }).show();
            <?php endif;?>
        });


</script>