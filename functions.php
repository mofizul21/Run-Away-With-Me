<?php
/**
 * runaway-withme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package runaway-withme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'runaway_withme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function runaway_withme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on runaway-withme, use a find and replace
		 * to change 'runaway-withme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'runaway-withme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		// register_nav_menus(
		// 	array(
		// 		'menu-1' => esc_html__( 'Primary', 'runaway-withme' ),
		// 	)
		// );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'runaway_withme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'runaway_withme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function runaway_withme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'runaway_withme_content_width', 640 );
}
add_action( 'after_setup_theme', 'runaway_withme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function runaway_withme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'runaway-withme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'runaway-withme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'runaway_withme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function runaway_withme_scripts() {
	//wp_enqueue_style( 'runaway-withme-bootstrap', get_stylesheet_uri(), '/css/bootstrap.min.css', array(), _S_VERSION );
    wp_enqueue_style('runaway-withme-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.1', 'all');

	wp_enqueue_style( 'runaway-withme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'runaway-withme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'runaway-withme-bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'runaway-withme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'runaway_withme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// SLIDER :: CUSTOM POST TYPE
function featured_custom_post()
{
    $labels = array(
        'name'                  => _x('Sliders', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Slider', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Sliders', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Slider', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Slider', 'textdomain'),
        'new_item'              => __('New Slider', 'textdomain'),
        'edit_item'             => __('Edit Slider', 'textdomain'),
        'view_item'             => __('View Slider', 'textdomain'),
        'all_items'             => __('All Sliders', 'textdomain'),
        'search_items'          => __('Search Sliders', 'textdomain'),
        'parent_item_colon'     => __('Parent Sliders:', 'textdomain'),
        'not_found'             => __('No sliders found.', 'textdomain'),
        'not_found_in_trash'    => __('No sliders found in Trash.', 'textdomain'),
        'featured_image'        => _x('Slider Cover Image', 'Overrides the Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Opinion archives', 'The post type archive label used in nav menus. Default Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into opinion', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this opinion', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter sliders list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Sliders list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'textdomain'),
        'items_list'            => _x('Sliders list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'featured'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'         => array(),
    );

    register_post_type('featured', $args);
}
add_action('init', 'featured_custom_post');





// SOCIAL BUTTONS
// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
    return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function wpvkp_social_buttons($content)
{
    global $post;
    if (is_singular() || is_home()) {

        // Get current page URL 
        $sb_url = urlencode(get_the_permalink());

        // Get current page title
        $sb_title = str_replace(' ', '%20', get_the_title());

        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text=' . $sb_title . '&amp;url=' . $sb_url . '&amp;via=runaway_withme1';
        //$link  = 'https://twitter.com/share?text=' . urlencode($page_title . $by) . '&url=' . $page_permalink;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $sb_url;
        $bufferURL = 'https://bufferapp.com/add?url=' . $sb_url . '&amp;text=' . $sb_title;
        $whatsappURL = 'whatsapp://send?text=' . $sb_title . ' ' . $sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $sb_url . '&amp;title=' . $sb_title;

        if (!empty($sb_thumb)) {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;
        } else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;description=' . $sb_title;
        }

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;

        // Add sharing button at the end of page/page content
        $content .= '<div class="social-box"><div class="social-btn">';
        $content .= '<span class="col-2 sbtn shareOn">Share on: </span>';
        $content .= '<a class="col-1 sbtn s-twitter" href="' . $twitterURL . '" target="_blank" rel="nofollow"><img src="' . get_template_directory_uri() . '/assets/icons/share_twitter-circle.png" alt="Twitter"></a>';
        $content .= '<a class="col-1 sbtn s-facebook" href="' . $facebookURL . '" target="_blank" rel="nofollow"><img src="'.get_template_directory_uri().'/assets/icons/share_facebook-circle.png" alt="Facebook"></a>';
        $content .= '<a class="col-1 sbtn s-whatsapp" href="' . $whatsappURL . '" target="_blank" rel="nofollow"><img src="' . get_template_directory_uri() . '/assets/icons/share_whatsapp-circle.png" alt="WhatsApp"></a>';
        $content .= '<a class="col-1 sbtn s-linkedin" href="' . $linkedInURL . '" target="_blank" rel="nofollow"><img src="' . get_template_directory_uri() . '/assets/icons/share_linkedin-circle.png" alt="LinkedIn"></a>';
        $content .= '<a class="col-1 sbtn s-pinterest" href="' . $pinterestURL . '" data-pin-custom="true" target="_blank" rel="nofollow"><img src="'.get_template_directory_uri().'/assets/icons/share_telegram-circle.png" alt="Telegram"></a>';
        $content .= '<a class="col-1 sbtn s-buffer" href="' . $bufferURL . '" target="_blank" rel="nofollow"><img src="'.get_template_directory_uri().'/assets/icons/share_mail-circle.png" alt="Mail"></a>';
        $content .= '</div></div>';

        return $content;
    } else {
        return $content;
    }
};
add_shortcode('social', 'wpvkp_social_buttons');


// BOOTSTARP 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach ($this->current_item->classes as $class) {
            if (in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ", $dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
// register a new menu
register_nav_menu('main-menu', 'BS menu');

// CODE STAR FRAMEWORK
// Check core class for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'my_framework';

    // Create options
    CSF::createOptions($prefix, array(
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'my-framework',
    ));

    // About Me Page
    CSF::createSection($prefix, array(
        'title'  => 'About Me',
        'fields' => array(
            array(
                'id'    => 'aboutMeTilte',
                'type'  => 'text',
                'title' => 'Title',
                'default' => 'About Me',
            ),            

            array(
                'id'    => 'aboutMeEditor',
                'type'  => 'wp_editor',
                'title' => 'Description',
                'sanitize' => false,
            ),

            array(
                'id'        => 'naomiImage',
                'type'      => 'upload',
                'title'     => 'Image Upload',
            ),

            array(
                'id'    => 'textUnderImage',
                'type'  => 'text',
                'title' => 'Image description',
                'default' => 'Here I am in Iceland, taking a dip in the Blue Lagoon!',
            ),


        )
    ));

    // Contact Page
    CSF::createSection($prefix, array(
        'title'  => 'Contact Page',
        'fields' => array(
            array(
                'id'    => 'getInTouch',
                'type'  => 'text',
                'title' => 'Title',
                'default' => 'Get in touch',
            ),

            array(
                'id'        => 'contactPageBg',
                'type'      => 'upload',
                'title'     => 'Image Upload',
                'default'   => 'https://runaway-withme.com/wp-content/uploads/2021/11/buenos-_aires_big.jpg',
            ),

        )
    ));

    // Sidebar Options
    CSF::createSection($prefix, array(
        'title'  => 'Sidebar',
        'fields' => array(
            array(
                'id'        => 'sidebarNaomi',
                'type'      => 'upload',
                'title'     => 'Sidebar Image',
                'default'   => 'https://runaway-withme.com/wp-content/uploads/2021/11/naomi-round.jpg',
            ),

            array(
                'id'        => 'sidebarAboutMeTitle',
                'type'      => 'text',
                'title'     => 'About Me',
                'default'   => 'About Me',
            ),

            array(
                'id'        => 'sidebarAboutMeDesc',
                'type'      => 'text',
                'title'     => 'Description',
                'default'   => '29 years, 33 countries, 100s of stories. Run Away With Me!',
            ),

            array(
                'id'        => 'subscribeTitle',
                'type'      => 'text',
                'title'     => 'Subscribe Title',
                'default'   => 'Subscribe',
            ),

            array(
                'id'        => 'subscribeBg',
                'type'      => 'upload',
                'title'     => 'Subscribe Image',
                'default'   => 'https://runaway-withme.com/wp-content/uploads/2021/11/subscripton_box_bg.jpg',

            ),
        )
    ));

    // Contact Page
    CSF::createSection($prefix, array(
        'title'  => 'Footer',
        'fields' => array(
            array(
                'id'    => 'copyrightText',
                'type'  => 'text',
                'title' => 'Copyright Text',
                'default' => '© 2021. All Rights Reserved by Run Away With Me.',
            ),

            array(
                'id'        => 'destinationMap',
                'type'      => 'upload',
                'title'     => 'Destination Map',
                'default'   => 'https://runaway-withme.com/wp-content/uploads/2021/11/map_updated.png',
            ),

        )
    ));
}
