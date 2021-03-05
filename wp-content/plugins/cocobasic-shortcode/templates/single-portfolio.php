<?php get_header(); ?>
<div id="content" class="site-content">
    <div <?php post_class('content-holder center-relative content-1170'); ?> >   

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <div class="portfolio-content">
                    <?php the_content(); ?>
                </div>           
                <div class="nav-links">                
                    <div class="content-570 center-relative">
                        <?php
                        $prev_post = get_previous_post();
                        if (is_a($prev_post, 'WP_Post')):
                            ?>
                            <div class="nav-previous">                                                                          
                                <?php previous_post_link('%link'); ?>
                                <div class="clear"></div>                                
                            </div>
                        <?php endif; ?>
                        <?php
                        $next_post = get_next_post();
                        if (is_a($next_post, 'WP_Post')):
                            ?>                
                            <div class="nav-next">                                                  
                                <?php next_post_link('%link'); ?>                     
                                <div class="clear"></div>                                
                            </div>
                        <?php endif; ?>
                        <div class="clear"></div>
                    </div>
                </div>  
                <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>