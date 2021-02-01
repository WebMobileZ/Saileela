<?php
/**
 * My American League functions and definitions
 *
*/


function saileela_theme_support() {


	

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'saileela-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	

	load_theme_textdomain( 'saileela' );

	

}

add_action( 'after_setup_theme', 'saileela_theme_support' );


/**
 * Register and Enqueue Styles.
 */
function saileela_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'saileela-style', get_stylesheet_uri(), array(), $theme_version );

}

add_action( 'wp_enqueue_scripts', 'saileela_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function saileela_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//wp_enqueue_script( 'saileela-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
//	wp_script_add_data( 'saileela-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'saileela_register_scripts' );





/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function saileela_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'saileela' ),
		'expanded' => __( 'Desktop Expanded Menu', 'saileela' ),
		'mobile'   => __( 'Mobile Menu', 'saileela' ),
		'footer'   => __( 'Footer Menu', 'saileela' ),
		'social'   => __( 'Social Menu', 'saileela' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'saileela_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string $html
 */
function saileela_menus_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'saileela_menus_get_custom_logo' );




/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saileela_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

}

add_action( 'widgets_init', 'saileela_sidebar_registration' );


/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 *
 * @return string $html
 */
function saileela_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'saileela_read_more_tag' );

function login_failed() {
	$login_page  = home_url( '/login/' );
	wp_redirect( $login_page . '?login=failed' );
	exit;
  }
  add_action( 'wp_login_failed', 'login_failed' );
   
  function verify_username_password( $user, $username, $password ) {
	$login_page  = home_url( '/login/' );
	 
	  if( $username == "" || $password == "" ) {
		  wp_redirect( $login_page . "?login=empty" );
		  exit;
	  }
  }
  add_filter( 'authenticate', 'verify_username_password', 1, 3);



  // post

  /**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */
function themeblvd_disable_admin_bar() { 
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false'); 
    }
}
add_action( 'after_setup_theme', 'themeblvd_disable_admin_bar' );
 
/**
 * Redirect back to homepage and not allow access to 
 * WP admin for Subscribers.
 */
function themeblvd_redirect_admin(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;       
    }
}
add_action( 'admin_init', 'themeblvd_redirect_admin' );
function soi_login_redirect($redirect_to, $request, $user)
{
   return (is_array($user->roles) && ((in_array('editor', $user->roles))||(in_array('administrator', $user->roles)))) ? admin_url() : home_url('share-experience');
} 
add_filter('login_redirect', 'soi_login_redirect', 10, 3);
// Function to change email address
 
function wpb_sender_email( $original_email_address ) {
    return 'sai@sai-leela.org';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'Saileela';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );


function custom_redirects() {
 
    if ( is_page('login') ||  is_page('register') ) {
		  if(is_user_logged_in()){
        wp_redirect( home_url( '' ) );
          die;
		  }
      
    }
 
}
add_action( 'template_redirect', 'custom_redirects' );
