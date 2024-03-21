<?php

if ( ! isset( $content_width ) ) {
	$content_width = 800;
} 

// Register Theme Features
function timelessone_features()  {

  // Custom Header
  $header = array(
    'width' => 1920,
    'height' => 1080,
  );
  add_theme_support( 'custom-header', $header );
  
  // Switching Some Elements To HTML5
  $html5 = array(
    'gallery',
    'caption'
  );
  add_theme_support( 'html5', $html5 );

  // Lets Wordpress Handle The Title Tag
  add_theme_support( 'title-tag' );

  // JPEG Compression Quality
  add_filter( 'jpeg_quality', create_function( '', 'return 90;' ) );

   // Enables Post Thumbnails
  add_theme_support( 'post-thumbnails' );
  
  // Removes Paragraph Around Images
  function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }
  add_filter('the_content', 'filter_ptags_on_images');

}
add_action( 'after_setup_theme', 'timelessone_features' );

// Register And  Solid Mantle Scripts And Styles
add_action('init', 'timelessone_register_files');
function timelessone_register_files() {
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', '', '2016.07');
  wp_register_style('magnific', get_template_directory_uri() . '/css/magnific-popup.min.css', '', '1.1.0');
  wp_register_script('magnific-popup', get_template_directory_uri() . '/js/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true);
  wp_register_script('magnific-init', get_template_directory_uri() . '/js/magnific-init.js', array( 'magnific-popup' ), '1.1.0', true);
}
add_action( 'wp_enqueue_scripts', 'timelessone_enqueue_files' );

// Enqueue Scripts and Styles
function timelessone_enqueue_files() {
  wp_enqueue_style('main');
  if ( is_singular('portfolio') ) {
    wp_enqueue_style('magnific');
    wp_enqueue_script('magnific-init');
  }
}

// Hide Author Usernames
add_action(‘template_redirect’, ‘timelessone_redirect’);
  function timelessone_redirect() {
    if (is_author()) {
      wp_redirect( home_url() ); exit;
    }
}

// Embed Responsive
function embed_responsive($html) {
  return '<div class="embed-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'embed_responsive', 10, 3 );

?>