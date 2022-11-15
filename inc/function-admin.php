<?php

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
        'menu_name' => _x( 'testimonials', 'Admin Menu text', 'textdomain' ),
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

function create_home_cards_cpt() {

    $labels = array(
        'name' => _x( 'home_cards', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'home_card', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'home_cards', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'home_cards', 'Add New on Toolbar', 'textdomain' ),
        'attributes' => __( 'home_card Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent home_card:', 'textdomain' ),
        'all_items' => __( 'All home_cards', 'textdomain' ),
        'add_new_item' => __( 'Add New home_card', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New home_card', 'textdomain' ),
        'edit_item' => __( 'Edit home_card', 'textdomain' ),
        'update_item' => __( 'Update home_card', 'textdomain' ),
        'view_item' => __( 'View home_card', 'textdomain' ),
        'view_items' => __( 'View home_cards', 'textdomain' ),
        'search_items' => __( 'Search home_card', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into testimonial', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this home_card', 'textdomain' ),
        'items_list' => __( 'home_card list', 'textdomain' ),
        'items_list_navigation' => __( 'home_card list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter home_card list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'home_card', 'textdomain' ),
        'description' => __( 'cox-home_card', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-page',
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
    register_post_type( 'home_card', $args );

}
add_action( 'init', 'create_home_cards_cpt', 0 );


function create_home_about_cpt() {

    $labels = array(
        'name' => _x( 'home_about', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'home_about', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'home_about', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'home_about', 'Add New on Toolbar', 'textdomain' ),
        'attributes' => __( 'home_about Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent home_about:', 'textdomain' ),
        'all_items' => __( 'All home_about', 'textdomain' ),
        'add_new_item' => __( 'Add New home_about', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New home_about', 'textdomain' ),
        'edit_item' => __( 'Edit home_about', 'textdomain' ),
        'update_item' => __( 'Update home_about', 'textdomain' ),
        'view_item' => __( 'View home_about', 'textdomain' ),
        'view_items' => __( 'View home_about', 'textdomain' ),
        'search_items' => __( 'Search home_about', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into testimonial', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this home_card', 'textdomain' ),
        'items_list' => __( 'home_about list', 'textdomain' ),
        'items_list_navigation' => __( 'home_about list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter home_about list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'home_about', 'textdomain' ),
        'description' => __( 'cox-home_about', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-site-alt3',
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
    register_post_type( 'home_about', $args );

}
add_action( 'init', 'create_home_about_cpt', 0 );

function cox_add_admin_page() {

    //Generate Sunset Admin Page
    //add_menu_page( 'Cox Theme Options', 'Cox Theme', 'manage_options', 'cox_theme', 'cox_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );
    add_menu_page( 'Cox Theme Options', 'Cox Theme', 'manage_options', 'cox_theme', 'cox_theme_create_page', 'dashicons-buddicons-buddypress-logo', 110 );

    //Generate Sunset Admin Sub Pages
    add_submenu_page( 'cox_theme', 'Cox Contact Form', 'Contact Form', 'manage_options', 'cox_theme_contact', 'cox_contact_form_page' );

    /*add_submenu_page( 'alecaddd_sunset', 'Sunset Sidebar Options', 'Sidebar', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page' );
    add_submenu_page( 'alecaddd_sunset', 'Sunset Theme Options', 'Theme Options', 'manage_options', 'alecaddd_sunset_theme', 'sunset_theme_support_page' );

    add_submenu_page( 'alecaddd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page');*/

}
add_action( 'admin_menu', 'cox_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'cox_custom_settings' );

function cox_custom_settings()
{
    //Contact Form Options
    register_setting( 'cox-contact-options', 'activate_contact' );
    add_settings_section( 'cox-contact-section', 'Contact Form', 'cox_contact_section', 'cox_theme_contact');
    add_settings_field( 'activate-form', 'Activate Contact Form', 'cox_activate_contact', 'cox_theme_contact', 'cox-contact-section' );

}

function cox_contact_section() {
    echo 'Activate and Deactivate the Built-in Contact Form';
}

function cox_activate_contact() {
    $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

function sunset_contact_form_page() {
    require_once( get_template_directory() . '/inc/templates/cox-contact-form.php' );
}


function cox_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/cox-admin.php' );
}

function cox_contact_form_page() {
    require_once( get_template_directory() . '/inc/templates/cox-contact-form.php' );
}
