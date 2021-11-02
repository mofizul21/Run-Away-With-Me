<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package runaway-withme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php runaway_withme_post_thumbnail(); ?>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        //if ('post' === get_post_type()) :
        ?>
            <div class="entry-meta">
                <?php
                runaway_withme_posted_on();
                runaway_withme_posted_by();
                ?>
            </div><!-- .entry-meta -->
            <?php //echo do_shortcode('[social]'); ?>
        <?php //endif; ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <?php
        //the_excerpt();
        the_content();
        //echo wp_trim_words(get_the_content(), 20, '...');
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php echo do_shortcode('[social]'); ?>
        <?php runaway_withme_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->