<?php

function cox_theme_assets() {
    /**
     * wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' )
     * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
     * */

    /*css*/
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '3.7.0' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.1.3' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
    wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.2.1' );
    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), '2.2.1' );
    wp_enqueue_style( 'metismenu', get_template_directory_uri() . '/assets/css/metismenu.css', array(), '2.7.2' );
    wp_enqueue_style( 'icons', get_template_directory_uri() . '/assets/css/icons.css', array(), '5.8.1' );
    wp_enqueue_style( 'main_style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0' );
    /*
     * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
     * wp_enqueue_script( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false )
     * */
    /*JS*/
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '3.6.0', 1);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'), '3.7.1', 1);
    wp_enqueue_script('jquery.easing', get_template_directory_uri() . '/assets/js/jquery.easing.js', array('jquery'), '1.3', 1);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '2.10.2', 1);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '5.1.3', 1);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.5', 1);
    wp_enqueue_script('imageload', get_template_directory_uri() . '/assets/js/imageload.min.js', array('jquery'), '4.1.4', 1);
    wp_enqueue_script('scrollUp', get_template_directory_uri() . '/assets/js/scrollUp.min.js', array('jquery'), '2.4.1', 1);
    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.2.1', 1);
    wp_enqueue_script('magnific', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), '1.1.0', 1);
    wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/counterup.min.js', array('jquery'), '1.0', 1);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.1.3', 1);
    wp_enqueue_script('metismenu', get_template_directory_uri() . '/assets/js/metismenu.js', array('jquery'), '2.7.2', 1);
    wp_enqueue_script('active', get_template_directory_uri() . '/assets/js/active.js', array('jquery'), '1.0', 1);

}

add_action( 'wp_enqueue_scripts', 'cox_theme_assets' );


//navigation menu
register_nav_menus(array(
    'primary-menu'=>'Desktop Menu',
    'mobile-menu'=>'Mobile Menu',
    'top-menu'=>'Top Menu',
    'quick-links'=>'Footer Quick Links',
    'resources'=>'Footer Resources',
    'copyright-menu'=>'Copyright footer menu'
));

add_theme_support('post-thumbnails');
add_post_type_support('page','excerpt');
add_theme_support('custom-header');



require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/shortcodes.php';
