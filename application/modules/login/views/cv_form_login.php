<?= $this->session->flashdata('error') ?>

<!-- START Login Form -->
<form id="form-login" class="p-t-15" role="form" action="<?= base_url('login/process'); ?>" method="post">
    <!-- START Form Control-->
    <div class="form-group form-group-default required">
        <label>Username</label>
        <div class="controls">
            <input type="text" name="username" placeholder="Masukan Username" value="<?= $this->input->cookie('username',true); ?>" class="form-control" required>
        </div>
    </div>
    <!-- END Form Control-->
    <!-- START Form Control-->
    <div class="form-group form-group-default required">
        <label>Password</label>
        <div class="controls">
            <input type="password" class="form-control" name="password" placeholder="Masukan Password" value="<?= $this->input->cookie('password',true); ?>" required>
        </div>
    </div>
    <!-- START Form Control-->
    <div class="row">
        <div class="col-md-6 no-padding sm-p-l-10">
            <div class="checkbox ">
                <input type="checkbox" name="remember" value="1" id="remember">
                <label for="remember">remember me</label>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-end">
            <a href="#" data-target="#modal_bantuan" data-toggle="modal" class="text-info small">help</a>
        </div>
    </div>
    <!-- END Form Control-->
    <button class="btn btn-warning btn-cons m-t-10" type="submit">Login</button>
</form>
<!--END Login Form-->
