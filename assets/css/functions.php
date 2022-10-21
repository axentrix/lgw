<?php
/*This file is part of iopen, naked-wordpress-master child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
function style_css(){

    if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
    /* CSS */

    wp_enqueue_style( 'iopen-three-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');

    wp_enqueue_style( 'iopen-two-style', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
    wp_enqueue_style( 'iopen-four-style', '
https://unpkg.com/aos@2.3.1/dist/aos.css');

    wp_enqueue_style( 'iopen-seven-style', get_stylesheet_directory_uri() . '/assets/css/main.css');

    /* JS */
  
    wp_enqueue_script('iopen-eleven-js',get_stylesheet_directory_uri() . '/assets/js/1.16.0_popper.min.js',array( 'jquery' ),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-two-js',get_stylesheet_directory_uri() . '/assets/js/4.5.0_bootstrap.min.js',array( 'jquery' ),wp_get_theme()->get( 'Version' ));
      wp_enqueue_script('iopen-three-js',get_stylesheet_directory_uri() . '/assets/js/2.3.1_aos.js',array( 'jquery' ),wp_get_theme()->get( 'Version' ));
      wp_enqueue_script('iopen-four-js',get_stylesheet_directory_uri() . '/assets/js/1.8.5_countUp.min.js',array( 'jquery' ),wp_get_theme()->get( 'Version' ));
   
  }else{
    if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
      wp_register_style(
        'parente2-style',
        get_template_directory_uri() . '/style.css'
      );

      wp_enqueue_style( 'parente2-style' );
      // loading child style
      wp_register_style(
        'childe2-style',
        get_stylesheet_directory_uri() . '/style.css'
      );
      wp_enqueue_style( 'childe2-style');
    }
   
		//-- NEW CSS START
    wp_enqueue_style( 'iopen-one-style', get_stylesheet_directory_uri() . '/assets/css/animate.css');
//     wp_enqueue_style( 'iopen-two-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css');
//     wp_enqueue_style( 'iopen-three-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'iopen-four-style', get_stylesheet_directory_uri() . '/assets/css/ddsmoothmenu.css');
    wp_enqueue_style( 'iopen-five-style', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style( 'iopen-six-style', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.css');
//    wp_enqueue_style( 'iopen-seven-style', get_stylesheet_directory_uri() . '/assets/css/main.css');
      wp_enqueue_style( 'iopen-eight-style', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.css');
      wp_enqueue_style( 'iopen-nine-style', get_stylesheet_directory_uri() . '/assets/css/responsive.css');

    /* JS */




    wp_enqueue_script('iopen-eleven-js',get_stylesheet_directory_uri() . '/assets/js/popper.min.js',array(),wp_get_theme()->get( 'Version' ));
      wp_enqueue_script('iopen-two-js',get_stylesheet_directory_uri() . '/assets/js/bootstrap.js',array(),wp_get_theme()->get( 'Version' ));
      wp_enqueue_script('iopen-three-js',get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js',array(),wp_get_theme()->get( 'Version' ));
      wp_enqueue_script('iopen-five-js',get_stylesheet_directory_uri() . '/assets/js/jquery.fancybox.min.js',array(),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-twelve-js',get_stylesheet_directory_uri() . '/assets/js/scrolltopcontrol.js',array(),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-eight-js',get_stylesheet_directory_uri() . '/assets/js/menu.js',array(),wp_get_theme()->get( 'Version' ));
      wp_enqueue_script('iopen-seven-js',get_stylesheet_directory_uri() . '/assets/js/lottie-player.js',array(),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-ten-js',get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js',array(),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-four-js',get_stylesheet_directory_uri() . '/assets/js/carousel.js',array(),wp_get_theme()->get( 'Version' ),true);
    // wp_enqueue_script('iopen-nine-js',get_stylesheet_directory_uri() . '/assets/js/owl.carousel.js',array(),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-one-js',get_stylesheet_directory_uri() . '/assets/js/at-jquery.js',array(),wp_get_theme()->get( 'Version' ));
    wp_enqueue_script('iopen-thirteen-js',get_stylesheet_directory_uri() . '/assets/js/wow.min.js',array(),wp_get_theme()->get( 'Version' ));
  //-- NEW CSS END
 


}

}
add_action( 'wp_enqueue_scripts', 'style_css' );

function wpb_custom_new_menu() {
  register_nav_menu('new-design-menu',__( 'New Design Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
/*if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function iopen_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'iopen_enqueue_child_styles' );*/

/*Write here your own functions */
@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '300' );

/* Adding 5 new widget areas to the footer */
register_sidebar( array(
'name' => 'Footer Sidebar 1',
'id' => 'footer-sidebar-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 2',
'id' => 'footer-sidebar-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 3',
'id' => 'footer-sidebar-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 4',
'id' => 'footer-sidebar-4',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array(
'name' => 'Footer Sidebar 5',
'id' => 'footer-sidebar-5',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
) );

function register_my_menu() {
  register_nav_menu('language-switcher',__( 'Language Switcher' ));
}
add_action( 'init', 'register_my_menu' );


// Add this to the functions.php file of your WordPress theme
// It filters the mime types using the upload_mimes filter hook
// Add as many keys/values to the $mimes Array as needed

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'do_parse_request', function( $bool, WP $wp ) {
  $home_path = trim( parse_url( home_url(), PHP_URL_PATH ), '/' );
  $path = substr( trim( add_query_arg( array() ), '/' ), strlen( $home_path ) );
  if ( $path === 'latest' ) { // change 'latest' to anything else to change the url
     $wp->query_vars = array(
       'posts_per_page' => 1, // if you want more than one post change this
       'post_type' => 'post'
     );
     $wp->is_latests = true;
     return false; // stop WordPress parsing request
  }
  $wp->is_latests = false;
  return $bool;
}, 0, 2);

function turn_blogposts_translation_off( $post_types, $is_settings ) {
  unset( $post_types['post'] );
  
  return $post_types;
}

add_filter( 'pll_get_post_types', 'turn_blogposts_translation_off', 10, 2 );

function turn_categoryblog_translation_off( $taxonomies, $is_settings ) {
    unset( $taxonomies['category'] );
    return $taxonomies;
}
add_filter( 'pll_get_taxonomies', 'turn_categoryblog_translation_off', 10, 2 );

function turn_tagblog_translation_off( $taxonomies, $is_settings ) {
    unset( $taxonomies['post_tag'] );
    return $taxonomies;
}
add_filter( 'pll_get_taxonomies', 'turn_tagblog_translation_off', 10, 2 );




