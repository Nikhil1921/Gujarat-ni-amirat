<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="header check-color" data-color="#fce373">
		<div class="buy-book check-color" data-color="#fce373">
        <div class="container">
        <div class="row login_main">
            
            <div class="col-lg-6 log_in_content">
                <div class="login">
                    <h2>Sign Up</h2>
                </div>
                <div class="log_in_page">
                    <h4><b>Name</b></h4>
				    <input type="text" name="name" class="form" placeholder="Enter your name" value="<?= set_value('name') ?>">
                    <h4 class="lgn_h4"><b>Email Address</b></h4>
				    <input type="text" name="name" class="form" placeholder="Email Address" value="<?= set_value('name') ?>">
                    <h4 class="lgn_h4"><b>Mobile Number</b></h4>
				    <input type="text" name="name" class="form" placeholder="Enter your Mobile Number" value="<?= set_value('name') ?>">
                    <h4 class="lgn_h4"><b>School Name</b></h4>
				    <input type="text" name="name" class="form" placeholder="School Name" value="<?= set_value('name') ?>">
                    <h4 class="lgn_h4"><b>College Name</b></h4>
				    <input type="text" name="name" class="form" placeholder="College Name" value="<?= set_value('name') ?>">
                    <h4 class="lgn_h4"><b>Password</b></h4>
				    <input type="text" name="name" class="form" placeholder="Enter your Password" value="<?= set_value('name') ?>">
                </div>
                <div class="log_in_btn">
                    <a class="lg_btn" href="#">Sign Up</a>
                </div>
            </div>

            <div class="col-lg-6 log_in_content_right">
                <div class="login">
                    <h2>Log in</h2>
                </div>
                <div class="log_in_page">
                    
                    <h4><b>Email Address</b></h4>
				    <input type="text" name="name" class="form" placeholder="Email Address" value="<?= set_value('name') ?>">
                    <h4 class="lgn_h4"><b>Password</b></h4>
				    <input type="text" name="name" class="form" placeholder="Enter your Password" value="<?= set_value('name') ?>">
                    
                </div>
                <div class="main_ftr">
                    <div class="left_ftr">
                        <h6><a class="ftr_a" href="#">Forget password</a></h6>
                    </div>
                    <div class="right_ftr">
                        <h6><a class="ftr_a" href="#">Sign Up</a></h6>
                    </div>
                </div>
                <div class="log_in_btn">
                    <a class="lg_btn" href="#">Log In</a>
                </div>
            </div>
        </div>
        </div>
			<!-- <div class="row">
				<div class="col-lg-12">
					<div class="book-part-1">
						<img src="<?= assets('images/book-purchase-final.png') ?>">
						<div class="book-form">
							<?= form_open() ?>
							<div class="form-group">
								<label for="name"><b>Name</b></label>
								<input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?= set_value('name') ?>">
								<?= form_error('name') ?>
							</div>
							<div class="form-group">
								<label for="email"><b>Email Id</b></label>
								<input type="text" name="email" class="form-control" placeholder="Enter your email address" value="<?= set_value('email') ?>">
								<?= form_error('email') ?>
							</div>
							<div class="form-group">
								<label for="phone"><b>Contact number</b></label>
								<input type="text" name="phone" class="form-control" placeholder="Enter your contact number" value="<?= set_value('phone') ?>" maxlength="10">
								<?= form_error('phone') ?>
							</div>
							<div class="form-group street">
								<label for="street"><b>Society / Appartment No.</b></label><br>
								<input type="text" name="street" class="form-control" placeholder="Society or appartment no." value="<?= set_value('street') ?>">
								<?= form_error('street') ?>
							</div>
							<div class="form-group place">
								<label for="place"><b>Nearby places</b></label><br>
								<input type="text" name="nearbyplace" class="form-control" placeholder="Nearby places or landmark" value="<?= set_value('nearbyplace') ?>">
								<?= form_error('nearbyplace') ?>
							</div>
							<div class="form-group city">
								<label for="city"><b>City</b></label><br>
								<input type="text" name="city" class="form-control" placeholder="City" value="<?= set_value('city') ?>">
								<?= form_error('city') ?>
							</div>
							<div class="form-group zip-code">
								<label for="pin"><b>Pin code</b></label><br>
								<input type="text" name="pincode" class="form-control" placeholder="Pin code" value="<?= set_value('pincode') ?>">
								<?= form_error('pincode') ?>
							</div>
							<p class="courior"><b>(Including free delivery)</b><br>
								<button type="submit" class="btn btn-primary">Submit</button>
								<?= form_close() ?>
							</div>
							<hr>
							<div class="vl"></div>
						</div>
					</div>
				</div>
			</div> -->


		</div>
	</div>
</div>