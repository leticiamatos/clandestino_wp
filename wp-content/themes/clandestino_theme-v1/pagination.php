<?php $pagination_args = array(
	'prev_text'          => __('Anterior'),
	'next_text'          => __('Próxima')
); ?>

<section class="block_wpr pagination">
	<div class="block_cntt">
		<div class="pagination cntt">
				<?php echo paginate_links( $pagination_args ); ?>
		</div>

		<span class="clear"></span>
	</div><!-- .block_cntt -->
</section><!-- .pagination -->