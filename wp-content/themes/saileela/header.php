<!DOCTYPE html>

<html lang="en" class=" desktop landscape"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>SaiLeela</title>
     <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="saileela"/>
	
	
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
 <!--   <link rel="icon" href="http://sai-leela.org/images/favicon.ico" type="image/x-icon"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/grid.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/settings.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800|Roboto:900">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
   <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <?php wp_head(); ?>
	 
</head>

<?php  global $post;
    $post_slug = $post->post_name;
    ?>
<body data-gr-c-s-loaded="true">
    <div class="page">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">SAILEELA</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a  href="<?php echo home_url(''); ?>">Home</a>
                        </li>
                        <li>
                            <a class="<?php if( $post_slug=='about') echo 'active'; ?>" href="<?php echo home_url('about'); ?>">About</a>
                        </li>
                        <li>
                            <a class="<?php if( $post_slug=='share-experience') echo 'active'; ?>" href="<?php echo home_url('share-experience'); ?>">Share Experiences</a>
                        </li>

                        
                        <li>
                            <a class="<?php if( $post_slug=='ask-for-help') echo 'active'; ?>" href="<?php echo home_url('ask-for-help'); ?>">Ask for Help</a>
                        </li>
                        <?php
                         if (!is_user_logged_in()){ ?>
                            
                       <li><a  href='<?php echo site_url('login'); ?>' >Volunteer Register/Login</a></li>
                       <?php 
                        } else {
                            $user = wp_get_current_user();  ?>
                            <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="#"><?php echo 'Hi,'.$user->user_login; ?></a></li>
                          <?php  echo  '<li><a href="'. wp_logout_url() .'"> Log Out</a></li>'; ?>
                         
                            </ul>
                        </li>
                        <?php } ?>
                      
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>