<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package runaway-withme
 */

get_header();
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <main id="primary" class="site-main archivePosts">
                <?php if (have_posts()) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->
                <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'rawmarchive');
                    endwhile;
                    the_posts_navigation();
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </main><!-- #main -->
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


<?php
get_sidebar();
get_footer();
