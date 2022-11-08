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

add_action( 'admin_notices', 'my_theme_dependencies' );

function my_theme_dependencies() {
    if( ! function_exists('get_field') )
        echo '<div class="error"><p>' . __( 'Warning: The theme needs Advanced Custom Fields', 'my-theme' ) . '</p></div>';
}

function custom_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
        <div class="custom-form"> 
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search your keyword..." />
        <button type="submit"><i class="fas fa-search"></i></button> 
      </div>
      </form>';

    return $form;
}
add_filter( 'get_search_form', 'custom_search_form', 40 );

function my_register_sidebars()
{
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            /*'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',*/
        )
    );
}
add_action( 'widgets_init', 'my_register_sidebars' );


/*add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

function my_wp_nav_menu_items( $items, $args ) {

    $menu = wp_get_nav_menu_object($args->menu);
    $data = array();
    if( $args->theme_location == 'top-menu' ) {
        $facebook = get_field('facebook',$menu);
        $data['facebook'] =$facebook;
        $twitter = get_field('twitter',$menu);
        $data['twitter'] =$twitter;
        $instagram = get_field('instagram',$menu);
        $data['instagram'] =$instagram;
        $linkedin = get_field('linkedin',$menu);
        $data['linkedin'] =$linkedin;
        $is_top_menu = get_field('top_menu',$menu);
        $data['top_menu'] =$is_top_menu;
    }
    return $data;
}*/

// Register Custom Post Type carousel
function create_carousel_cpt() {

    $labels = array(
        'name' => _x( 'carousels', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'carousel', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'carousels', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'carousel', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'carousel Archives', 'textdomain' ),
        'attributes' => __( 'carousel Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent carousel:', 'textdomain' ),
        'all_items' => __( 'All carousels', 'textdomain' ),
        'add_new_item' => __( 'Add New carousel', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New carousel', 'textdomain' ),
        'edit_item' => __( 'Edit carousel', 'textdomain' ),
        'update_item' => __( 'Update carousel', 'textdomain' ),
        'view_item' => __( 'View carousel', 'textdomain' ),
        'view_items' => __( 'View carousels', 'textdomain' ),
        'search_items' => __( 'Search carousel', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into carousel', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this carousel', 'textdomain' ),
        'items_list' => __( 'carousels list', 'textdomain' ),
        'items_list_navigation' => __( 'carousels list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter carousels list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'carousel', 'textdomain' ),
        'description' => __( 'cox-carousels with owl crousel', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-slides',
        'supports' => array('title', 'excerpt', 'thumbnail', 'custom-fields'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'carousel', $args );

}
add_action( 'init', 'create_carousel_cpt', 0 );


// Register Custom Post Type testimonial
function create_testimonial_cpt() {

    $labels = array(
        'name' => _x( 'testimonials', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'testimonial', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'carousels', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'testimonial', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'testimonial Archives', 'textdomain' ),
        'attributes' => __( 'testimonial Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent testimonial:', 'textdomain' ),
        'all_items' => __( 'All testimonials', 'textdomain' ),
        'add_new_item' => __( 'Add New testimonial', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New testimonial', 'textdomain' ),
        'edit_item' => __( 'Edit testimonial', 'textdomain' ),
        'update_item' => __( 'Update testimonial', 'textdomain' ),
        'view_item' => __( 'View testimonial', 'textdomain' ),
        'view_items' => __( 'View testimonials', 'textdomain' ),
        'search_items' => __( 'Search testimonial', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into testimonial', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'textdomain' ),
        'items_list' => __( 'testimonials list', 'textdomain' ),
        'items_list_navigation' => __( 'testimonials list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter testimonials list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'testimonial', 'textdomain' ),
        'description' => __( 'cox-testimonials with owl crousel', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title', 'excerpt', 'thumbnail', 'custom-fields'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'testimonial', $args );

}
add_action( 'init', 'create_testimonial_cpt', 0 );


