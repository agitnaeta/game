$(document).ready(function(){

	$('#index-banner').load('home/content_home');
	
	$('.collapsible').collapsible();
	$('audio').hide()

	$('.modal').modal();
// Lagu
	$('#yes-audio').hide()
	var x = document.getElementById("yes-audio"); 
	x.play();


	// Home /index
	$('.link').click(function load_link() {
		var link = $(this).attr('data-link')
		
		$('#index-banner').load(link)
	})

});

