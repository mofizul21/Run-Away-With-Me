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

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <button onclick="topFunction()" id="backToTop" title="Go to top">Top</button>

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
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/banner-ad.png" alt="Banner" class="img">
                    </div>
                    <!-- end .col-md-8 -->
                </div>
                <!-- enc .row -->
            </div>
            <!-- enc .container -->

            <!-- MENU -->
            <div class="menu-and-others">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'runaway-withme'); ?></button>
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu',
                                    )
                                );
                                ?>
                            </nav><!-- #site-navigation -->
                        </div>
                        <!-- end .col-md-8 -->
                        <div class="col-md-3">
                            <ul class="social_and_search">
                                <li>
                                    <a target="_blank" href="http://www.facebook.com/runawaywithmeblog">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/facebook.svg" alt="Facebook">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="http://www.instagram.com/runaway.withme_">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/instagram.svg" alt="Instagram">
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="http://www.pinterest.com/runawaywithmetravel">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/pinterest2.svg" alt="Pinterest">
                                    </a>
                                </li>
                                <li>
                                    <?php echo get_search_form(); ?>
                                </li>
                            </ul>
                        </div>
                        <!-- end .col-md-3 -->
                    </div>
                    <!-- end .row -->
                </div>
                <!-- end .container -->
            </div>
        </header><!-- #masthead -->