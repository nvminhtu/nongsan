<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package sparkling
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_sidebar(); ?>
<div class="main-content-inner col-sm-12 col-md-8">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php get_template_part( 'content', 'page' ); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( get_theme_mod( 'sparkling_page_comments' ) == 1 ) :
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php endwhile; // end of the loop. ?>
</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->	
<?php get_footer(); ?>
