<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package runaway-withme
 */

?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'runaway-withme'); ?></h1>
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

                        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'runaway-withme'); ?></p>
                    <?php
                    else :
                    ?>

                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'runaway-withme'); ?></p>
                    <?php
                        get_search_form();

                    endif;
                    ?>
                </div><!-- .page-content -->
            </section><!-- .no-results -->
        </div>
        <!-- end .col-md-9 -->
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
        <!-- end .col-md-3 -->
    </div>
    <!-- end .row -->
</div>
<!-- end .container -->