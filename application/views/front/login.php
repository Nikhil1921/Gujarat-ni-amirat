<div class="modal-header">
    <h4 class="">Login</h4>
</div>
<div class="modal-body">
<?= form_open('login', 'class="ajax-form"') ?>
    <div id="display-error"></div>
    <div class="row ml-0">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile No." />
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" />
            <div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary col-lg-4">
                    Login
                </button>
                <a onclick="getForm('forgot-password')" href="javascript:;">Forgot Password</a>
                <a onclick="getForm('signup')" href="javascript:;">Signup</a>
            </div>
        </div>
    </div>
<?= form_close() ?>
</div>