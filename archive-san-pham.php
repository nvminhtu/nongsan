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
					<h3><?php _e( 'Sản phẩm', 'name_products' ); ?></h3>
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
							if ( $query->have_posts() ) : $order = 0; ?>
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
									<?php if($order%3==0) { ?><div class="row"><?php } ?>
									<?php get_template_part( 'content', 'san-pham' );  ?>
									<?php if(($order+1)%3==0 || $order==($num_posts-1)) { ?></div><?php } $order++; ?>
								<?php endwhile; ?><?php wp_reset_postdata(); ?>
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