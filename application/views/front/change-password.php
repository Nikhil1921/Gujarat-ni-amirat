<div class="modal-header">
    <h4 class="">Change Password</h4>
</div>
<div class="modal-body">
<?= form_open('change-password', 'class="ajax-form"') ?>
    <div id="display-error"></div>
    <div class="row ml-0">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" maxlength="100" />
            <div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary col-lg-4">
                    Change
                </button>
            </div>
        </div>
    </div>
<?= form_close() ?>
</div>