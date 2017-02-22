<?php
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header' );
add_theme_support( 'widgets' );

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
      // wp_enqueue_style( 'authorization147e_css', get_template_directory_uri(). 'css/authorization147e.css?targetBlogID=8510576969454812066&amp;zx=eed29623-557e-475c-b8f3-19b425da3ab4');
      wp_enqueue_style( 'google_fonts','http://fonts.googleapis.com/css?family=Roboto:400,900,700,500,300,400italic|Montserrat:700');
      wp_enqueue_style( 'fontawesome_css', get_template_directory_uri(). '/css/font-awesome.min.css');
      wp_enqueue_style( 'bootstrap_css',  'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
      wp_enqueue_style( 'main_css', get_template_directory_uri(). '/css/main.css');
  }
  add_action( 'wp_enqueue_scripts', 'wpv_theme_styles' );

  function wpv_theme_js(){
       wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', true );
       wp_enqueue_script( 'script_js', get_template_directory_uri().'/js/script.js', array('jquery'), '', true );
   }
  add_action( 'wp_enqueue_scripts', 'wpv_theme_js' );

  $widj = array(
  	'name'          => __( 'right-sidebar', 'sideb' ),
  	'id'            => 'sid-12',
  	'description'   => '',
          'class'         => '',
  	'before_widget' => '<li id="%1$s" class="widget %2$s">',
  	'after_widget'  => '</li>',
  	'before_title'  => '<h2 class="widgettitle">',
  	'after_title'   => '</h2>' );

    register_sidebar($widj);

// comment adjust





 ?>
