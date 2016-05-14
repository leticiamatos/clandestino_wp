<section class="block_wpr block_projetos">
	<div class="block_cntt">
		<h2 class="block_title">Projetos</h2>
		<div class="cntt">

		<?php 
			// Get all Categories inside Cat Projetos
			$catid = get_cat_ID('projetos'); 

			$cat_obj = get_category_by_slug( 'home-destaque' );
			$catid_exclude = $cat_obj->term_id;
			// echo "<h2>". get_stylesheet_directory_uri() . '</h2>';

		    $args = array(
			    'hide_empty'		 => 0,
				'title_li'           => '',
				'child_of'           => $catid,
				'taxonomy'           => 'category'
		    );

			$cats = get_categories( $args); 
		?> 

			<div id="tabs-ajax">

				<!-- Categories list -->
				<ul class="subcategory list">
					<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/ajax/projetos-tabs.php?catid=<?php echo $catid; ?>" class="link id_<?php echo $catid; ?>">Projetos</a></li>
					<?php 
						foreach ($cats as $cat):
							echo '<li><a href="'. get_stylesheet_directory_uri(). '/ajax/projetos-tabs.php?catid='. $cat->cat_ID . '" class="link '. $cat->cat_slug . '">' .$cat->cat_name . '</a></li>';
						
						endforeach;	
					?>
				</ul>

			</div><!-- #tabs-ajax -->

		</div>
	</div>
</section><!-- .projetos -->