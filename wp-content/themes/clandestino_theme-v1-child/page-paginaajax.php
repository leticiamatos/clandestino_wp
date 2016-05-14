<?php 
/** 
 * Template Name: Página Ajax
 */
 
?>
<?php get_header(); ?>


      <div class="ajax_cntt"></div>
      <span class="loader" style="display: none;">TÁ CARREGANDO, MANOLO!</span>
      
      <input class="btn_more load_ajax" type="button" value="AJAX!" data-url="http://localhost/clandestino_wp/wp-content/themes/clandestino_theme-v1-child/ajax/index-ajax.php" data-page="1" data-category="5" />

<?php get_footer(); ?>