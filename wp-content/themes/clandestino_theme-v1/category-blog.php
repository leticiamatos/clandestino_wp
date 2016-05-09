<?php get_header(); ?>

<div class="gap"></div>
<div class="panel logo">
	<div class="block_cntt">
		<img src="<?php echo get_template_directory_uri(); ?>/img/panel-title-blog.png" />
	</div>
</div>


<section class="block_wpr block_blog">
	<div class="block_cntt">
		<?php get_template_part('breadcrumbs'); ?>
		<div class="col2-3">
			<div class="cntt post_list_blog">


				<?php 
					if (have_posts($cat_posts)): 
						while (have_posts($cat_posts)) : the_post(); 
				?>
					<div class="col1-2">
						<?php get_template_part('loop', 'blog'); ?>
					</div>
				<?php 	endwhile; ?>
				<span class="clear"></span>

				<?php get_template_part('pagination'); ?>

				<?php else: ?>
					<div class="block_error">
						<p>Nenhum post para o blog. :(</p>
						<p><a href="<?php echo home_url(); ?>">Retornar para página inicial</a></p>
					</div>
				<?php endif; ?>

 
 			</div>
		</div>
		<div class="col1-3">
			<?php get_sidebar(); ?>
		</div>
		<span class="clear"></span>
	</div>
</section>



<?php get_footer(); ?>
