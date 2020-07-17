<?php
/*
    1. Enqueue Theme Dependencies
        1.1 Styles
        1.2 Scripts
    2. Hook into the administrative header output
    3. Register theme menus
        3.1 Custom Navigations
    4. Register Sidebars
    5. Remove Welcome Panel
    6. Enable Shortcodes
    7. Allow SVG
    8. Allow featured images
*/

// 1. Enqueue Theme Dependencies
function workerline_dependencies() {
    // Styles
    wp_enqueue_style( 'theme_grid_icons', get_template_directory_uri() . '/assets/css/grid.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css' );
    // Scripts
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '', true );
}  
add_action( 'wp_enqueue_scripts', 'workerline_dependencies' );

// 2. Customize WP Dashboard Footer (Will Whitelabel WP in future)
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
    function remove_footer_admin () {
    echo 'Powered by Workerline</p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');    

// 3.1 Custom Navigations
function wpb_custom_new_menu() {
    register_nav_menu('header',__( 'Header' ));
    register_nav_menu('workerline',__( 'Workerline' ));
    register_nav_menu('product',__( 'Product' ));
    register_nav_menu('resources',__( 'Resources' ));
}
add_action( 'init', 'wpb_custom_new_menu' );    

// Clean the ugly menu markup
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}

// 4. Register Sidebars
function custom_sidebars() {
 
    $args = array(
        'id'            => 'custom_sidebar',
        'name'          => __( 'Custom Widget Area', 'text_domain' ),
        'description'   => __( 'A custom widget area', 'text_domain' ),
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    );
    register_sidebar( $args );
 
}
add_action( 'widgets_init', 'custom_sidebars' );

// 5. Remove Welcome Panel
remove_action('welcome_panel', 'wp_welcome_panel');

// 6. Enable Shortcodes
add_filter('widget_text','do_shortcode');

// 7. Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

//   8. Featured Images
add_theme_support( 'post-thumbnails' );