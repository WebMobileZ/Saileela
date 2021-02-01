<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<main>
<div class="parallax">
                <div class="container">
                    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                        <h2 class="heading"><?php the_title(); ?></h2>
                    </div>
                </div>
            </div>
</main>
<?php
get_footer();
