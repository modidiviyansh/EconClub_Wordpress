<?php get_header(); ?>
<div id="content" class="site-content">
    <div <?php post_class('content-holder center-relative content-1170'); ?> >      
        <?php
        
        if (get_theme_mod('cocobasic_loading_section') === 'scroll') {
            $scroll = 'scroll';
        } else {
            $scroll = 'button';
        }
        
        global $post;

        $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts('post_type=post&paged=' . $page);

        if (have_posts()) :
            echo '<div class="blog-holder animate">';
            require get_parent_theme_file_path('loop-index.php');
            echo '</div>';
        endif;
        ?>   
    </div>
    <div class="clear"></div>
    <div class="block more-posts-index-holder <?php echo esc_attr($scroll);  ?>">
        <div class="more-posts-index-wrapper">
            <a class="more-posts">
                <?php echo esc_html__('LOAD MORE', 'pekko-wp'); ?>
            </a>
            <a class="more-posts-loading">
                <?php echo esc_html__('LOADING', 'pekko-wp'); ?>
            </a>
            <a class="no-more-posts">
                <?php echo esc_html__('NO MORE', 'pekko-wp') ?>
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>