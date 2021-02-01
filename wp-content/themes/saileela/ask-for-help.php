<?php
/**
 * Template Name: Ask for help
 */

get_header();


?>
 <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/forum.css">
<style>
    .screen-reader-response {
        display: none;
    }

    .wpcf7-not-valid-tip {
        color: #bb2424;
    }

    .alertcontact {
        border: 2px solid #ff0000;
        /* color: transparent; */
        background: transparent;
        color: wheat;
    }

    .wpcf7-response-output {
        color: wheat;
    }
	.must-log-in a {
	color: #f7941d !important;
}
	.blurry-text {
   text-shadow: 0 0 32px white;
   color: transparent;
}

</style>
<main>
    <div class="parallax">
        <div class="container">
            <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                <h2 class="heading"><?php the_title(); ?></h2>
            </div>
        </div>

    </div>
    <section id="blog-post" class="testimonials_v2">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php 
                        if ( comments_open() || get_comments_number() ) {
                comments_template();
            } ?>
                </div>
            </div>
            <div class="row">
                <div class="about_our_company" style="margin-bottom: 50px;">
                    <h1 style="color:#f7941d;"> Ask for Help by Volunteers</h1>
                    <div class="titleline-icon"></div>

                </div>



                <!-- .Testimonial-content -->
                <div class="col-lg-12 col-md-12 testimonials_v2_content" id="testimonials">
                <?php foreach (get_comments(array('status' => 'approve','order' => 'DESC', 'post_id' => 15)) as $comment): ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 wow bounceInLeft hvr-float-shadow single-testimoinal-wrap">
                        <div class="single-testimonial ">
                            <div class="profile-info pull-left">
                                <img src="http://sai-leela.org/wp-content/uploads/2020/03/place.jpg" alt="">
                                <h2 class="blurry-text"><?php echo $comment->comment_author; ?></h2>
                            </div>
                            <div class="content pull-left">
                                <p><i class="fa fa-quote-left"></i><?php echo $comment->comment_content; ?></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php endforeach; ?>
                </div> <!-- /.Testimonials-V1 -->
                <!-- Theme Pagination -->
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>