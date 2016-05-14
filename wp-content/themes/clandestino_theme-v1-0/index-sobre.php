<?php
	$pg_sobre = 57;
?>
<span data-scroll-index="5" class="target" id="sobre"> </span>
<section class="block_wpr block_sobre_title">
	<div class="block_cntt">
		<h2 class="block_title">Sobre</h2>
	</div>
</section><!-- .sobre -->
<section class="block_wpr block_sobre">
	<div class="block_cntt">
		<div class="cntt">
			<div class="col1-2">
				<div class="text"><?php postContent($pg_sobre); ?></div>
				<div class="buttons">
					<a href="<?php echo get_post_meta($pg_sobre, 'link', true); ?>" class="btn" target="_blank"> Conheça o portfolio</br>do Alexandre</a> 

				</div>
			</div>
			<span class="clear"></span>

		</div>
	</div>
</section><!-- .sobre -->
