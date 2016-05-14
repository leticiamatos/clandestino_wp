<?php 

	define('WP_USE_THEMES', false);
	require_once('../../../../wp-load.php');

 	$object_id = htmlspecialchars($_GET['catid']);

	$args = array( 
		'posts_per_page' => 8,
		'cat'		 => $object_id
	);
	// echo $object_id. '<br/>';

	$cat_posts = get_posts( $args );
?>
	

<div id="tabs-<?php echo $object_id; ?>" class="category wpr <?php echo $object_id; ?>">
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


		<div class="ajax_cntt"></div>
		<span class="loader" style="display: none;">
			<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" />
		</span>

		<div class="buttons">
			<div class="load_ajax_wpr">
				<input class="btn_more load_ajax" type="button" value="mais" data-url="<?php echo get_stylesheet_directory_uri(); ?>/ajax/index-ajax.php" data-page="2" data-category="<?php echo $object_id; ?>" />
			</div>
		</div>


<script type="text/javascript">
	$(function() {
		$('.load_ajax').click(function(){ //Quando clicado no elemento input
	  		data_page = $(this).attr('data-page');
	  		data_url = $(this).attr('data-url');
	  		data_category = $(this).attr('data-category');

	  		data_value = data_url;
	  		if(data_category){ 
	  			data_value = data_url + '?category=' + data_category;
	  		}		  		
	  		if(data_category && data_page){ 
	  			data_value = data_url + '?category=' + data_category + "&page=" + data_page;
	  		}
	  		ajax_cnnt_class = 'page' + data_page;
	  		$('.ajax_cntt').append($("<div></div>").addClass(ajax_cnnt_class));

	      	$.ajax({
	          	url: data_value,
		        type: "get",
		        success: function(data) {
		        	ajax_cnnt_class_jquery = '.'+ajax_cnnt_class;
		            $(ajax_cnnt_class_jquery).html(data);
		        },
		        beforeSend: function(){
		            $('.loader').css({display:"block"});
		            $('.load_ajax').css({display:"none"});
		        },
		        complete: function(){
		            $('.loader').css({display:"none"});
		            $('.load_ajax').css({display:"inline-block"});
		        }
	    	});

	  		data_page++;
	    	$(this).attr('data-page', data_page);
	  	});
	});
</script>

	</div><!-- .post_list -->
</div> <!-- .tabs-nn -->
