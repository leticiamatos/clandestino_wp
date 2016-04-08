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
				<?php echo do_shortcode('[contact-form-7 id="89" title="contato"]'); ?>
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


