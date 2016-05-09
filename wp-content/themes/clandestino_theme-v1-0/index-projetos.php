<span data-scroll-index="3" class="target" id="projetos"> </span>
<section class="block_wpr block_projetos">
	<div class="block_cntt">
		<h2 class="block_title">Projetos</h2>
		<div class="cntt">

		<?php 
			// Get all Categories inside Cat Projetos
			$catid = get_cat_ID('projetos'); 

		    $args = array(
			    'hide_empty'		 => 0,
				'title_li'           => '',
				'child_of'           => $catid,
				'taxonomy'           => 'category'
		    );

			$cats = get_categories( $args); 
		?> 

			<div id="tabs">

				<!-- Categories list -->
				<ul class="subcategory list">
					<li class="item"><a class="link" href="#tabs-00">Projetos</a></li>
					<?php 
						foreach ($cats as $cat):
							echo '<li class="item"><a href="#tabs-'.$cat->cat_ID.'">'.$cat->cat_name.'</a></li>';
						endforeach;
					?>
				</ul><!-- .subcategory list -->

				<!-- All Posts tab -->
				<div id="tabs-00" class="category wpr all">
					<div class="post_list">
						<?php 
							$args = array( 
								'posts_per_page' => 8,
								'cat'		 => $catid
							);
							$cat_posts = get_posts( $args );
						
							foreach ( $cat_posts as $post ) : setup_postdata( $post );
						?>
							<div class="col1-4">
								<?php get_template_part('loop', 'projetos'); ?>
							</div>
						<?php endforeach; ?>
						<span class="clear"></span>
						<div class="buttons">
							<a href="<?php echo get_category_link( $catid ); ?> " class="btn_more">veja mais</a>	
						</div>
					</div>
				</div><!-- #tabs-00 -->

				<?php 
					wp_reset_postdata();
					foreach ($cats as $cat):
						$catid = $cat->cat_ID;
						$catname = $cat->cat_name;
						$args = array( 
							'posts_per_page' => 6,
							'cat'		 => $catid
						);
				?>
				<!-- Each SubCategory Posts tab -->
				<div id="tabs-<?php echo $catid; ?>" class="category wpr <?php echo $catid; ?>">
					<div class="post_list">


						<?php
							$cat_posts = get_posts( $args );

							if ($cat_posts):
								wp_reset_postdata();
								foreach ( $cat_posts as $post ) : setup_postdata( $post );

						?>				
							<div class="col1-4">
								<?php get_template_part('loop', 'projetos'); ?>
							</div>
						<?php 	
								endforeach; 
							else:
						?>
						<article class="noresult">
							<h2 class="title"><strong><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?> @ :(</strong></h2>
						</article>

						<?php 
							endif;
						?>
						<span class="clear"></span>
						<div class="buttons">
							<a href="<?php echo get_category_link( $catid ); ?> " class="btn_more">veja mais</a>	
						</div>
					</div><!-- .post_list -->
				</div> <!-- .tabs-nn -->

				<?php
					endforeach;
					wp_reset_postdata();
				?>
			</div><!-- #tabs -->

		</div>
	</div>
</section><!-- .projetos -->