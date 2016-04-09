<?php if (is_category('blog') || is_page('blog')): ?>

<span class="breadcrumb_type">blog</span>
<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt"> 
		<nav class="menu category">
			<?php //if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			<span class="current">Blog</span>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->

<?php elseif (in_category('blog')) : ?>

<span class="breadcrumb_type">single blog</span>
<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt"> 
		<nav class="menu category">
			<span><a href="<?php get_category_link(9); ?>" class="subcategory link">Blog</a></span>
			<span class="breadcrumbs separator">&nbsp;</span> 
			<div class="tags">
				 <?php the_tags( '', '<span class="breadcrumbs and">e</span>', '' ); ?> 
			</div>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->

<?php elseif ( is_tag() ): ?>

<span class="breadcrumb_type">tag</span>
<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt"> 
		<nav class="menu category">
			<span><a href="<?php get_category_link(9); ?>" class="subcategory link">Blog</a></span>
			<span class="breadcrumbs separator">&nbsp;</span> <span class="current"><? echo single_tag_title('', false); ?></span>
			<span class="clear"></span>
		</nav>
	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->

<?php else: ?>

<span class="breadcrumb_type">else</span>
<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt"> 
		<nav class="menu category">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->
	
<?php endif; ?>