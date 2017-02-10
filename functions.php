<?php
function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ) )
  );
}
add_action( 'init', 'register_my_menus' );

/*
register_sidebar(array(
    'name' => 'Footer',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h6>',
    'after_title' => '</h6>',
));
*/
register_sidebar(array(
    'name' => 'Uudiste arhiiv',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
));

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


// Register widgetized areas

function theme_widgets_init() {
  // Area 1
  register_sidebar( array (
    'name' => 'Logod',
    'id' => 'logo_widget_area',
  ) );
} // end theme_widgets_init

add_action( 'init', 'theme_widgets_init' );

/*$header_img = array(
  'flex-width'    => true,
  'width'         => 1284,
  'flex-height'    => true,
  'height'        => 494,
  'default-image' => get_template_directory_uri() . '/images/header_bg_14.png',
);
add_theme_support( 'custom-header', $header_img );*/

add_theme_support( 'post-thumbnails' );






/*
  Setting up Column shortcodes plugin for nm17 theme
*/
// hiding custom padding
add_filter( 'cpsh_hide_padding_settings', '__return_true' );

// hiding unnecessary column sets
function hide_column_shortcodes( $shortcodes ) {
    unset( $shortcodes['full_width'] );
    // unset( $shortcodes['one_half'] );
    unset( $shortcodes['one_third'] );
    unset( $shortcodes['one_fourth'] );
    unset( $shortcodes['two_third'] );
    unset( $shortcodes['three_fourth'] );
    unset( $shortcodes['one_fifth'] );
    unset( $shortcodes['two_fifth'] );
    unset( $shortcodes['three_fifth'] );
    unset( $shortcodes['four_fifth'] );
    unset( $shortcodes['one_sixth'] );
    unset( $shortcodes['five_sixth'] );
    return $shortcodes;
}
add_filter( 'cpsh_column_shortcodes', 'hide_column_shortcodes' );

// prevent loading the default styles (want to replace floats with flexbox)
add_filter( 'cpsh_load_styles', '__return_false' );


/*
  Trying to enable SVG upload:
  https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
  fixes the mime type, possible to submit, but shows error message in WP 4.7.1
  waiting for fix
*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* emojis have to go away */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Show posts of 'post', and 'news' post types on archive page


function add_my_post_types_to_query( $query ) {
  if ( is_archive() && $query->is_main_query() ){
    $query->set( 'post_type', array( 'uudis' ) );
    return $query;
  }
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );


/* Custom classes to editor */

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');
/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

	$style_formats = array(
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
		array(
			'title' => 'h1 sõõrikuga',
			'block' => 'h1',
			'classes' => 'nm-fancyHeading',
			'wrapper' => false,
		),
    array(
			'title' => 'h2 sõõrikuga',
			'block' => 'h2',
			'classes' => 'nm-fancyHeading',
			'wrapper' => false,
		),
    array(
			'title' => 'h3 sõõrikuga',
			'block' => 'h3',
			'classes' => 'nm-fancyHeading',
			'wrapper' => false,
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );




/* prev/next buttons */
/*function get_pagination_in_json( $post_response, $post, $context ) {

    $post = get_post($post['ID']);

    $previous_post = get_adjacent_post( true, '', true, 'tootuba' );
    $next_post = get_adjacent_post( true, '', false, 'tootuba' );

    if ( is_a( $previous_post, 'WP_Post' ) ) {
        $previous = get_permalink($previous_post->ID);
        $post_response['pagination']['previous'] = $previous;
    }

    if ( is_a( $next_post, 'WP_Post' ) ) {
        $next = get_permalink($next_post->ID);
        $post_response['pagination']['next'] = $next;
    }

    return $post_response;
}
add_filter( 'json_prepare_post', 'get_pagination_in_json', 10, 3 );
*/


/*
function nm_custom_post_rewrite( $rewrite_rules ) {
  $cpslug = 'uudis'; // custom post type slug
  // Rule to display monthly archive -> contest_recipe/2012/08/
  $year_archive = array( $cpslug . '/([0-9]{4})/([0-9]{1,2})/?$' => 'index.php?year=$matches[1]&monthnum=$matches[2]&post_type=' . $cpslug );
  // Rule to display yearly archive -> contest_recipe/2012/
  $month_archive = array( $cpslug . '/([0-9]{4})/?$' => 'index.php?year=$matches[1]&post_type=' . $cpslug );
  $rewrite_rules = $year_archive + $month_archive + $rewrite_rules;
  return $rewrite_rules;
}
add_filter('rewrite_rules_array', 'nm_custom_post_rewrite');
*/
?>
