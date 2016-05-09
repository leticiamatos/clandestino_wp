<?php get_header(); ?>


<?php
	$search_query = get_search_query();

	// Results Count
	$catid = 9;

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	global $wp_query;

	query_posts(array_merge(
		array(
			'post_type' => 'post',
			'cat'		 => $catid,
	  		'paged'          => $paged
  		),
		$wp_query->query
	));
?>

<div class="gap"></div>
<div class="panel logo">
	<img src="<?php echo get_template_directory_uri(); ?>/img/panel-title-blog.png" />
</div>


<section class="block_wpr block_blog">
	<div class="block_cntt">

		<span class="breadcrumb_type">search</span>
		<section class="block_wpr block_breadcrumbs">
			<div class="block_cntt"> 
				<nav class="menu category">
					<span class="current">Pesquisando... </span>
					<span class="breadcrumbs separator">&nbsp;</span> <span class="current"><?php echo $search_query; ?></span>
					<span class="clear"></span>
				</nav>
			</div><!-- .block_cntt -->
		</section><!-- .block_breadcrumbs -->


		<div class="col2-3">
			<div class="cntt post_list_blog">


				<?php 
					if (have_posts()): 
						while (have_posts()) : the_post(); 
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
				<?php wp_reset_datapost(); ?>

 
 			</div>
		</div>
		<div class="col1-3">
			<?php get_sidebar(); ?>
		</div>
		<span class="clear"></span>
	</div>
</section>



<?php get_footer(); ?>
