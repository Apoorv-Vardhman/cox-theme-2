<?php
    get_header();
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
            <?php echo the_content(); ?>
        </div>
    </section>
</main>
<?php
    get_footer();
?>
