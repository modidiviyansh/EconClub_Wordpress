<?php
global $post;
?>
<?php while (have_posts()) : the_post(); ?>    

    <article <?php post_class('blog-item-holder animate'); ?> >        
        <div class="entry-holder">
            <h2 class="entry-title">
                <a href="<?php the_permalink($post->ID); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>  

            <?php if (has_post_thumbnail($post->ID)): ?>        
                <div class="post-thumbnail">
                    <a href="<?php the_permalink($post->ID); ?>">
                        <?php echo get_the_post_thumbnail(); ?>
                    </a>
                </div>
                <?php
            elseif (get_post_meta($post->ID, "post_custom_header", true) != ''):
                $allowed_html_array = cocobasic_allowed_html();
                ?>
                <div class="post-thumbnail custom-thumbnail">
                    <?php echo do_shortcode(wp_kses(get_post_meta($post->ID, "post_custom_header", true), $allowed_html_array)); ?>
                </div>
            <?php endif; ?>

            <ul class="entry-info">                
                <li class="author-nickname-holder">
                    <div class="entry-info-text">
                        <?php echo esc_html__('AUTHOR', 'pekko-wp'); ?>
                    </div>                                                             
                    <div class="author-nickname">
                        <?php the_author_posts_link(); ?>
                    </div>                                                             
                </li>                                    
                <li class="entry-date-holder">
                    <div class="entry-info-text">
                        <?php echo esc_html__('DATE', 'pekko-wp'); ?>
                    </div>                                                             
                    <div class="entry-date published">
                        <?php echo get_the_date(); ?>   
                    </div>                                                             
                </li>  
                <li class="cat-links-holder">
                    <div class="entry-info-text">
                        <?php echo esc_html__('CATEGORY', 'pekko-wp'); ?>                        
                    </div>                                                             
                    <div class="cat-links-wrapper">
                        <ul class="cat-links">
                            <?php
                            foreach ((get_the_category()) as $category) {
                                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>                                                             
                </li> 
                <li class="num-comments-holder">
                    <div class="entry-info-text">
                        <?php echo esc_html__('COMMENTS', 'pekko-wp'); ?>                        
                    </div>                                                             
                    <div class="num-comments">
                        <a href="<?php comments_link(); ?>"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a>
                    </div>                                                             
                </li>        
            </ul>                                    
        </div>      
    </article>   

<?php endwhile; ?>