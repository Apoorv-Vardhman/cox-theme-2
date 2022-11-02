<?php
    get_header();
?>
<section class="hero-wrapper hero-2">
    <div class="hero-slider-2 owl-carousel owl-theme">
        <div class="single-slide bg-cover" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/banner/banner-1.jpeg')">
            <div class="container">
                <div class="row">
                    <div class="col-12 pe-lg-5 col-xxl-7 col-lg-9">
                        <div class="hero-contents pe-lg-3">
                            <h1 class="wow fadeInLeft animated" data-wow-duration="1.3s">Flood Safety</h1>
                            <p class="pe-lg-5 wow fadeInLeft animated" data-wow-duration="1.3s" data-wow-delay=".4s">Learn how to keep your family safe during a flood, and how to clean up a flooded home.</p>
                            <a href="https://www.redcross.org/get-help/how-to-prepare-for-emergencies/types-of-emergencies/flood.html" class="theme-btn me-sm-4 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".8s">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg-cover" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/banner/banner-3.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-12 pe-lg-5 col-xxl-7 col-lg-9">
                        <div class="hero-contents pe-lg-3">
                            <h1>Strategies for a Healthy Fall</h1>
                            <p class="pe-lg-5">As the days get shorter and cooler and the seasons change, use these.strategies to help prevent chronic diseases and maintain a healthy lifestyle. </p>
                            <a href="https://www.cdc.gov/chronicdisease/resources/infographic/healthy-fall.htm" class="theme-btn me-sm-4">contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <div class="about-cover-bg bg-cover me-xl-5" style="background-image: url('assets/img/home2/about-cover.jpg')">
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
                        <div class="blog-featured-img bg-cover bg-center" style="background-image: url(<?php the_post_thumbnail() ?>)"></div>
                        <div class="contents">
                            <div class="post-metabar d-flex justify-content-between align-items-center">
                                <div class="post-author">
                                    <?php if($avatar = get_avatar(get_the_author_id()) !== FALSE): ?>

                                        <div class="author-img bg-cover bg-center" style="background-image: url(<?php echo $avatar; ?>)"></div>

                                    <?php else: ?>
                                        <div class="author-img bg-cover bg-center" style="background-image: url(<?php echo get_template_directory_uri(); ?>'assets/img/blog/author2.jpg')"></div>
                                    <?php endif; ?>

                                    <a href="#"><?php echo get_the_author(); ?></a>
                                </div>
                                <div class="post-date">
                                    <i class="fal fa-calendar-alt"></i>
                                    <a href="#"><?php echo get_the_date(); ?></a>
                                </div>
                            </div>
                            <h3><a href="<?php the_permalink();?>"><?php the_content(); ?></a></h3>
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
    get_footer();
?>
