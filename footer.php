<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WatanSerb
 */
$my_options = get_option('my_framework');
?>
<!-- STICKY POSTS -->
<div class="container-fluid mt-5" style="padding: 0 10px;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="styledTitle"><span>Top Posts</span></h2>
        </div>
    </div>
    <div class="row">
        <?php
        /* Get all sticky posts */
        $sticky = get_option('sticky_posts');
        /* Sort the stickies with the newest ones at the top */
        rsort($sticky);
        /* Get the 5 newest stickies (change 5 for a different number) */
        $sticky = array_slice($sticky, 0, 4);
        $sticky_posts = new WP_Query(
            array(
                'post__in' => $sticky,
                'ignore_sticky_posts' => 1,
                'posts_per_page' => '4',
            )
        );
        if ($sticky_posts->have_posts()) {
            while ($sticky_posts->have_posts()) {
                $classes = get_post_class('standard-post', $post->ID);
                $homePosts .= '<div class="col-md-3">';
                $homePosts .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
                $homePosts .= '<div class="stadardPostStyle">';
                $sticky_posts->the_post();
                if (has_post_thumbnail()) {
                    $post_id = get_the_ID(); // or use the post id if you already have it
                    $category_object = get_the_category($post_id);
                    $category_name = $category_object[0]->name;
                    $category_id = get_cat_ID($category_name);
                    $category_link = get_category_link($category_id);

                    $homePosts .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2 class="py-2">' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
                    //$homePosts .= wp_trim_words(get_the_content(), 20, '...');
                } else {
                    // if no featured image is found
                    $homePosts .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
                }
                $homePosts .= '</div>';
                $homePosts .= '</article>';
                $homePosts .= '</div>';
            }
        } else {
            get_template_part('template-parts/content', 'none');
        }

        echo $homePosts;
        wp_reset_postdata();
        ?>
    </div>
</div>

<!-- MAP -->
<div class="container-fluid" id="map">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center travelByDest"><span>Travel by Destination</span></h2>
            <p class="text-center">Click on the image to explore.</p>
        </div>
    </div>

    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1500 804">
        <image width="1500" height="804" xlink:href="<?php echo $my_options['destinationMap']; ?>"></image>
        <a xlink:href="<?php echo site_url() ?>/category/north-america">
            <rect x="122" y="180" fill="#fff" opacity="0" width="156" height="167"></rect>
        </a><a xlink:href="<?php echo site_url() ?>/category/europe">
            <rect x="678" y="44" fill="#fff" opacity="0" width="166" height="166"></rect>
        </a><a xlink:href="<?php echo site_url() ?>/category/africa">
            <rect x="551" y="323" fill="#fff" opacity="0" width="159" height="175"></rect>
        </a><a xlink:href="<?php echo site_url() ?>/category/central-south-america">
            <rect x="437" y="607" fill="#fff" opacity="0" width="154" height="156"></rect>
        </a><a xlink:href="<?php echo site_url() ?>/category/asia">
            <rect x="1177" y="203" fill="#fff" opacity="0" width="150" height="165"></rect>
        </a><a xlink:href="<?php echo site_url() ?>/category/oceania">
            <rect x="1326" y="482" fill="#fff" opacity="0" width="151" height="164"></rect>
        </a>
    </svg>
</div>
<footer id="colophon" class="site-footer">
    <!-- end .row -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="site-info">
                        <p class="copyright text-white"><?php echo $my_options['copyrightText']; ?></p>
                    </div><!-- .site-info -->
                </div>
                <div class="col-md-6">
                    <ul id="horizontal-list">
                        <li>
                            <a target="_blank" href="http://www.facebook.com/runawaywithmeblog">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/icons/facebook_white.svg" alt="Facebook">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.instagram.com/runaway.withme_">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/icons/instagram_white.svg" alt="Instagram">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.pinterest.com/runawaywithmetravel">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/icons/pinterest_white.svg" alt="Pinterest">
                            </a>
                        </li>
                    </ul>
                    <!-- end .footerSocial -->
                </div>
            </div>
            <!-- end .row -->
        </div>
        <!-- end .col-md-12 -->
    </div>
    <!-- end .row -->

</footer><!-- #colophon -->

<!-- COOKIE NOTICE -->
<script data-text="This website uses cookies for a better reader experience." data-button="Accept" data-info="Privacy Policy" data-link="/privacy-policy" data-expire="30" data-style="#cookieWarnBox a {}" type="text/javascript" id="cookieWarn" src="<?php echo get_template_directory_uri() ?>/js/cookie-warn.min.js">
</script>

<?php wp_footer(); ?>
</body>

</html>