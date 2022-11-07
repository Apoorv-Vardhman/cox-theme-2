<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="modinatheme">
    <title>
        <?php
            bloginfo( 'name' );
            wp_title();
            if(is_front_page())
            {
                echo " | ";
                bloginfo('description');
            }
            ?>
    </title>
    <?php wp_head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body-wrapper" <?php body_class(); ?>>

<!-- welcome content start from here -->
<header class="header-wrap header-2">
    <div class="d-none">
        <?php
        /*
         * https://developer.wordpress.org/reference/functions/wp_nav_menu/
         * */
            /*wp_nav_menu(array(
                'theme_location'=>'top-menu',
                'menu_class'=>''
            ));*/

        $menu_name = 'top-menu';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $email= get_field('email',$menu);
        $address= get_field('address',$menu);
        $facebook= get_field('facebook',$menu);
        $twitter= get_field('twitter',$menu);
        $instagram= get_field('instagram',$menu);
        $linkedin= get_field('linkedin',$menu);
        $top_menu = get_field('top_menu',$menu);
        /*print_r($menu);
        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
        print_r($menuitems)*/
        ?>

    </div>
    <?php
        if($top_menu):
    ?>
    <div class="header-top-bar text-white d-none d-sm-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-sm-9">
                    <ul class="top-left-content">
                        <?php
                            if($email):
                        ?>
                                <li><a href="mailto:<?php echo $email; ?>" target="_blank"><i class="flaticon-paper-plane"></i> <?php echo $email; ?></a> </li>
                        <?php
                            endif;
                        ?>
                        <?php
                            if($address):
                        ?>
                        <li><i class="flaticon-map"></i> <?php echo $address; ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-3 text-end">
                    <div class="top-social-icons">
                        <?php
                        if($facebook): ?>
                            <a href="<?php echo $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php
                        endif;
                        ?>
                        <?php
                        if($twitter): ?>
                            <a href="<?php echo $twitter ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php
                        endif;
                        ?>
                        <?php if($instagram): ?>
                            <a href="<?php echo $instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if($linkedin): ?>
                            <a href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        endif;
    ?>
    <div class="main-header-wrapper">
        <div class="container-fluid align-items-center justify-content-between d-flex">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <?php
                        $logo = get_header_image();
                    ?>
                    <?php
                        if($logo)
                        { ?>
                            <img src="<?php echo $logo ?>">
                     <?php   }
                        else { ?>
                           <h1>
                               <?php
                               bloginfo( 'name' );
                               ?>
                           </h1>
                      <?php  }
                    ?>

                </a>
            </div>
            <div class="main-menu d-none d-lg-block">
                <?php
                /*
                 * https://developer.wordpress.org/reference/functions/wp_nav_menu/
                 * */
                wp_nav_menu(array(
                        'theme_location'=>'primary-menu',
                        'menu_class'=>''
                )) ?>
            </div>
            <div class="d-inline-block d-lg-none">
                <div class="mobile-nav-wrap">
                    <div id="hamburger">
                        <i class="fas fa-bars"></i>
                    </div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <nav class="sidebar-nav">
                            <ul class="metismenu" id="mobile-menu">
                                <?php
                                    /*
                                     * https://developer.wordpress.org/reference/functions/wp_nav_menu/
                                     * */
                                    wp_nav_menu(array(
                                        'theme_location'=>'mobile-menu',
                                        'menu_class'=>''
                                    ))
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <div class="right-elements d-none d-xl-flex d-flex align-items-center">
                <div class="search-icon">
                    <a href="#" class="search-btn"><i class="fas fa-search"></i></a>
                    <div class="search-box">
                        <?php
                            get_search_form( );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

