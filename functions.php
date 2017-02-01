<?php
function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ) )
  );
}
add_action( 'init', 'register_my_menus' );


register_sidebar(array(
    'name' => 'Footer',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h6>',
    'after_title' => '</h6>',
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

$header_img = array(
  'flex-width'    => true,
  'width'         => 1284,
  'flex-height'    => true,
  'height'        => 494,
  'default-image' => get_template_directory_uri() . '/images/header_bg_14.png',
);
add_theme_support( 'custom-header', $header_img );

add_theme_support( 'post-thumbnails' );

/*
  Setting up Column shortcodes plugin for our theme
*/
// hiding custom padding
add_filter( 'cpsh_hide_padding_settings', '__return_true' );

// hiding unnecessary column sets
function hide_column_shortcodes( $shortcodes ) {
    /* uncomment ( remove the '//' ) any of the following to remove it's shortcode from menu */
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

// prevent loading the default styles (will replaced with flexbox)
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

/* emojis go away */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* prev/next buttons */
function get_pagination_in_json( $post_response, $post, $context ) {

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
