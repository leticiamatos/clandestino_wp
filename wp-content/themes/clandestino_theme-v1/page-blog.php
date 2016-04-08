<?php 

/* Template Name: Blog */

?>

<?php get_header(); ?>

<div class="gap"></div>
<div class="panel logo">
	<img src="<?php echo get_template_directory_uri(); ?>/img/panel-title-blog.png" />
</div>


<section class="block_wpr block_blog">
	<div class="block_cntt">
		<?php get_template_part('breadcrumbs'); ?>
		<div class="col2-3">
			<div class="cntt">


		<?php 
			// Get all Posts inside Cat Blog
			$catid = get_cat_ID('blog');
			$args = array( 
				'posts_per_page' => 4,
				'cat'		 => $catid
			);
			$cat_posts = get_posts( $args );
		
			if( $cat_posts ):

				foreach ( $cat_posts as $post ) : setup_postdata( $post );
		?>

			<div class="col1-4">
				<?php get_template_part('loop', 'blog'); ?>
			</div>

		<?php
				endforeach;
			wp_reset_postdata(); 

			else:
		?>
			<section class="block_wpr block_error">
				<div class="block_cntt">

					<div class="cntt">
						<p>Nenhum post para o blog. :(</p>
						<p><a href="<?php echo home_url(); ?>">Retornar para página inicial</a></p>
					</div>
				</div>
			</section>
		<?php endif; ?>
 
 			</div>
		</div>
		<div class="col1-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>



<?php get_footer(); ?>
