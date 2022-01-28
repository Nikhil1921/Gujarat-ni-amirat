<div class="modal-header">
    <h4 class="">Check OTP</h4>
</div>
<div class="modal-body">
<?= form_open('check-otp', 'class="ajax-form"') ?>
    <div id="display-error"></div>
    <div class="row ml-0">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="otp" class="form-control" placeholder="OTP" maxlength="4" />
            </div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary col-lg-4">
                    Check OTP
                </button>
            </div>
        </div>
    </div>
<?= form_close() ?>
</div>