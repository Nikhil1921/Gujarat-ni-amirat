<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="blog-part check-color" data-color="<?= $cat['background'] ?>">
		<div class="blog-sidebar" style="background-color: <?= $cat['background'] ?>">
			<div class="blog-sidebar-menu <?= ($this->agent->is_mobile()) ? 'responsive' : '' ?>">
				<?php foreach ($cats as $v): ?>
				<div class="main-cat">
					<a href="<?= $v['cat_slug'] ?>">
						<img src="<?= $v['cat_image'] ?>">
					</a>
				</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="blog-sidenav">
			<ul>
				<li><a href=https://www.facebook.com/gujaratniamirat-513185555887215/><i class="fab fa-facebook-f" target="_blank"></i></a></li>
				<li><a href=https://mobile.twitter.com/gujaratniamirat><i class="fab fa-twitter"></i></a></li>
				<li><a href="https://youtube.com/channel/UCCvHs_611-ZbMsf4bFHejpg"><i class="fab fa-youtube"></i></a></li>
				<li><a href="http://www.instagram.com/gujaratniamirat"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="blog-list text-center" style="background-color: <?= $cat['background'] ?>">
			<br>
			<h2><?= $cat['cat_name'] ?></h2>
        <?php if ($blogs): ?>
        <div class="row p-4">
        <?php foreach ($blogs as $blog): ?>
          <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="video">
              <iframe src="https://youtube.com/embed/<?= $blog['video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="video-tagline">
              <div class="title">
                <p><b><?= $blog['title'] ?></b></p>
              </div>
              <div class="desc">
                <p><?= $blog['description'] ?></p>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <?php else: ?>
        <div class="col-md-12">
            <img src="<?= assets('images/coming-soon.png') ?>" <?= ($this->agent->is_mobile()) ? 'width="100%"' : '' ?>>
          </div>
        <?php endif ?>
		</div>
	</div>
</div>