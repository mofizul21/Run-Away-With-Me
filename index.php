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
    <!-- FEATURED POSTS SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide has_bg_gradient" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
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

                <div class="carousel-item <?php echo $class; ?>">
                    <?php the_post_thumbnail('large', array('class' => 'd-block w-100')); ?>
                    <div class="carousel-caption d-md-block">
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt() ?>
                        <a href="<?php echo get_post_meta(get_the_ID(), 'slider_post_url', true) ?>" class="btn btn-light">Let's Go</a>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- HOMEPAGE LATEST POSTS -->
    <div class="container-fluid containerFluidHasPadding">
        <div class="row mt-5">
            <div class="col-md-3 d-none d-lg-block col3PaddingRight">
                <?php include('inc/leftSidebar.php') ?>
            </div>
            <!-- end .col-md-2 -->

            <!-- <div class="col-md-1"></div> -->

            <div class="col-md-6">
                <div class="row">
                    <?php
                    $query_without_sticky_posts = new WP_Query(array('post__not_in' => get_option('sticky_posts')));
                    if ($query_without_sticky_posts->have_posts()) {
                        while ($query_without_sticky_posts->have_posts()) {
                            $classes = get_post_class('standard-post', $post->ID);
                            $homePosts .= '<div class="col-md-6">';
                            $homePosts .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
                            $homePosts .= '<div class="stadardPostStyle">';
                            $query_without_sticky_posts->the_post();
                            if (has_post_thumbnail()) {
                                $post_id = get_the_ID(); // or use the post id if you already have it
                                $category_object = get_the_category($post_id);
                                $category_name = $category_object[0]->name;
                                $category_id = get_cat_ID($category_name);
                                $category_link = get_category_link($category_id);

                                $homePosts .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2 class="py-2">' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
                                $homePosts .= wp_trim_words(get_the_content(), 20, '...');
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
                <!-- end .row -->
            </div>
            <!-- end .col-md-6 -->

            <!-- <div class="col-md-1"></div> -->

            <div class="col-md-3 col3PaddingLeft" id="hasPadding">
                <?php get_sidebar(); ?>
            </div>
            <!-- end .col-md-2 -->
        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->

</main><!-- #main -->

<?php

get_footer();
