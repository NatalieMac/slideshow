<?php /* Functions for mah slideshow */

function slideshow_assets() {
  // Scripts
  wp_enqueue_script( 'modernizer', get_stylesheet_directory_uri() . '/js/modernizr.js' );
  wp_register_script( 'bacond', get_stylesheet_directory_uri() . '/js/jquery.ba-cond.min.js', array('jquery'));
  wp_register_script( 'slitslider', get_stylesheet_directory_uri() . '/js/jquery.slitslider.js', array('jquery', 'bacond'));
  wp_enqueue_script( 'fsscustom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'bacond', 'slitslider'));

  // Styles
  wp_enqueue_style( 'customcss', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'slideshow_assets');

function twentytwelve_setup() {


  // This theme supports a variety of post formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status', 'video' ) );

  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1280, 768, true );
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );


function load_slides( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    $query->set( 'order', 'ASC' );
    return;
  }

  if ( is_home() ) {
    $query->set( 'posts_per_page', 60 );
    $query->set( 'order', 'ASC' );
    return;
  }

}
add_action( 'pre_get_posts', 'load_slides', 1 );