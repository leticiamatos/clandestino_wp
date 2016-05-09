<?php if ($post):  ?>

	<!-- article -->
	<article id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

		<figure>
			<?php if ( has_post_thumbnail()) : ?>
				<?php the_post_thumbnail();  ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/no-thumb.png"/>
			<?php endif; ?>
		</figure>
		<div class="hover">
			<h2 class="post_title"><?php the_title(); ?></h2>
			<p class="client"><?php echo get_post_meta(get_the_ID(), 'cliente', true); ?></p>
		</div>
		<a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>

	</article>
	<!-- /article -->

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
