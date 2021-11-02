<div class="row">
    <div class="col-md-12 text-center styledTitle">
        <h2 class="styledTitle"><span><a href="<?php echo site_url() ?>/category/asia">Asia</a></span></h2>
    </div>

    <?php
    is_home() ? $postPerPage = 1 : $postPerPage = 3;

    $sidebarAsiaQuery = new WP_Query(array(
        'category_name' => 'asia',
        'posts_per_page' => $postPerPage
    ));

    if ($sidebarAsiaQuery->have_posts()) {
        while ($sidebarAsiaQuery->have_posts()) {
            $classes = get_post_class('standard-post', $post->ID);
            $sidebarAsiaString .= '<div class="col-md-12">';
            $sidebarAsiaString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            $sidebarAsiaQuery->the_post();
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $sidebarAsiaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $sidebarAsiaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $sidebarAsiaString .= '</article>';
            $sidebarAsiaString .= '</div>';
        }
    } else {
        echo '<h2>No post</h2>';
    }

    echo $sidebarAsiaString;
    wp_reset_postdata();

    ?>
</div>
<!-- end .row -->

<div class="row">
    <div class="col-md-12 text-center styledTitle">
        <h2 class="styledTitle"><span><a href="<?php echo site_url() ?>/category/africa">Africa</a></span></h2>
    </div>

    <?php
    $sidebarAfrica = new WP_Query(array(
        'category_name' => 'africa',
        'posts_per_page' => $postPerPage
    ));

    if ($sidebarAfrica->have_posts()) {
        while ($sidebarAfrica->have_posts()) {
            $classes = get_post_class('standard-post', $post->ID);
            $sidebarAfricaString .= '<div class="col-md-12">';
            $sidebarAfricaString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            $sidebarAfrica->the_post();
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $sidebarAfricaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $sidebarAfricaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $sidebarAfricaString .= '</article>';
            $sidebarAfricaString .= '</div>';
        }
    } else {
        echo '<h2>No post</h2>';
    }

    echo $sidebarAfricaString;
    wp_reset_postdata();

    ?>
</div>
<!-- end .row -->

<div class="row">
    <div class="col-md-12 text-center styledTitle">
        <h2 class="styledTitle"><span><a href="<?php echo site_url() ?>/category/europe">Europe</a></span></h2>
    </div>

    <?php
    $sidebarEurope = new WP_Query(array(
        'category_name' => 'europe',
        'posts_per_page' => $postPerPage
    ));

    if ($sidebarEurope->have_posts()) {
        while ($sidebarEurope->have_posts()) {
            $classes = get_post_class('standard-post', $post->ID);
            $sidebarEuropeString .= '<div class="col-md-12">';
            $sidebarEuropeString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            $sidebarEurope->the_post();
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $sidebarEuropeString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $sidebarEuropeString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $sidebarEuropeString .= '</article>';
            $sidebarEuropeString .= '</div>';
        }
    } else {
        echo '<h2>No post</h2>';
    }

    echo $sidebarEuropeString;
    wp_reset_postdata();

    ?>
</div>
<!-- end .row -->

<div class="row">
    <div class="col-md-12 text-center styledTitle">
        <h2 class="styledTitle"><span><a href="<?php echo site_url() ?>/category/oceania">Oceania</a></span></h2>
    </div>

    <?php
    $sidebarOcenia = new WP_Query(array(
        'category_name' => 'oceania',
        'posts_per_page' => $postPerPage,
    ));

    if ($sidebarOcenia->have_posts()) {
        while ($sidebarOcenia->have_posts()) {
            $classes = get_post_class('standard-post', $post->ID);
            $sidebarOceniaString .= '<div class="col-md-12">';
            $sidebarOceniaString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            $sidebarOcenia->the_post();
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $sidebarOceniaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $sidebarOceniaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $sidebarOceniaString .= '</article>';
            $sidebarOceniaString .= '</div>';
        }
    } else {
        echo '<h2>No post</h2>';
    }

    echo $sidebarOceniaString;
    wp_reset_postdata();

    ?>
</div>
<!-- end .row -->
<div class="row">
    <div class="col-md-12 text-center styledTitle">
        <h2 class="styledTitle"><span><a href="<?php echo site_url() ?>/category/central-south-america">C&S America</a></span></h2>
    </div>

    <?php
    $sidebarCentralSouthAmerica = new WP_Query(array(
        'category_name' => 'central-south-america',
        'posts_per_page' => $postPerPage
    ));

    if ($sidebarCentralSouthAmerica->have_posts()) {
        while ($sidebarCentralSouthAmerica->have_posts()) {
            $classes = get_post_class('standard-post', $post->ID);
            $CentralSouthAmericaString .= '<div class="col-md-12">';
            $CentralSouthAmericaString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            $sidebarCentralSouthAmerica->the_post();
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $CentralSouthAmericaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $CentralSouthAmericaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $CentralSouthAmericaString .= '</article>';
            $CentralSouthAmericaString .= '</div>';
        }
    } else {
        echo '<h2>No post</h2>';
    }

    echo $CentralSouthAmericaString;
    wp_reset_postdata();

    ?>
</div>
<!-- end .row -->
<div class="row">
    <div class="col-md-12 text-center styledTitle">
        <h2 class="styledTitle"><span><a href="<?php echo site_url() ?>/category/north-america">North America</a></span></h2>
    </div>

    <?php
    $sidebarNorthAmerica = new WP_Query(array(
        'category_name' => 'north-america',
        'posts_per_page' => $postPerPage
    ));

    if ($sidebarNorthAmerica->have_posts()) {
        while ($sidebarNorthAmerica->have_posts()) {
            $classes = get_post_class('standard-post', $post->ID);
            $sidebarNorthAmericaString .= '<div class="col-md-12">';
            $sidebarNorthAmericaString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            $sidebarNorthAmerica->the_post();
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $sidebarNorthAmericaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 180)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $sidebarNorthAmericaString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $sidebarNorthAmericaString .= '</article>';
            $sidebarNorthAmericaString .= '</div>';
        }
    } else {
        echo '<h2>No post</h2>';
    }

    echo $sidebarNorthAmericaString;
    wp_reset_postdata();

    ?>
</div>
<!-- end .row -->