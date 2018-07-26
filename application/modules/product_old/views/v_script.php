<?php $this->load->view('cv_information_script'); ?>
<?php $this->load->view('cv_table_product_script'); ?>

<script type="text/javascript">

    $(document).ready(function(){
        statistic_information();
        //call
        initTableWithSearch('active');
        initTableWithSearch('inactive');

    });

</script>
