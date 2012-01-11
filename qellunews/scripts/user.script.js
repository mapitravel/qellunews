var paramsChat = 'location=0,status=0,scrollbars=0,width=430,height=500';
var paramsSkype = 'location=0,status=0,scrollbars=0,width=450,height=350';

/* Function Popup Window */ 
(function($) {
		
	$.fn.popup = function(params, href) {
		href = (typeof href == 'undefined') ? $(this).attr('href') : href;
		function clickHandler(e) {
			if (e.ctrlKey || e.shiftKey || e.metaKey)
				return;
			var w = window.open(href, '_blank', params);
			if (w && !w.closed) {
				w.focus();
				e.preventDefault();
			}
		}
		this
			.bind('click', clickHandler);
		return this;
	}
})(jQuery); 


// Popup Settings
(function($) {

	var sharebarHandler = function() {
	
		var ventana = $(window).width();
		// co es el tamanio de el espacio a cada lado del centro y se le resta 83 por el tamanio del sharebar
		// 83 es el tamanio de Share bar y 960 es el tamanio de #main
		var co = parseInt((ventana-960)/2) - 83;
		// Posicionamos el Sharebar
		$('#sharebar').css('left', co);
	}

	$(document).ready(function() { 
	
		//Tour prices tables
		$.ajax({
			url: "/sites/all/themes/qelluchaska/get.php",
			type:"GET",
			success:  function(cambio){
				$(".fprice").each(function(){
					$(this).css("font-size","11px");
					price=0;
					price=parseInt($(this).text());
					//opera y reemplaza precios
					$(this).text("USD "+price).next("td").text("S/."+parseInt(price*cambio)).css("font-size","11px"); 
				});
			}
		})	
			
		// Popup
		$('.live-chat').popup(paramsChat);
		$('.live-skype').popup(paramsSkype);
	
		
		// Hide Blocks
		$('#welcome .hide').click(function() {
			$('#welcome').hide('slow');
			return false;
		}) ;
		
		$('#sharebar-links .hide').click(function() {
			$('#sharebar-links').hide('slow');
			$('#sharebar-show').show('slow');
			return false;
		}) ;
		
		$('#sharebar-show .hide').click(function() {
			$('#sharebar-show').hide('slow');
			$('#sharebar-links').show('slow');
			return false;
		}) ;

		sharebarHandler();

	});

	$(window).resize(function() {
          sharebarHandler();
        });



})(jQuery); 
