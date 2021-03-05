<?php
$name = $settings['name'] ? $settings['name'] : 'slider';
$speed = $settings['speed'] ? $settings['speed'] : '2000';
$auto_start = $settings['auto_start'] ? $settings['auto_start'] : 'true';
?>

<div id="<?php echo $name; ?>" class="simple-image-slider-wrapper relative swiper-container" data-speed="<?php echo $speed; ?>" data-auto="<?php echo $auto_start; ?>">
    <div class="swiper-wrapper image-slider slider">
        <?php echo $this->content($settings['items']); ?> 
    </div>
    <div class="clear"></div>
    <div class="swiper-pagination simple-image-slider-pagination swiper-pagination-<?php echo $name; ?>"></div>                                
</div>