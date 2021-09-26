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

<footer id="colophon" class="site-footer">
    <!-- end .row -->
    <div class="footer-bottom">
        <div class="container">
            <div class="site-info">
                <p class="copyright">&copy; 2021. All Rights Reserved by Run Away With Me.</p>
            </div><!-- .site-info -->
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