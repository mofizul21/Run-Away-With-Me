<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package runaway-withme
 */

?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-9">
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Where in the world did that page go?', 'runaway-withme'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <?php
                    if (is_home() && current_user_can('publish_posts')) :

                        printf(
                            '<p>' . wp_kses(
                                /* translators: 1: link to WP admin new post page. */
                                __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'runaway-withme'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                    ),
                                )
                            ) . '</p>',
                            esc_url(admin_url('post-new.php'))
                        );

                    elseif (is_search()) :
                    ?>

                        <p><?php esc_html_e('This page can not be found, but you can try searching keywords from the homepage, or check out these posts instead:', 'runaway-withme'); ?></p>
                    <?php
                    else :
                    ?>

                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'runaway-withme'); ?></p>
                    <?php
                        get_search_form();

                    endif;
                    ?>
                </div><!-- .page-content -->

                <div class="row">
                    <?php
                    /* Get all sticky posts */
                    $sticky = get_option('sticky_posts');
                    /* Sort the stickies with the newest ones at the top */
                    rsort($sticky);
                    /* Get the 5 newest stickies (change 5 for a different number) */
                    $sticky = array_slice($sticky, 0, 6);
                    $sticky_posts = new WP_Query(array('post__in' => $sticky, 'ignore_sticky_posts' => 1));
                    if ($sticky_posts->have_posts()) {
                        while ($sticky_posts->have_posts()) {
                            $classes = get_post_class('standard-post', $post->ID);
                            $homePosts .= '<div class="col-md-4">';
                            $homePosts .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
                            $homePosts .= '<div class="stadardPostStyle">';
                            $sticky_posts->the_post();
                            if (has_post_thumbnail()) {
                                $post_id = get_the_ID(); // or use the post id if you already have it
                                $category_object = get_the_category($post_id);
                                $category_name = $category_object[0]->name;
                                $category_id = get_cat_ID($category_name);
                                $category_link = get_category_link($category_id);

                                $homePosts .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
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
            </section><!-- .no-results -->
        </div>
        <!-- end .col-md-9 -->
        <div class="col-md-3 col3PaddingLeft" id="hasPadding">
            <?php get_sidebar(); ?>
        </div>
        <!-- end .col-md-3 -->
    </div>
    <!-- end .row -->
</div>
<!-- end .container -->