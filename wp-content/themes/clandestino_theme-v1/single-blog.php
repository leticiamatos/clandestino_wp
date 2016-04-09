<?php 

/* WP Post Template: Post Blog */

?>

<?php get_header(); ?>

<!-- Facebook Comments Plugin -->
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=252945901438792";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


<div class="gap"></div>
<div class="panel logo">
	<img src="<?php echo get_template_directory_uri(); ?>/img/panel-title-blog.png" />
</div>


<section class="block_wpr block_blog">
	<div class="block_cntt">
		<?php get_template_part('breadcrumbs'); ?>
		<div class="col2-3">
			<div class="cntt post_blog">
				<main role="main">

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<h2 class="post_title">
								<?php the_title(); ?>
							</h2>
							<div class="text">
								<?php the_content(); // Dynamic Content ?>
							</div>

							<div class="post_footer">
								<span class="author">Por <?php the_author(); ?> |</span>
								<time datetime="<?php the_time('d/m/Y'); ?>"><?php the_time('d/m/Y'); ?>
								
								<div class="tags">
									<?php the_tags( 'Categorias: ', ',', ''); // 	Separated by commas with a line break at the end ?>
								</div>
							</div>

							<div class="comments">
								<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-mobile="true" data-width="100%" data-numposts="5"></div>

							</div>

						</article>

					<?php 	endwhile; ?>
					<span class="clear"></span>

					<?php get_template_part('pagination'); ?>

					<?php else: ?>
						<div class="block_error">
							<p>Nenhum post para o blog. :(</p>
							<p><a href="<?php echo home_url(); ?>">Retornar para página inicial</a></p>
						</div>
					<?php endif; ?>

 				</main>
 			</div>
		</div>
		<div class="col1-3">
			<?php get_sidebar(); ?>
		</div>
		<span class="clear"></span>
	</div>
</section>

<?php get_footer(); ?>
