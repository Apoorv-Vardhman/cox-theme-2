<?php
    get_header();
    the_post();
    $images = wp_get_attachment_image_src(get_post_thumbnail_id());
?>
<div class="page-banner-wrap bg-cover" >
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="page-heading text-white">
                    <h1><?php echo the_title() ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<main>
    <section class="blog-wrapper news-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-post-details border-wrap">
                        <div class="single-blog-post post-details">
                            <div class="post-content">
                                <h1><?php echo the_title(); ?></h1>
                                <img src="<?php echo $images[0] ?>" class="w-100">
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h3>Search</h3>
                            </div>
                            <div class="search_widget">
                                <?php
                                    get_search_form( );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
<?php
    get_footer();
?>
