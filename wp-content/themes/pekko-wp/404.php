<?php get_header(); ?> 
<div id="content" class="site-content">
    <div <?php post_class('content-holder center-relative content-1170'); ?> > 
        <p class="center-text error-text-help-first"><strong><?php echo esc_html__('Ooops!', 'pekko-wp'); ?></strong></p>            
        <p class="center-text error-text-help-second"><?php echo esc_html__('The page you were looking for could not be found.', 'pekko-wp'); ?></p>
        <p class="center-text error-text-404"><?php echo esc_html__('404', 'pekko-wp'); ?></p>        
        <p class="center-text error-text-home"><?php echo esc_html__('Try to start from', 'pekko-wp'); ?> <a href="<?php echo esc_url(site_url('/')); ?>"><?php echo esc_html__('Home', 'pekko-wp'); ?></a> <?php echo esc_html__('page.', 'pekko-wp'); ?></p>            
    </div>
</div>
<?php get_footer(); ?>