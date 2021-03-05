<?php

$num = $settings['num'] ? $settings['num'] : '5';
$loading_option = $settings['loading_option'] ? $settings['loading_option'] : 'button';

$loadmore_text = $settings['loadmore_text'] ? $settings['loadmore_text'] : '';
$loadmore_loading_text = $settings['loadmore_loading_text'] ? $settings['loadmore_loading_text'] : '';
$loadmore_nomore_text = $settings['loadmore_nomore_text'] ? $settings['loadmore_nomore_text'] : '';

$return = '<div id="portfolio-wrapper">';

    global $post;
    $args = array('post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => $num);
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        $return .= '<ul class="grid" id="portfolio-grid"><li class="grid-sizer"></li>';
        while ($loop->have_posts()) : $loop->the_post();
            if (has_post_thumbnail($post->ID)) {
                $portfolio_post_thumb = get_the_post_thumbnail();
            } else {
                $portfolio_post_thumb = '<img src = "' . plugin_dir_url(__FILE__) . '/images/no-photo.png" alt = "" />';
            }

            $p_size = get_post_meta($post->ID, "portfolio_thumb_image_size", true);

            if (get_post_meta($post->ID, "portfolio_hover_thumb_title", true) != ''):
                $p_thumb_title = get_post_meta($post->ID, "portfolio_hover_thumb_title", true);
            else:
                $p_thumb_title = get_the_title();
            endif;

            $link_thumb_to = get_post_meta($post->ID, "portfolio_link_item_to", true);

            switch ($link_thumb_to):
                case 'link_to_image_url':
                    $image_popup = get_post_meta($post->ID, "portfolio_image_popup", true);
                    $return .= '<li class="grid-item element-item animate ' . $p_size . '"><a class="item-link" href="' . $image_popup . '" data-rel="prettyPhoto[gallery1]">';
                    break;
                case 'link_to_video_url':
                    $video_popup = get_post_meta($post->ID, "portfolio_video_popup", true);
                    $return .= '<li class="grid-item element-item animate ' . $p_size . '"><a class="item-link" href="' . $video_popup . '" data-rel="prettyPhoto[gallery1]">';
                    break;
                case 'link_to_extern_url':
                    $extern_site_url = get_post_meta($post->ID, "portfolio_extern_site_url", true);
                    $return .= '<li class="grid-item element-item animate ' . $p_size . '"><a class="item-link" href="' . $extern_site_url . '" target="_blank">';
                    break;

                default:
                    $return .= '<li id="p-item-' . $post->ID . '" class="grid-item element-item animate ' . $p_size . '"><a class="item-link" href="' . get_permalink() . '" data-id="' . $post->ID . '">';
            endswitch;

            $return .= $portfolio_post_thumb . '<div class="portfolio-text-holder"><p class="portfolio-title">' . $p_thumb_title . '</p></div></a></li>';

        endwhile;

        $return .= '</ul>';
    endif;
    $return .= '<div class="clear"></div></div><div class = "block center-relative center-text more-posts-portfolio-holder ' . $loading_option . '"><span class = "more-posts-portfolio">' . $loadmore_text . '</span><span class = "more-posts-portfolio-loading">' . $loadmore_loading_text . '</span><span class = "no-more-posts-portfolio">' . $loadmore_nomore_text . '</span></div>';
    wp_reset_postdata();
    echo $return;
?>