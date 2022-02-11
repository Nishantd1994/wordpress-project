<?php
/* 
Template Name:Home
*/

get_header();

$feature=get_field('feature');
$about_us=get_field('about_us');
$choose_us=get_field('choose_us');
$free_quote=get_field('free_quote');
?>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
           
           <?php
           $slider_arr=['post_type'=>'homepage_slider','order'=>'asc'];
           $slider_post=get_posts($slider_arr);
           foreach($slider_post as $slider)
           {
            $heading=get_post_meta($slider->ID,'heading',true);
            $sub_heading=get_post_meta($slider->ID,'sub_heading',true);
            $description=get_post_meta($slider->ID,'description',true);
            $image_url=wp_get_attachment_url(get_post_thumbnail_id($slider->ID));

           ?>

            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="<?=$image_url?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?=$heading?></h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4"><?=$sub_heading?></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2"><?=$description?></p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }?>
            
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
            <?=$feature?>
            </div>
        </div>
    </div>
    <!-- Feature Start -->



    <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?=$about_us['image']['url']?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?=$about_us['heading']?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?=$about_us['description']?></p>
                        <div class="row g-4 mb-4 pb-2">
                           <?=$about_us['counter']?>
                        </div>
                        <a href="<?=get_site_url().'/about-us'?>" class="btn btn-primary py-3 px-5">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row g-4">
                <?php
                $serv_arr=['post_type'=>'our_service','order'=>'desc'];
                $service_post=get_posts($serv_arr);
                foreach($service_post as $post)
                {
                    $short_description=get_post_meta($post->ID,'short_description',true);
                ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <?=get_the_post_thumbnail()?>
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3"><?=get_the_title($post->ID)?></h4>
                            <p><?=$short_description?></p>
                            <a class="fw-medium" href="<?=get_permalink()?>">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?=$choose_us['heading']?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?=$choose_us['description']?></p>
                        <div class="row g-4">
                        <?=$choose_us['counter']?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?=$choose_us['image']['url']?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Projects</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <?php
                        $cat=get_terms(['taxonomy'=>'project_category','hide_empty'=>false]);
                        foreach($cat as $cat_rec)
                        {
                        ?>
                        <li class="mx-2" data-filter=".cat_<?=$cat_rec->term_id?>"><?=$cat_rec->name?></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                <?php
                $proj_arr=['post_type'=>'our_project','order'=>'desc'];
                $proj_post=get_posts($proj_arr);

                foreach($proj_post as $post)
                {
                    $image_url=wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $cat_arr=get_the_terms($post->ID,'project_category');
                    $cat_rec=array_shift($cat_arr);

                ?>
                <div class="col-lg-4 col-md-6 portfolio-item cat_<?=$cat_rec->term_id?> wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?=$image_url?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="<?=bloginfo('template_url')?>/img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="<?=get_permalink()?>"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?=$cat_rec->name?></p>
                            <h5 class="lh-base mb-0"><?=get_the_title($post->ID)?></a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?=$free_quote['image']['url']?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?=$free_quote['heading']?></h1>
                        </div>
                        <p class="mb-4 pb-2"><?=$free_quote['description']?></p>
                       <?php echo apply_shortcodes( '[contact-form-7 id="68" title="Free Quote"]' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Team Members</h1>
            </div>
            <div class="row g-4">
                <?php
                $team_arr=['post_type'=>'our_team','order'=>'desc'];
                $team_post=get_posts($team_arr);
                foreach($team_post as $post)
                { 
                    $designation=get_post_meta($post->ID,'designation',true);
                    $fb_link=get_post_meta($post->ID,'fb_link',true);
                    $twitter__link=get_post_meta($post->ID,'twitter_link',true);
                    $insta_link=get_post_meta($post->ID,'insta_link',true);
                    $image_url=wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                <div class="overflow-hidden position-relative">
                <img class="img-fluid" src="<?=$image_url?>" alt="">
                <div class="team-social">
                <a class="btn btn-square" href="<?=$fb_link?>"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square" href="<?=$twitter_link?>"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square" href="<?=$fb_link?>"><i class="fab fa-instagram"></i></a>
                </div>
                </div>
                <div class="text-center border border-5 border-light border-top-0 p-4">
                <h5 class="mb-0"><?=get_the_title($post->ID)?></h5>
                <small><?=$designation?></small>
                </div>
                </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <?php
                $test_arr=['post_type'=>'testimonials','order'=>'desc'];
                $test_posts=get_posts($test_arr);
                foreach($test_posts as $post)
                {
                    $profession=get_post_meta($post->ID,'profession',true);

                ?>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="<?=bloginfo('template_url')?>/img/testimonial-1.jpg" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p><?=get_the_content($post->ID)?></p>
                        <h5 class="mb-1"><?=get_the_title($post->ID)?></h5>
                        <span class="fst-italic"><?=$profession?></span>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


<?php get_footer();?>