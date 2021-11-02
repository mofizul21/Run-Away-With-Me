<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package runaway-withme
 */

get_header();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-9">
            <main id="primary" class="site-main">
                <?php
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </main><!-- #main -->
        </div>
        <!-- end .col-md-9 -->
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <?php get_sidebar(); ?>
        </div>
        <!-- end .col-md-2 -->
    </div>
    <!-- end .row -->
</div>
<!-- end .container -->


<?php
get_footer();
