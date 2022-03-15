<div class="modal-header">
    <h4 class="">Signup</h4>
</div>
<div class="modal-body">
<?= form_open('signup', 'class="ajax-form"') ?>
    <div id="display-error"></div>
    <div class="row ml-0">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" maxlength="50" />
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile No." maxlength="10" />
            </div>
        </div>
        <!-- <div class="col-lg-12">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address" maxlength="50" />
            </div>
        </div> -->
        <!-- <div class="col-lg-12">
            <div class="form-group">
                <input type="text" name="school_name" class="form-control" placeholder="School / College Name" maxlength="100" />
            </div>
        </div> -->
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" maxlength="100" />
            <div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary col-lg-4">
                    Signup
                </button>
                <a onclick="getForm('login')" href="javascript:;">Login</a>
            </div>
        </div>
    </div>
<?= form_close() ?>
</div>