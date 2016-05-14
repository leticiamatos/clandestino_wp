<?php 

/* WP Post Template: Post Projeto */

?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="cat_projetos">
	<section class="block_wpr block_menu_projetos">
		<div class="block_cntt">

			<ul class="next-prev-post">
				<li class="prev">
				<?php if (get_previous_post_link()){ ?>
					<?php previous_post_link('%link', '', TRUE); ?>  
				<?php } ?>
				</li>
				<li class="next">
				<?php if (get_next_post_link()){ ?>
					<?php next_post_link('%link', '', TRUE); ?>  
				<?php } ?>
				</li>
			</ul>

			<a class="btn close" href="<?php echo home_url(); ?>/#projetos"></a>

			<h3 class="project_title"><?php the_title(); ?></h3>
			<p class="client"><?php echo get_post_meta(get_the_ID(), 'cliente', true); ?></p>
			<!--figure class="thumb">
				<img src="<?php //echo catch_that_image(); ?>" />
			</figure-->

		</div>
	</section>

	<section class="block_wpr block_post">
		<div class="block_cntt">

			<main role="main" class="post_details">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="galeria">
						<?php createGallery(get_the_id()); ?>
					</div>
					<div class="col1-2">
						<div class="post_excerpt"><?php the_excerpt(); ?></div>
					</div>

					<!--div class="text">
						<?php // the_content(); // Dynamic Content ?>
					</div-->
					<div class="col1-2">
						<?php 
							$video_link = get_post_meta(get_the_ID(), 'youtube', true);
							$image_link = get_post_meta(get_the_ID(), 'imagem', true);
							global $wp_embed;
							if ($video_link){
								$post_embed = $wp_embed->run_shortcode('[embed]'.$video_link.'[/embed]');
							}else if($image_link){
								$post_embed = '<img src="'. $image_link .'" />';
							}
						?>
						<div class="video">
							<?php echo $post_embed; ?>
						</div>

					</div>
					<span class="clear"></span>
				</article>
			</main>
		<!-- section -->
		</div>

	</section>
</div>

<?php endwhile; ?>

<?php else: ?>
<article>
	<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
</article>
<?php endif; ?>

<?php get_footer(); ?>
