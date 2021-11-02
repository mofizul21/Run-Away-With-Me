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
$my_options = get_option('my_framework');
?>

<aside id="secondary" class="widget-area">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="about-me">
                <div id="corner_border_img">
                    <img src="<?php echo $my_options['sidebarNaomi']; ?>" alt="Naomi Lai">
                </div>
                <h2 class="styledTitle mt-3"><span><?php echo $my_options['sidebarAboutMeTitle']; ?></span></h2>
                <p class="pt-4"><?php echo $my_options['sidebarAboutMeDesc']; ?></p>
            </div>
        </div>
        <!-- end .col-md-12 -->

        <div class="col-md-12 text-center">
            <h2 class="styledTitle"><span>Follow Me</span></h2>
            <ul id="horizontal-list" class="pt-4">
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
        <!-- end .col-md-12 -->

        <div class="col-md-12">
            <a href="https://www.buymeacoffee.com/runawaywithme" target="_blank">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/tea-button.png" alt="Buy Me a Tea" class="buy_me_tea">
            </a>
        </div>
        <!-- end .col-md-12 -->
    </div>
    <!-- end .row -->

    <!-- SUBSCRIBE -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div id="mc_embed_signup" class="text-center" style="background-image: url('<?php echo $my_options['subscribeBg']; ?>');">
                <form action="https://runaway-withme.us5.list-manage.com/subscribe/post?u=eeb8d25686550418433456ee2&amp;id=1ede1b3a3a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div style="height:25px"></div>
                        <h2 class="text-dark"><?php echo $my_options['subscribeTitle']; ?></h2>
                        <div class="mc-field-group">
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
                        </div>
                        <div class="mc-field-group">
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
                        </div>
                        <div class="mc-field-group">
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_eeb8d25686550418433456ee2_1ede1b3a3a" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        <div style="height:135px"></div>
                    </div>
                </form>
            </div>
            <div class="spacer"></div>
        </div>
    </div>
    <!-- end .row -->

    <?php //include('inc/rightSidebarContinentPosts.php') 
    ?>

    <?php dynamic_sidebar('sidebar-1'); ?>
</aside><!-- #secondary -->