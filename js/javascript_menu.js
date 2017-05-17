
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

$(".orders").click(function(e){
	$.post("php/detectSession.php", function (r) {
		alert(r);
		if (r=="true") {
			window.location.href='orders.html';
		}else{
			window.location.href='login.html';
		}
	})
});
	
			$.post("php/detectSession.php", function (r) {
				//alert(r);
				if (r=="true") {
					$.post("php/username.php", function(r){
						$("#someText").text("User: "+r);
					})
					$("#someText").show();
					$("#logout").show();
					$("#login").hide();
					$("#createUser").hide();
					//alert("Show Yourslef!");

				} else {
					//alert("I have failed!");
					$("#someText").hide();
					$("#logout").hide();
					$("#login").show();
					$("#createUser").show();
				}
								
			});	
	
		$("#logout").click(function(e){
			$.post("php/logout.php", function (r) {
				alert("You have been logged out");
				window.location = "index.html";
			})
		});	
		
		$("#login-form").submit(function(e){
        // Stop the form from submitting so we can do it via AJAX
        e.preventDefault();
		
        $.post('php/login.php', $('#login-form').serialize(), function (r) {
            if (r.authority == true) {
                alert("Logged In");
                window.location = "index.html";
            } else {
				$("#incorrectText").show();
                //alert("Failed Log In");
				//window.location = "index.html";
            }
        })
    });
	
	$("#create-form").submit(function(e){
        // Stop the form from submitting so we can do it via AJAX
        e.preventDefault();

        $.post('php/register.php', $('#create-form').serialize(), function (r) {
			//alert(r.success);
            if (r.success == true) {
                alert("User Created");
                window.location = "index.html";
            } else {
                alert("User Creation Failed");
				//window.location = "index.html";
            }
        })
    });
	
	

});	

	
