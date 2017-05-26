$(document).ready (function() {
	$( ".hamburger" ).hide();
	$( ".hamburger" ).click(function() {
		$( ".menu" ).slideToggle( "slow", function() {
			$( ".hamburger" ).hide();
			$( ".cross" ).hide();//was shown
		});
	});

	$( ".cross" ).click(function() {
		$( ".menu" ).slideToggle( "slow", function() {
			$( ".cross" ).hide();
			$( ".hamburger" ).hide();//was shown
		});
	});
	
	$(window).resize(function(){
		if ($('#content').width() == 320 ) {
			$( ".menu" ).hide();
		}
	
	});

	$(".orders").click(function(e){
		$.post("php/detectSession.php", function (r) {
			if (r=="true") {
				window.location.href='orders.html';
			}else{
				window.location.href='login.html';
			}
		})
	});

	$.post("php/detectSession.php", function (r) {
		if (r=="true") {
			$.post("php/username.php", function(r){
				$("#someText").text("User: "+r);
			})
			$("#someText").show();
			$("#logout").show();
			$("#login").hide();
			$("#createUser").hide();
		} else {
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
			}
		})
	});
	    $("#create-form").submit(function(e){
        // Stop the form from submitting so we can do it via AJAX
        e.preventDefault();

        $.post('php/register.php', $('#create-form').serialize(), function (r) {
			$("#nullFields").hide();
			$("#invalidPassword").hide();
			$("#duplicateUsernameOrEmail").hide();
            if (r.success == true) {
                alert("User Created");
                window.location = "index.html";
            } else {
				if(r.nullFields == true){
					$("#nullFields").show();
				}
				if(r.passwordConfirm == true){
					$("#invalidPassword").show();
				}
				if(r.duplicateIndentifier == true){
					$("#duplicateUsernameOrEmail").show();
				}
            }
        })
    });
});