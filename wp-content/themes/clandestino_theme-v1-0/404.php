<?php get_header(); ?>
<?php 
	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
?>

<section class="block_wpr block_error">
	<div class="block_cntt">

		<h2 class="cat_title">Erro 404!</h2>
		<div class="cntt">
			<p>Página não encontrada. <br/>Este link parece estar com algum erro ou desatualizado.</p>
			<p><a href="<?php echo home_url(); ?>">Retornar para página inicial</a></p>
			<p><a href="mailto:<?php echo get_option('admin_email'); ?>?subject=clandestinos_pag-<?php echo $current_url; ?>&body=erro">Informar aos administradores sobre este erro.</a></p>
		</div>
	</div>
</section>


<?php get_footer(); ?>
