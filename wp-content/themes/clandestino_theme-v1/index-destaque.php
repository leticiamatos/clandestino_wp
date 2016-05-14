
<section class="block_wpr block_destaque">
	<div class="block_cntt">
		<h2 class="block_title">Destaque</h2>
		<div class="cntt">
<?php 
	$cat_obj = get_category_by_slug( 'home-destaque' );
	$cat_id = $cat_obj->term_id;

	$args = array( 
		'posts_per_page' => 1,
		'cat'		 => $cat_id
	);
?>

<?php
	$cat_posts = get_posts( $args );
	if ($cat_posts):
		foreach ( $cat_posts as $post ) : setup_postdata( $post );
	?>				

	<div class="highlight post">
		<figure class="thumb">
			<img src="<?php echo catch_that_image(); ?>" />
			<h3 class="image_title"><?php the_title(); ?></h3>
			<p class="client"><?php echo get_post_meta(get_the_ID(), 'cliente', true); ?></p>
			<button class="btn open"></button>
			<a href="<?php the_permalink(); ?>" class="btn permalink"></a>
		</figure>
		<div class="post_details">
			<div class="galeria">
				<?php createGallery(get_the_ID()); ?>
			</div>
			<div class="col1-2">
				<?php 
					$client = get_post_meta(get_the_ID(), 'cliente', true);
					$diretor = get_post_meta(get_the_ID(), 'diretor', true);
					$fotografia = get_post_meta(get_the_ID(), 'fotografia', true);
					$job = get_post_meta(get_the_ID(), 'job', true);
					
					$video_link = get_post_meta(get_the_ID(), 'youtube', true);
					$image_link = get_post_meta(get_the_ID(), 'imagem', true);

					global $wp_embed;
					if ($video_link){
						$post_embed = $wp_embed->run_shortcode('[embed]'.$video_link.'[/embed]');
					}else if($image_link){
						$post_embed = '<img src="'. $image_link .'" />';
					}
				?>
				<h3 class="post_title"><?php the_title(); ?></h3>
				<div class="post_excerpt">
				<?php the_excerpt(); ?>
					<ul class="info">
						<?php 
							if ($diretor){
								echo '<li><span class="meta">Diretor:</span> '. $diretor. '</li>';
							}
							if($fotografia){
								echo '<li><span class="meta">Fotografia:</span> '. $fotografia. '</li>';
							}
							if($job){
								echo '<li><span class="meta">Job:</span> '. $job. '</li>';
							}
						?>
					</ul>
				</div>
			</div>
			<div class="col1-2">
				<div class="video">
					<?php echo $post_embed; ?>
				</div>
				<button class="btn close"></button>
			</div>
			<span class="clear"></span>
		</div>
	</div>

	<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>
<?php else: ?>
	Nenhum post aqui!
<?php endif; ?>

		</div>
	</div>
</section><!-- .destaque -->