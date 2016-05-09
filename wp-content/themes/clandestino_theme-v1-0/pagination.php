<?php $pagination_args = array(
	'prev_text'          => __('Anterior'),
	'next_text'          => __('Próxima')
); ?>

		<div class="pagination cntt">
				<?php echo paginate_links( $pagination_args ); ?>
		</div>

		<span class="clear"></span>
