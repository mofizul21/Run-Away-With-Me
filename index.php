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
    </div>
    <!-- end .container-fluid -->

    <!-- HOMEPAGE LATEST POSTS -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="row">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            $classes = get_post_class('standard-post', $post->ID);
                            $homePosts .= '<div class="col-md-6">';
                            $homePosts .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
                            the_post();
                            if (has_post_thumbnail()) {
                                $post_id = get_the_ID(); // or use the post id if you already have it
                                $category_object = get_the_category($post_id);
                                $category_name = $category_object[0]->name;
                                $category_id = get_cat_ID($category_name);
                                $category_link = get_category_link($category_id);

                                $homePosts .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
                                $homePosts .= wp_trim_words(get_the_content(), 20, '...');
                            } else {
                                // if no featured image is found
                                $homePosts .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
                            }
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
