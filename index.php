<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package runaway-withme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container-fluid">
        <!-- FEATURED POSTS SLIDER -->
        <div class="row">
            <div class="col-md-12">
                <div id="slider" class="slider">
                    <?php
                    $args = array(
                        'post_type' => 'featured',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'orderby' => 'title',
                        'order' => 'ASC',
                    );
                    $c = 0;
                    $class = '';
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        $c++;
                        if ($c == 1) $class .= ' active';
                        else $class = '';
                    ?>
                        <div class="slider-item <?php echo $class; ?>">
                            <?php the_post_thumbnail(); ?>
                            <span class="slider_meta">
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt() ?>
                                <a href="<?php the_permalink(); ?>">Lets Go</a>
                            </span>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                    <ul id="dots" class="list-inline dots"></ul>
                </div>
            </div>
        </div>
        <!-- end .row -->
        <!-- <img src="<?php //echo get_template_directory_uri() 
                        ?>/assets/images/banner.png" alt="Banner" class="img"> -->
    </div>
    <!-- end .container-fluid -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="row">

                    <?php
                    if (have_posts()) :
                        if (is_home() && !is_front_page()) :
                    ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                        <?php
                        endif;
                        while (have_posts()) :
                        ?>
                            <div class="col-md-6 post-card">
                                <?php
                                the_post();
                                get_template_part('template-parts/content', get_post_type());
                                ?>
                            </div>
                            <!-- end .col-md-6 -->
                        <?php
                        endwhile;
                        ?>
                        <div class="col-md-12">
                            <?php the_posts_navigation(); ?>
                        </div>
                    <?php
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>

                </div>
                <!-- end .row -->

            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>

        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->
</main><!-- #main -->

<?php

get_footer();
