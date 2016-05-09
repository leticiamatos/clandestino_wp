<?php
	$pg_contato = 59;
	$pg_email = 60;
	$pg_phone = 62;
	$link_facebook = 63;
	$link_instagram = 64;
	$link_vimeo = 65;
?>
<span data-scroll-index="6" class="target" id="contato"> </span>
<section class="block_wpr block_contato">
	<div class="block_cntt">
		<h2 class="block_title">Contato</h2>
		<div class="cntt">
			<div class="col1-2">
				<?php //echo do_shortcode('[contact-form-7 id="269" title="contato_2"]'); ?>
				<div lang="pt-BR" dir="ltr" id="wpcf7-f89-o1" class="wpcf7" role="form">
<div class="screen-reader-response"></div>
<form novalidate="novalidate" class="wpcf7-form" method="post" action="/wp/#wpcf7-f89-o1">
<div style="display: none;">
<input type="hidden" value="89" name="_wpcf7">
<input type="hidden" value="4.3.1" name="_wpcf7_version">
<input type="hidden" value="pt_BR" name="_wpcf7_locale">
<input type="hidden" value="wpcf7-f89-o1" name="_wpcf7_unit_tag">
<input type="hidden" value="3092ff6f79" name="_wpnonce">
</div>
<div class="form_div">
<span class="wpcf7-form-control-wrap nome"><input type="text" placeholder="Nome" aria-invalid="false" aria-required="true" id="nome" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required txt" size="40" value="" name="nome"></span>
</div>
<div class="form_div">
<span class="wpcf7-form-control-wrap email"><input type="email" placeholder="E-mail" aria-invalid="false" aria-required="true" id="email" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email txt" size="40" value="" name="email"></span>
</div>
<div class="form_div">
<span class="wpcf7-form-control-wrap mensagem"><textarea placeholder="Mensagem" aria-invalid="false" aria-required="true" id="mensagem" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required txt" rows="10" cols="40" name="mensagem"></textarea></span>
</div>
<div class="buttons">
<input type="submit" id="enviar" class="wpcf7-form-control wpcf7-submit btn" value="enviar"><img class="ajax-loader" src="http://www.clandestino.art.br/wp/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando ..." style="visibility: hidden;">
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>


				<!-- <form>
					<div class="form_div">
						<input type="text" class="txt" placeholder="Nome" />
					</div>
					<div class="form_div">
						<input type="e-mail" class="txt" placeholder="E-mail" />
					</div>
					<div class="form_div">
						<textarea type="e-mail" class="txt" placeholder="Mensagem"></textarea>
					</div>
					<div class="buttons">
						<input type="submit" class="btn" value="enviar" />
					</div>

				</form> -->
			</div>
			<div class="col1-2">
				<div class="contact">
					<p class="adress"><?php postContent($pg_contato); ?></p>
					<p class="email"><?php postContent($pg_email); ?></p>
					<p class="phone"><?php postContent($pg_phone); ?></p>
					<nav class="social menu">
						<a class="facebook" href="<?php postContent($link_facebook); ?>" target="_blank">&nbsp;</a>
						<a class="instagram" href="<?php postContent($link_instagram); ?>" target="_blank">&nbsp;</a>
						<a class="vimeo" href="<?php postContent($link_vimeo); ?>" target="_blank">&nbsp;</a>
					</nav>

				</div>
			</div>
			<span class="clear"></span>
		</div>
	</div>
</section><!-- .contato -->


