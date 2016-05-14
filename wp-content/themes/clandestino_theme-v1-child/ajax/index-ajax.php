	<?php 

		define('WP_USE_THEMES', false);
		require_once('../../../../wp-load.php');

	 	$object_id = htmlspecialchars($_GET['category']);
	 	$page = htmlspecialchars($_GET['page']);
	 	// echo $page . '</br>';
	 	// echo $object_id . '</br>';

	 	$posts_per_page = 4;

	 	$offset = $page * $posts_per_page;
	 	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 
			'posts_per_page' => $posts_per_page,
			'offset'     => $offset,
			'paged'      => $paged,
			'cat'		 => $object_id
		);
		 // echo $object_id;
	?>
	<?php

		$cat_posts = get_posts( $args );
		
	?>

	<script type="text/javascript">
		$(function() {
			$('body').addClass('dynamic_cntt');
		});
	</script>

		
	<?php if ($cat_posts): ?>

			<?php foreach ( $cat_posts as $post ) : setup_postdata( $post ); ?>	
				<div class="col1-4">
					<?php get_template_part('loop', 'projetos'); ?>
				</div>
			<?php endforeach; ?> 	

	<?php else: ?>
				<!-- <article class="noresult">
					<h2 class="title"><strong><?php //_e( 'Sorry, nothing to display.', 'html5blank' ); ?> @ :(</strong></h2>
				</article> -->
				<span class="clear"></span>
				<script type="text/javascript">
					$(function() {
						$('.load_ajax_wpr').hide();
					});
				</script>
	<?php endif; ?>
	<span class="clear"></span>

				<!-- <div class="buttons">
					<a href="<?php //echo get_category_link( $catid ); ?> " class="btn_more">veja mais</a>	
				</div> -->

	<?php wp_reset_postdata(); ?>
