<?php $this->load->view('cv_head'); ?>
    <body class="fixed-header menu-pin menu-behind">
    <?php if (isset($view_content)): ?>
        <?php $this->load->view($view_content); ?>
    <?php endif; ?>
<?php $this->load->view('cv_tail'); ?>