<div class="col-md-5 b-r b-dashed b-grey sm-b-b">
    <div class="padding-20 sm-padding-5 sm-m-t-15 m-t-50">
        <i class="fa fa-user-circle fa-2x hint-text"></i>
        <h2>Form Add Employee</h2>

    </div>
</div>
<div class="col-md-7">
    <div class="padding-30 sm-padding-5">
        <div class="form-group-attached">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee Code</label>
                        <input id='field-code' class='text-black form-control' name='code' type='text'
                               value="<?= $employee->code ?>"
                               maxlength='45' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee Name</label>
                        <input id='field-name' class='numeric form-control' name='name' type='text'
                               value="<?= $employee->name ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee Email</label>
                        <input id='field-email' class='numeric form-control' name='email' type='text'
                               value="<?= $employee->email ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Alamat Employee</label>
                        <input id='field-alamat' class='numeric form-control' name='address' type='text'
                               value="<?= $employee->address ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee Phone</label>
                        <input id='field-phone' class='numeric form-control' name='phone' type='text'
                               value="<?= $employee->phone ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default typehead">
                        <label for="name">Employee Store</label>
                        <input id='store' class='form-control' name='store_id' type='text' placeholder='Pilih Store'
                               value="<?= $employee->store_id ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee Username</label>
                        <input id='field-username' class='numeric form-control' name='username' type='text'
                               value="<?= $employee->username ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee Password</label>
                        <input id='field-password' class='numeric form-control' name='password' type='password'
                               value="<?= $employee->password ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label for="name">Employee PIN</label>
                        <input id='field-pin' class='numeric form-control' name='pin' type='password'
                               value="<?= $employee->pin ?>"
                               maxlength='45'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>