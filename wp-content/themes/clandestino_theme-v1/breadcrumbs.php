<?php if (is_category('blog') || is_page('blog')): ?>

<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt"> 
		<nav class="menu category">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->

<?php elseif (is_page ()): ?>

<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt">

		<nav class="menu category">
			<h3>Você está em: <strong><?php the_title(); ?></strong></h3>
			<span class="separator bar">&nbsp;</span>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->

<?php elseif (is_search()): ?>

<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt">

		<nav class="menu category">
			<h3>Pesquisando... </h3>
			<span class="separator bar">&nbsp;</span>
			<span class="contact mail"><?php echo get_search_query(); ?></span>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->

<?php else: ?>


<section class="block_wpr block_breadcrumbs">
	<div class="block_cntt"> 
		<nav class="menu category">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			<span class="clear"></span>
		</nav>

	</div><!-- .block_cntt -->
</section><!-- .block_breadcrumbs -->
	
<?php endif; ?>