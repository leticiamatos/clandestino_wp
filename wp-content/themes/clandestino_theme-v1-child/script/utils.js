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

