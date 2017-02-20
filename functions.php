<?php
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header' );

function register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __('Primary Menu')
    )
  );
}
add_action('init', 'register_theme_menus');

 function wpv_theme_styles(){
      wp_enqueue_style( 'googleapis_css', 'https://fonts.googleapis.com/css?kit=IQHow_FEYlDC4Gzy_m8fckBzu7TUd5vUzi-wE6mvyJI');
      wp_enqueue_style( 'bundle_css', get_template_directory_uri(). '/css/1691512649-css_bundle_v2.css');
      wp_enqueue_style( 'authorization147e_css', get_template_directory_uri(). 'css/authorization147e.css?targetBlogID=8510576969454812066&amp;zx=eed29623-557e-475c-b8f3-19b425da3ab4');
      wp_enqueue_style( 'google_fonts','http://fonts.googleapis.com/css?family=Roboto:400,900,700,500,300,400italic|Montserrat:700');
      wp_enqueue_style( 'fontawesome_css', get_template_directory_uri(). '/css/font-awesome.min.css');
      wp_enqueue_style( 'main_css', get_template_directory_uri(). '/css/main.css');
  }
  add_action( 'wp_enqueue_scripts', 'wpv_theme_styles' );

  function wpv_theme_js(){
       wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/vendor/modernizr.min.js', '', '', false);
      //wp_enqueue_script( 'plusone_js', get_template_directory_uri() . '/js/plusone.js', array('jquery'), '', true );
      //  wp_enqueue_script( '127631110-widgets_js', get_template_directory_uri() . '/js/127631110-widgets.js', array('jquery'), '', true );
      //  wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/js/slick.js', '', '', true );
      //  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'bootstrap_js'), '', true );
   }
  add_action( 'wp_enqueue_scripts', 'wpv_theme_js' );

 ?>
