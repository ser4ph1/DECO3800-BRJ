
$(document).ready (function() {



		$( ".hamburger" ).hide();
		$( ".hamburger" ).click(function() {
			$( ".menu" ).slideToggle( "slow", function() {
				$( ".hamburger" ).hide();
				$( ".cross" ).show();
		});
		});

		$( ".cross" ).click(function() {
			$( ".menu" ).slideToggle( "slow", function() {
				$( ".cross" ).hide();
				$( ".hamburger" ).show();
			});
		});
		
	$(window).resize(function(){
		if ($('#content').width() == 320 ) {
			$( ".menu" ).hide();
		}
	
	});
	
	
});	

$( ".menu" ).show( "slow" )