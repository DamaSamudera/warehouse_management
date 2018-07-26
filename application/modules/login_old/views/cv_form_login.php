<?= $this->session->flashdata('error') ?>

<!-- START Login Form -->
<form id="form-login" class="p-t-15" role="form" action="<?= base_url('login/process'); ?>" method="post">
    <!-- START Form Control-->
    <div class="form-group form-group-default required">
        <label><?= $this->lang->line('login_f_login'); ?></label>
        <div class="controls">
            <input type="text" name="username" placeholder="<?= $this->lang->line('login_i_login'); ?>" value="<?= $this->input->cookie('username',true); ?>" class="form-control" required>
        </div>
    </div>
    <!-- END Form Control-->
    <!-- START Form Control-->
    <div class="form-group form-group-default required">
        <label><?= $this->lang->line('login_f_pass'); ?></label>
        <div class="controls">
            <input type="password" class="form-control" name="password" placeholder="<?= $this->lang->line('login_i_pass'); ?>" value="<?= $this->input->cookie('password',true); ?>" required>
        </div>
    </div>
    <!-- START Form Control-->
    <div class="row">
        <div class="col-md-6 no-padding sm-p-l-10">
            <div class="checkbox ">
                <input type="checkbox" name="remember" value="1" id="remember">
                <label for="remember"><?= $this->lang->line('login_f_read'); ?></label>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-end">
            <a href="#" data-target="#modal_bantuan" data-toggle="modal" class="text-info small"><?= $this->lang->line('login_help'); ?></a>
        </div>
    </div>
    <!-- END Form Control-->
    <button class="btn btn-primary btn-cons m-t-10" type="submit"><?= $this->lang->line('login_f_button'); ?></button>
</form>
<!--END Login Form-->
