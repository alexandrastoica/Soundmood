$(document).ready(function() {

	$('#exit').hide();

    $('#cta-search').click(function(event) {

      event.stopPropagation();
    	$('#wrapper').animate({
            height: '0'
        }, 600);
    	$('.search-form').fadeIn(1000);
    	$('#exit').fadeIn(1100);

    });

    $('#exit').click(function(){

    	$('#wrapper').animate({
            height: '190px'
        }, 1000);
    	$('.search-form').fadeOut(600);
    	$('#exit').fadeOut(700);
   	
   });

   $('.search-submit').click(function(){
    	$('#exit').hide();
   });

    $('#search-overlay').hide();
    $('.search').click(function(){
      $('#search-overlay').slideDown(600);
      $('#exit-search').fadeIn(700);
    });

    $('#exit-search').click(function(){
      $('#exit-search').fadeOut(500);
      $('#search-overlay').slideUp(600);    
    });

});


