<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12 check-color"  data-color="#cca69a" style="background-color: #cca69a">
			<div class="container">
				<div class="write-here-head">
					<h3>Register for events here</h3>
					<div class="write-here">
						<?= form_open() ?>
							<div class="form-group">
								<label for="name"><b>Name</b></label>
								<input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?= set_value('name') ?>">
								<?= form_error('name') ?>
							</div>
							<div class="form-group">
								<label for="phone"><b>Phone number</b></label>
								<input type="text" name="phone" class="form-control" placeholder="Enter your Phone number" value="<?= set_value('phone') ?>" maxlength="10">
								<?= form_error('phone') ?>
							</div>
							<!-- <div class="form-group">
								<label for="school"><b>School name</b></label>
								<input type="text" name="school" class="form-control" placeholder="Enter your school name" value="<?= set_value('school') ?>" maxlength="150">
								<?= form_error('school') ?>
							</div> -->
							<div class="form-group">
								<label for="city"><b>City</b></label>
								<input type="text" name="city" class="form-control" placeholder="Enter your City" value="<?= set_value('city') ?>" maxlength="150">
								<?= form_error('city') ?>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 col-sm-12" style="background-color: #000">
			<div class="written-info">
				<h2><u>NOTE</u></h2>
				<p>
					<?php if ($blogs): ?>
			<?php foreach ($blogs as $b): ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="post">
					<div class="post-heading">
						<div class="title">
							<p><b>Title :</b> <?= $b['title'] ?></p>
						</div>
						<div class="title">
							<p><b>FROM :</b> <?= date('d-m-Y h:i A', strtotime($b['from_date'].' '.$b['from_time'])) ?></p>
							<p><b>TO :</b> <?= date('d-m-Y h:i A', strtotime($b['to_date'].' '.$b['to_time'])) ?></p>
						</div>
					</div>
					<div class="post-details">
						<div class="desc">
							<p><?= $b['description'] ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4">
							<img class="img_note" src="http://localhost/gujaratniamirat/assets/images/write-letter.png" alt="">
						</div>
						<div class="col-lg-8">
							<h5 class="note_h5">Invite your friends to join our event</h5>
							<ul class="note_ul">
								<li><a href="https://www.facebook.com/sharer.php?u=<?= current_url(); ?>" target="_blank"><i class="fab fa-facebook-f social_icon"></i></a></li>
								<li><a href="https://api.whatsapp.com/send?text=<?= current_url(); ?>" target="_blank"><i class="fab fa-whatsapp social_icon"></i></a></li>
								<li><a href="https://twitter.com/share? <?= current_url(); ?>" target="_blank"><i class="fab fa-twitter social_icon"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<hr>
			</div>
			<?php endforeach ?>
					<?php else: ?>
					NO Post Available.
					<?php endif ?>
				</div>
				</p>
			</div>
			<!-- <div class="img text-center">
				<img src="<?= assets('images/write-letter.png') ?>" alt="">
			</div>
			<div class="invite text-center">
				<h5>Invite your friends to join our event</h5>
			</div>
			<div class="invite-btn text-center">
				<ul>
					<li><a href="https://www.facebook.com/sharer.php?u=<?= base_url('you-can-write/') ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="https://api.whatsapp.com/send?text=<?= base_url('you-can-write/') ?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
					<li><a href="https://twitter.com/share? <?= base_url('you-can-write/') ?>" target="_blank"><i class="fab fa-twitter"></i></a></li></li>
				</ul>
			</div> -->
		</div>
	</div>
</div>
<!-- <div class="post-list check-color" data-color="#fce373">
	<div class="container-fluid">
		<h2><b>Events</b></h2>
		<div class="row">
			<?php if ($blogs): ?>
			<?php foreach ($blogs as $b): ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="post">
					<div class="post-heading">
						<div class="title">
							<p><b>Title :</b> <?= $b['title'] ?></p>
						</div>
						<div class="title">
							<p><b>FROM :</b> <?= date('d-m-Y h:i A', strtotime($b['from_date'].' '.$b['from_time'])) ?></p>
							<p><b>TO :</b> <?= date('d-m-Y h:i A', strtotime($b['to_date'].' '.$b['to_time'])) ?></p>
						</div>
					</div>
					<div class="post-details">
						<div class="desc">
							<p><?= $b['description'] ?></p>
						</div>
					</div>
				</div>
				<hr>
			</div>
			<?php endforeach ?>
			<?php else: ?>
			NO Post Available.
			<?php endif ?>
		</div>
	</div>
</div> -->