<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package runaway-withme
 */
$my_options = get_option('my_framework');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <button onclick="topFunction()" id="backToTop" title="Go to top">
        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/anchor-up.png" alt="Go to Top">
    </button>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'runaway-withme'); ?></a>
        <header id="masthead" class="site-header">

            <!-- LOGO -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            if (is_front_page() && is_home()) :
                            ?>
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                            else :
                            ?>
                                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                            endif;
                            $runaway_withme_description = get_bloginfo('description', 'display');
                            if ($runaway_withme_description || is_customize_preview()) :
                            ?>
                                <p class="site-description"><?php echo $runaway_withme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                            ?></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->
                    </div>
                    <!-- end .col-md-4 -->
                    <div class="col-md-8">
                        <!-- <img src="<?php //echo get_template_directory_uri() 
                                        ?>/assets/images/banner-ad.png" alt="Banner" class="img"> -->
                    </div>
                    <!-- end .col-md-8 -->
                </div>
                <!-- enc .row -->
            </div>
            <!-- enc .container -->

            <!-- MENU - BS5 -->
            <nav class="navbar navbar-expand-md navbar-light mt-4 menu_area">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_5_wp_nav_menu_walker()
                        ));
                        ?>

                        <form class="d-flex search_form" method="get" action="<?php echo site_url() ?>">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s">
                            <button class="btn btn-outline-success btn-light" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header><!-- #masthead -->