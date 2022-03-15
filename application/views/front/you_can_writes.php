<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12" data-color="#cca69a" style="background-color: #cca69a">
			<div class="container mt-5">
				<div class="write-here-head">
					<div class="text-center"><h3>Answer the given questions here</h3></div>
					<?php if($questions): ?>
						<div class="write-here">
							<p class="text-justify"><?= $this->main->check('site_text', ['page' => 'ycw'], 'content') ?></p>
							<?= form_open('you-can-write') ?>
								<div class="row">
									<?php foreach($questions as $v): ?>
										<div class="form-group col-12">
											<label><b><?= $v['question'] ?></b></label><br>
											<div class="form-check">
												<input checked class="form-check-input" type="radio" name="ans[<?= $v['id'] ?>]" <?= set_radio('ans['.$v['id'].']', 'A') ?> value="A" id="<?= $v['id'] ?>_a">
												<label class="form-check-label" for="<?= $v['id'] ?>_a">
													<?= $v['option_a'] ?>
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="ans[<?= $v['id'] ?>]" value="B" <?= set_radio('ans['.$v['id'].']', 'B') ?> id="<?= $v['id'] ?>_b">
												<label class="form-check-label" for="<?= $v['id'] ?>_b">
													<?= $v['option_b'] ?>
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="ans[<?= $v['id'] ?>]" value="C" <?= set_radio('ans['.$v['id'].']', 'C') ?> id="<?= $v['id'] ?>_c">
												<label class="form-check-label" for="<?= $v['id'] ?>_c">
													<?= $v['option_c'] ?>
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="ans[<?= $v['id'] ?>]" value="D" <?= set_radio('ans['.$v['id'].']', 'D') ?> id="<?= $v['id'] ?>_d">
												<label class="form-check-label" for="<?= $v['id'] ?>_d">
													<?= $v['option_d'] ?>
												</label>
											</div>
										</div>
									<?php endforeach ?>
									<div class="col-md-12"></div>
									<div class="form-group col-md-6">
										<label for="name"><b>Name</b></label>
										<input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?= set_value('name') ?>">
										<?= form_error('name') ?>
									</div>
									<div class="form-group col-md-6">
										<label for="phone"><b>Phone number</b></label>
										<input type="text" name="phone" class="form-control" placeholder="Enter your Phone number" value="<?= set_value('phone') ?>" maxlength="10">
										<?= form_error('phone') ?>
									</div>
									<div class="form-group col-md-6">
										<label for="school"><b>School / college name</b></label>
										<input type="text" name="school" class="form-control" placeholder="Enter your school name" value="<?= set_value('school') ?>" maxlength="150">
										<?= form_error('school') ?>
									</div>
									<div class="form-group col-md-6">
										<label for="city"><b>City</b></label>
										<input type="text" name="city" class="form-control" placeholder="Enter your City" value="<?= set_value('city') ?>" maxlength="150">
										<?= form_error('city') ?>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							<?= form_close() ?>
						</div>
						<label><b>Winners</b></label><br>
						<table class="table">
							<thead>
								<th>SR #</th>
								<th>NAME</th>
								<th>SCHOOL</th>
							</thead>
							<tbody>
								<?php foreach($winners as $k => $v): ?>
								<tr>
									<td><?= ++$k ?></td>
									<td><?= $v['name'] ?></td>
									<td><?= $v['school'] ?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					<?php else: ?>
						<div class="col-md-12 p-5 text-center">
							<img src="<?= assets('images/coming-soon.png') ?>" <?= ($this->agent->is_mobile()) ? 'width="100%"' : '' ?>>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>