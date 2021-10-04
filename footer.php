<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WatanSerb
 */

?>
<!-- MAP -->
<div class="container-fluid" id="map">
    <div class="row">
        <div class="col-md-12">
            <h2 class="styledTitle"><span>Travel by Destination</span></h2>
            <p class="text-center">Click on the image to explore.</p>
        </div>
    </div>

    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1500 804">
        <image width="1500" height="804" xlink:href="<?php echo get_template_directory_uri() ?>/assets/images/map.png"></image>
        <a xlink:href="/category/north-america">
            <rect x="130" y="186" fill="#fff" opacity="0" width="143" height="169"></rect>
        </a>
        <a xlink:href="/category/europe">
            <rect x="652" y="28" fill="#fff" opacity="0" width="146" height="171"></rect>
        </a>
        <a xlink:href="/category/africa">
            <rect x="554" y="321" fill="#fff" opacity="0" width="153" height="177"></rect>
        </a>
        <a xlink:href="/category/central-south-america">
            <rect x="442" y="554" fill="#fff" opacity="0" width="138" height="173"></rect>
        </a>
        <a xlink:href="/category/asia">
            <rect x="1110" y="234" fill="#fff" opacity="0" width="134" height="168"></rect>
        </a>
        <a xlink:href="/category/ocenia">
            <rect x="1327" y="484" fill="#fff" opacity="0" width="142" height="171"></rect>
        </a>
    </svg>
</div>
<footer id="colophon" class="site-footer">
    <!-- end .row -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="site-info">
                        <p class="copyright">&copy; 2021. All Rights Reserved by Run Away With Me.</p>
                    </div><!-- .site-info -->
                </div>
                <div class="col-md-6">
                    <ul id="horizontal-list">
                        <li>
                            <a target="_blank" href="http://www.facebook.com/runawaywithmeblog">
                                <img src="http://runawaywithme.test/wp-content/themes/runaway-withme/assets/icons/facebook.svg" alt="Facebook">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.instagram.com/runaway.withme_">
                                <img src="http://runawaywithme.test/wp-content/themes/runaway-withme/assets/icons/instagram.svg" alt="Instagram">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.pinterest.com/runawaywithmetravel">
                                <img src="http://runawaywithme.test/wp-content/themes/runaway-withme/assets/icons/pinterest2.svg" alt="Pinterest">
                            </a>
                        </li>
                    </ul>
                    <!-- end .footerSocial -->
                </div>
            </div>
            <!-- end .row -->
        </div>
        <!-- end .col-md-12 -->
    </div>
    <!-- end .row -->

</footer><!-- #colophon -->

<!-- COOKIE NOTICE -->
<script data-text="Are you agree with our cookie policy?" data-button="Learn More" data-info="Data Information" data-link="/privacy-policy" data-expire="30" data-style="#cookieWarnBox a {}" type="text/javascript" id="cookieWarn" src="<?php echo get_template_directory_uri() ?>/js/cookie-warn.min.js">
</script>

<?php wp_footer(); ?>
</body>

</html>