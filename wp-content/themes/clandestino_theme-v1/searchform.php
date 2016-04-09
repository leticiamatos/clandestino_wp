<div class="search_wpr">
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label>Busca</label>
		<input type="text" class="txt" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<input type="submit" class="btn search" id="searchsubmit" value="Buscar" />
	</form>
</div>
