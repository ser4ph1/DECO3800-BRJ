$(function() {
	$("#searchDisplay").dialog({
	autoOpen: false,
	buttons: {
		OK: function() {$(this).dialog("close");}
	},
	title: "Search Results",
	minWidth:600,
	});
});
$(document).ready (function() {
	$("#searchForm").submit(function(event){
		// Stop the form from submitting so we can do it via AJAX
		event.preventDefault();
		$.post('php/search.php', $('#searchForm').serialize(), function (r) {
			var divDisplay = document.getElementById('searchDisplay');
			divDisplay.innerHTML = r;
			$("#searchDisplay").dialog("open");
		})
	});
});