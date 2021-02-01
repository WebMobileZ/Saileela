<?php get_header(); ?>

<div id="mycarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class=""></li>
                <li data-target="#mycarousel" data-slide-to="1" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="2" class=""></li>
               <!-- <li data-target="#mycarousel" data-slide-to="3" class=""></li> -->
                <li data-target="#mycarousel" data-slide-to="4" class=""></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item full-screen active" style="height: 576px; background-image: url(<?php echo get_field('slider_images')['slider_image_1']; ?>); background-color: lightblue;">
                    
                    <div class="carousel-caption">
                        <h3><a href="<?php echo site_url('ask-for-help'); ?>">Ask for Help</a></h3>
                    </div>
                </div>
                <div class="item full-screen " style="height: 576px; background-image: url(<?php echo get_field('slider_images')['slider_image_2']; ?>); background-color: firebrick;">
                    
                    <div class="carousel-caption">
                        <h3> <a href="<?php echo site_url('share-experience'); ?>">Share your Experience</a></h3>
                    </div>
                </div>
              <!--  <div class="item full-screen" style="height: 576px; background-image: url(http://sai-leela.org/Content/images/slide_1.jpg); background-color: violet;">
                    
                    <div class="carousel-caption">
                        <h3><a href="<?php echo site_url('login'); ?>">Become a Volunteers</a></h3>
                    </div>
                </div> -->
                <div class="item full-screen" style="height: 576px; background-image: url(<?php echo get_field('slider_images')['slider_image_3']; ?>); background-color: lightgreen;">
                    
                    <div class="carousel-caption">
                        <h3><a href="<?php echo site_url('about'); ?>">About</a></h3>
                    </div>
                </div>
                <div class="item full-screen" style="height: 576px; background-image: url(<?php echo get_field('slider_images')['slider_image_4']; ?>); background-color: tomato;">
                    
                    <div class="carousel-caption">
                        <h3><a href="<?php echo site_url('ask-for-help'); ?>">Ask for Help</a></h3>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="<?php echo home_url(); ?>#mycarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="<?php echo home_url(); ?>#mycarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js//device.min.js"></script>
    <script>
var $item = $('.carousel .item');
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 6000,
  pause: "false"
});
    </script>

</body></html>