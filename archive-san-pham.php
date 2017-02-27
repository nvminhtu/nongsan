<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>

	<div id="primary" class="content-area grid-area">
		<main id="main" class="site-main" role="main">
			<article <?php post_class(); ?>>
				<div class="blog-item-wrap">
					<div class="post-inner-content">
						<?php
							global $wp_rewrite;
							global $paged;
							if ( get_query_var('paged') ) $paged = get_query_var('paged');  
							if ( get_query_var('page') ) $paged = get_query_var('page');
							$posts_per_page = get_option("posts_per_page"); 
							$query = new WP_Query( 
								array( 'post_type' => 'san-pham',
        							 'posts_per_page'=> $posts_per_page,
											 'paged' => $paged 
										) );
							$num_posts = $query->post_count;
							$i = 0;
							if ( $query->have_posts() ) : ?>
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
								<!-- the loop -->
								<?php if( $i % 3 == 0 || $i== 0) {  echo '<div class="row">'; } ?>
								<?php   
									$img_news = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_sanpham_list');
								    $img_news_src = $img_news[0];
								?>
								<div class="product col-sm-4 col-md-4">
									<a href="<?php echo get_bloginfo('siteurl'); ?>">
										<?php if(has_post_thumbnail()) { ?>
											<img src="<?php echo $img_news_src;  ?>">
										<?php } else { ?>
											<img src="http://nongsannhietdoi.com/wp-content/uploads/2017/02/img-xoai.png">
										<?php } ?>
										<h4><?php echo get_the_title(); ?></h4>
									</a>
								</div>
								<?php if( ($i+1)%3 == 0 && $i!=0) {  echo '</div>'; } ?>
								<?php $i++; endwhile; ?>
								
								<?php wp_reset_postdata(); ?>
								<!-- show pagination here -->
								<div class="row navigation"><?php wp_pagenavi(); ?></div>
							<?php else : ?>
								<!-- show 404 error here -->
							<?php endif; ?>
					</div>
				</div>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>