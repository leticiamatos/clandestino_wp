<?php get_header(); ?>

<section class="block_wpr block_categoria">
	<div class="block_cntt">

		<?php get_template_part('breadcrumbs'); ?>
		<div class="cntt">

			<main role="main">
				<div class="post_list">
					<?php 
						if (have_posts($cat_posts)): 
							while (have_posts($cat_posts)) : the_post(); 
					?>
						<div class="col1-4">
							<?php get_template_part('loop', 'projetos'); ?>
						</div>
					<?php 	endwhile; ?>
					<span class="clear"></span>

					<section class="block_wpr pagination">
						<div class="block_cntt">
							<?php get_template_part('pagination'); ?>
						</div><!-- .block_cntt -->
					</section><!-- .pagination -->

					<?php else: ?>
						<div class="error">
							Nenhum post para mostrar... :(
						</div>
					<?php endif; ?>
				</div>
			</main>
		</div>
	</div>
</section>


<?php get_footer(); ?>
