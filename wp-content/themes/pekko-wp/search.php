<?php get_header(); ?>	

<div id="content" class="site-content">
    <div <?php post_class('content-holder center-relative content-1170'); ?> > 

        <div class="archive-title">
            <h1 class="entry-title"><?php echo get_search_query(); ?></h1>
        </div>

        <div class="blog-holder">          
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>

                    <article <?php post_class('blog-item-holder animate'); ?> >        
                        <div class="entry-holder">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink($post->ID); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>                                                              
                        </div>      
                    </article>      

                    <?php
                endwhile;
                the_posts_pagination();
            else:
                echo '<h2>' . esc_html__("No results", 'pekko-wp') . '</h2>';
            endif;
            ?>

        </div>        
    </div>
</div>

<?php get_footer(); ?>