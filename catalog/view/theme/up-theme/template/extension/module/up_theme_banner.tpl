<div id="up_theme_banner<?php echo $module; ?>" class="panel panel-default up-theme-banner">
  <?php foreach ($banners as $banner) { ?>
  <?php if ($banner['link']) { ?>
  <div class="<?php echo $pr_id; ?> col-sm-4 up-theme-banner-item slide-<?php echo $title_slide_status; ?>">
  <a href="<?php echo $banner['link']; ?>">
  <img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" />
  <span class="up-theme-banner-bg"></span>
  <span class="up-theme-banner-title"><h2><?php echo $banner['title']; ?></h2></span>
  </a>
  </div>
  <?php } else { ?>
  <div class="<?php echo $pr_id; ?> col-sm-4 up-theme-banner-item slide-<?php echo $title_slide_status; ?>">
  <img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>" />
  <span class="up-theme-banner-bg"></span>
  <span class="up-theme-banner-title"><h2><?php echo $banner['title']; ?></h2></span>
  </div>
  <?php } ?>
  <?php } ?>
</div>
