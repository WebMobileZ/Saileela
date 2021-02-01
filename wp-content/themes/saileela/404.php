<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.

 */

get_header();
?>

<main id="site-content" role="main">

	<div class="section-inner thin error404-content">

		<h1 class="entry-title"><?php _e( 'Page Not Found', 'saileela' ); ?></h1>

		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'myamericanleague' ); ?></p></div>

		<?php
		get_search_form(
			array(
				'label' => __( '404 not found', 'saileela' ),
			)
		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->


<?php
get_footer();
