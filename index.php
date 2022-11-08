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
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="single-services-box sb1">
                    <div class="content">
                        <h3>Be Safe</h3>
                        <p>How to be safe at School, Work, or home. Click to learn more.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="single-services-box sb2">
                    <div class="content">
                        <h3>Plan Ahead</h3>
                        <p>Your family may not be together when disaster strikes. Click to learn more</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="single-services-box sb3">
                    <div class="content">
                        <h3>Be Ready</h3>
                        <p>Do you have a disaster kit? First Aid or Go bag? Click to learn more</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-12 pe-xl-0">
                <div class="about-cover-bg bg-cover me-xl-5" >
                    <iframe title="Disasters Can Happen To Anyone" width="100%" height="608" src="https://www.youtube.com/embed/u63OygiiF2o?feature=oembed"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-xl-6 mt-5 mt-lg-0 col-12">
                <div class="block-contents">
                    <div class="section-title">
                        <span>About Us</span>
                        <h2>We Always Think On Your Dream</h2>
                    </div>
                    <blockquote>This site was created by Cox to provide our employees, business partners, and families with an online resource for getting vital information during a crisis. </blockquote>
                </div>

                <p>This site was created by Cox to provide our employees, business partners, and families with an online resource for getting vital information during a crisis. Much of the current content on CoxAlert.com focuses on what to do in preparation for and during all hazards.</p>
                <p><strong> In Case of an Emergency, Use This Site to Stay Informed</strong></p>
                <p>In the event of a crisis or a disaster affecting a Cox company or location, visit CoxAlert.com to learn what steps you should take, both for work and personal interests. During an emergency, we will regularly update content so that you have the most current news and complete instructions on what actions you should take.</p>
                <p><strong>Before an Emergency, Use This Site to Get Prepared</strong></p>
                <p>At Cox, personal security is a shared responsibility, so be proactive. Take time to review the information within this site. We’ve included important information that can teach you how to minimize risks and protect yourself, your family, and your colleagues during an emergency. Remember, creating a plan is your first step to becoming prepared. This site can help.<strong></strong></p>
                <p>Cox Business Continuity Plan – Management Resource Links</p>
                <p>Access to business continuity websites is intended only for authorized team members. Please contact <a href="mailto:Enterprise.Security@coxinc.com">Enterprise.Security@coxinc.com</a> or <a href="mailto:CCIBusinessContinuity@cox.com">CCIBusinessContinuity@cox.com</a> with access requests or account questions<strong>. </strong>Thank you.</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
    <h2 class="section-rotate-title d-none d-xxl-block">ABOUT</h2>
</section>
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
