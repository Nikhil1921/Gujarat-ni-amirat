<div class="modal-header">
    <h4 class="">Forgot Password</h4>
</div>
<div class="modal-body">
<?= form_open('forgot-password', 'class="ajax-form"') ?>
    <div id="display-error"></div>
    <div class="row ml-0">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile No." />
            </div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary col-lg-4">
                    Send OTP
                </button>
                <a onclick="getForm('login')" href="javascript:;">Login</a>
            </div>
        </div>
    </div>
<?= form_close() ?>
</div>