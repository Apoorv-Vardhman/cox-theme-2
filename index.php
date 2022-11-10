<?php
    get_header();
?>
<?php
    $args = array(
            'post_type'=>'carousel',
            'order'=>'ASC'
    );
    $sliders = new Wp_Query($args);
?>
<section class="hero-wrapper hero-2">
    <div class="hero-slider-2 owl-carousel owl-theme">
        <?php
            if($sliders->have_posts()):
                while ( $sliders->have_posts() ) : $sliders->the_post();
            $heading = get_field('heading',get_the_ID());
            $content = get_field('content',get_the_ID());
            $button_link = get_field('button_link',get_the_ID());
            $button_text = get_field('button_text',get_the_ID());
        ?>
                    <div class="single-slide bg-cover" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 pe-lg-5 col-xxl-7 col-lg-9">
                                    <div class="hero-contents pe-lg-3">
                                        <h1 class="wow fadeInLeft animated" data-wow-duration="1.3s"><?php echo $heading; ?></h1>
                                        <p class="pe-lg-5 wow fadeInLeft animated" data-wow-duration="1.3s" data-wow-delay=".4s"><?php echo $content; ?></p>
                                        <a href="<?php echo $button_link ?>" class="theme-btn me-sm-4 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".8s"><?php echo $button_text ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
            endwhile;
            endif;
        ?>


    </div>
    <?php
        $args=array('post_type' => 'home_card');
        $query= new WP_Query($args);
    if($query->have_posts()):
    ?>
        <div class="container">
            <div class="row">
                <?php
                    while ($query->have_posts()):
                        $query->the_post();
                    // Retrieves the ID of the current item in the WordPress Loop.
                        $heading = get_field('heading',get_the_ID());
                        $content = get_field('content',get_the_ID());
                        $image = get_the_post_thumbnail_url();
                ?>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="single-services-box sb1">
                            <?php
                            if($image):
                            ?>
                            <div class="icon">
                                <img src="<?php echo $image; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="content">
                                <h3><?php echo $heading; ?></h3>
                                <p><?php echo $content; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;  ?>
            </div>

        </div>
    <?php
        endif;
    ?>
</section>
<?php
    $args=array('post_type' => 'home_about','posts_per_page' => 1);
    $query= new WP_Query($args);
    if($query->have_posts()):
?>
        <section class="about-section section-padding">
            <div class="container">
                <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        $title = get_field('title',get_the_ID());
                        $short_title = get_field('short_title',get_the_ID());
                        $blockquote = get_field('blockquote',get_the_ID());
                        $content = get_field('content',get_the_ID());
                        $youtube = get_field('youtube',get_the_ID());
                ?>
                <div class="row align-items-center">
                    <div class="col-xl-6 col-12 pe-xl-0">
                        <div class="about-cover-bg bg-cover me-xl-5" >
                            <iframe title="Disasters Can Happen To Anyone" width="100%" height="608" src="<?php echo $youtube ?>"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-5 mt-lg-0 col-12">
                        <div class="block-contents">
                            <div class="section-title">
                                <span><?php echo $title; ?></span>
                                <h2><?php echo $short_title ?></h2>
                            </div>
                            <blockquote><?php echo $blockquote; ?></blockquote>
                        </div>
                        <?php echo $content; ?>
                    </div>
                </div>
                <?php
                    endwhile;
                 ?>
            </div>
        </section>
<?php endif; ?>

<?php query_posts( array(
    'posts_per_page' => 3,
)); ?>



<?php
    if(have_posts()):
?>
<section class="news-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <div class="block-contents">
                    <div class="section-title">
                        <h5>blog</h5>
                        <span>Our Blog Post</span>
                        <h2>Latest Blog</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-blog-card style-1">
                        <div class="blog-featured-img bg-cover bg-center" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
                        <div class="contents">
                            <div class="post-metabar d-flex justify-content-between align-items-center">
                                <div class="post-author">
                                    <?php if($avatar = get_avatar(get_the_author_id()) !== FALSE): ?>

                                        <div class="author-img bg-cover bg-center" style="background-image: url(<?php echo $avatar; ?>)">
                                            <i class="fas fa-user"></i>
                                        </div>

                                    <?php else: ?>
                                        <div class="author-img bg-cover bg-center" style="background-image: url(<?php echo get_template_directory_uri(); ?>'assets/img/blog/author2.jpg')">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    <?php endif; ?>

                                    <a href="#"><?php echo get_the_author(); ?></a>
                                </div>
                                <div class="post-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <a href="#"><?php echo get_the_date(); ?></a>
                                </div>
                            </div>
                            <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                            <p>
                                <?php the_excerpt() ?>
                            </p>
                            <a href="<?php the_permalink();?>" class="read-more-link">read more</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>

        </div>
    </div>
</section>
<?php
    endif;
?>
<?php
    $args = array(
        'post_type'=>'testimonial',
        'order'=>'ASC'
    );
    $testimonials = new Wp_Query($args);
    if($testimonials->have_posts()):
?>
<section class="testimonial-wrapper section-padding pt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 pe-xl-5 col-lg-6 mt-5 mt-lg-0 order-2 order-lg-1">
                <div class="testimonial-carousel-list owl-carousel me-xl-5">
                    <?php
                        while ( $testimonials->have_posts() ) : $testimonials->the_post();
                        $person_name = get_field('name',get_the_ID());
                        $comment = get_field('comment',get_the_ID());
                        $designation = get_field('designation',get_the_ID());
                    ?>
                        <div class="single-testimonial-carousel">
                            <div class="icon">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" height="100">
                            </div>
                            <p><?php echo $comment; ?></p>
                            <span><b><?php echo $person_name; ?></b> <?php echo $designation; ?></span>
                        </div>
                      <?php
                        endwhile;
                      ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 order-1 order-lg-2">
                <div class="testimonial-img-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<?php

    endif;
?>

<?php
    get_footer();
?>
