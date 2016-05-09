<!-- sidebar -->
<aside class="sidebar" role="complementary">
	<div class="search_form wpr">
		<?php get_template_part('searchform'); ?>
	</div>

	<div class="sidebar_line posts_recentes">
		<h3 class="sidebar_title">Posts Recentes</h3>	
		<div class="sidebar_cntt">
			<?php the_widget( 'rpjc_widget_cat_recent_posts', $defaults) ?>
		</div>

	</div>

	<div class="sidebar_line arquivo">
		<div class="sidebar_cntt">
			<?php the_widget(  'WP_Widget_Archives', 0, 0 ); ?> 
		</div>

	</div>

	<div class="sidebar_line categorias">
		<div class="sidebar_cntt">
			<?php the_widget( 'WP_Widget_Tag_Cloud', $instance, $args ); ?> 
		</div>

	</div>

<!-- 
	<div class="sidebar-widget">
		<?php //if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>
 -->

</aside>
<!-- /sidebar -->
