<?php
if (!isset($attributes['imgURL'])) {
  $attributes['imgURL'] = $attributes['imgURLGWebp'] = '/wp-content/plugins/wp-plugin_nhazinha_template/images/nhazinha/baner-pagina-ini-1-.webp';
}

?>

<div class="page-banner">
  <div>Sou eu</div>
    <picture>
    <source media="max-width:480px" srcset="<?php echo esc_url(site_url($attributes['imgURLSWebp']));?>" type="image/webp">
    <source media="min-width:480px;max-width:960px" srcset="<?php echo esc_url(site_url($attributes['imgURLGWebp'])); ?>" type="image/webp">
    <img class="page-banner__bg-image" src="<?php echo esc_url(site_url($attributes['imgURLGWebp'])); ?>" alt="">
</picture>
  
  <div class="page-banner__content container t-center c-white">
    
    <?php echo $content; ?>
  </div>
</div>

