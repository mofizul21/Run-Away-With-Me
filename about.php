<?php

/* Template Name: About Me */

get_header();
$my_options = get_option('my_framework');
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <main id="primary" class="site-main">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center fs-2"><?php echo $my_options['aboutMeTilte']; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $my_options['naomiImage']; ?>" alt="Naomi Lai" id="aboutNaomi">
                        <p class="text-center mt-3"><?php echo $my_options['textUnderImage']; ?></p>
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
                        <a href="https://www.buymeacoffee.com/runawaywithme" target="_blank">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/tea-button.png" alt="Buy Me a Tea" class="buy_me_tea" style="width:30%">
                        </a>
                    </div>
                    <!-- end .col-md-6 -->

                    <div class="col-md-6">
                        <?php echo $my_options['aboutMeEditor']; ?>
                    </div>
                    <!-- end .col-md-6 -->
                </div>
                <!-- end .row -->
            </main><!-- #main -->
        </div>
        <!-- end .col-md-12 -->
    </div>
    <!-- end .row -->
</div>
<!-- end .container -->


<?php
get_footer();
