<?php get_header(); ?>


      <span class="loader">TÁ CARREGANDO, MANOLO!</span>
      <input type="button" value="AJAX!">
      <div>&nbsp;</div>
      <script type="text/javascript">
      	$(function() {

		  $('input').click(function(){ //Quando clicado no elemento input
		      $.ajax({
		          url: 'ajax/index-ajax.html',
		          success: function(data) {
		            $('div').html(data);
		            //alert(data);
		            console.log(data);
		          },
		          beforeSend: function(){
		            $('.loader').css({display:"block"});
		          },
		          complete: function(){
		            $('.loader').css({display:"none"});
		          }
		    });
		  });

		})
      </script>
<?php get_footer(); ?>