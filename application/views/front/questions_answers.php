<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12" data-color="#cca69a" style="background-color: #cca69a">
			<div class="container mt-5">
				<div class="write-here-head">
					<div class="text-center"><h3>Some questions and answers for your knowledge</h3></div>
					<?php if($questions): ?>
						<div class="write-here">
                            <?php foreach($questions as $v): ?>
                                <p class="text-justify"><b><?= $v['questions'] ?></b></p>
                                <p class="text-justify"><?= $v['answers'] ?></p>
                            <?php endforeach ?>
						</div>
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