<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package runaway-withme
 */

get_header();
?>
<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-9">
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'runaway-withme'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h1>
                    </header><!-- .page-header -->

                    <div class="row">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) : ?>
                            <div class="col-md-6">
                                <?php
                                the_post();
                                get_template_part('template-parts/content', 'search');
                                ?>
                            </div>
                        <?php
                        endwhile;
                        the_posts_navigation();
                        ?>
                    </div>
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
        <?php
    else :
        get_template_part('template-parts/content', 'none');
    endif;
        ?>
        </div>
</main><!-- #main -->

<?php

get_footer();
