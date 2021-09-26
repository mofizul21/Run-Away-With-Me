<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package runaway-withme
 */

// if (!is_active_sidebar('sidebar-1')) {
//     return;
// }
?>

<aside id="secondary" class="widget-area">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="about-me">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/naomi-round.jpg" alt="Naomi Lai">
                <h2>About Me</h2>
                <p>29 years, 33 countries, 100s of stories. Run Away With Me!</p>
            </div>
        </div>
        <!-- enc .col-md-12 -->

        <div class="col-md-12 text-center">
            <h2>Follow Me</h2>
            <ul id="horizontal-list">
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
            </ul>
        </div>
        <!-- enc .col-md-12 -->

        <div class="col-md-12">
            <a href="https://www.buymeacoffee.com/runawaywithme" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/buy-me-tea.png" alt="Buy Me a Tea" class="buy_me_tea">
            </a>
        </div>
        <!-- enc .col-md-12 -->
    </div>
    <!-- enc .row -->
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->