<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>
<div class="main-content-inner col-sm-12 col-md-12">
	<div id="primary" class="content-area grid-area">
		<main id="main" class="site-main" role="main">
			<article <?php post_class(); ?>>
				<div class="row">
					<h4 class="intro-text"><?php _e('Các loại hình kinh doanh'); ?></h4>
					<div class="col-sm-4 col-md-4">
						<img src="<?php bloginfo('template_url'); ?>/img/dv-hang-nong-san.png" alt="">
					</div>
					<div class="col-sm-4 col-md-4">
						<img src="<?php bloginfo('template_url'); ?>/img/dv-hang-lam-san.png" alt="">
					</div>
					<div class="col-sm-4 col-md-4">
						<img src="<?php bloginfo('template_url'); ?>/img/dv-mua-ban-online.png" alt="">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<h4>Tin tức</h4>
						<?php include('inc/news.php'); ?>
					</div>
					<div class="col-sm-12 col-md-6 hotline">
						
					</div>
				</div>
				<?php include('inc/products.php'); ?>
				
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- close main-content-inner -->
<?php get_footer(); ?>