<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="modinatheme">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head() ?>
</head>

<body class="body-wrapper" <?php body_class(); ?>>

<!-- welcome content start from here -->
<header class="header-wrap header-2">
    <div class="header-top-bar text-white d-none d-sm-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-sm-9">
                    <ul class="top-left-content">
                        <!--<li><i class="flaticon-paper-plane"></i> Info@example.com</li>
                        <li><i class="flaticon-map"></i> Jones Street, New York, USA</li>-->
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-3 text-end">
                    <div class="top-social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-header-wrapper">
        <div class="container-fluid align-items-center justify-content-between d-flex">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <?php
                        $logo = get_header_image();
                    ?>
                    <img src="<?php echo $logo ?>">
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
                        <i class="fal fa-bars"></i>
                    </div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav">
                            <i class="fal fa-times-circle"></i>
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
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

