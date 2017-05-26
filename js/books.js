function reloadAdventureTable(r) {
	document.getElementById("adventure").innerHTML = r;
	$(".adventureClick").click(bookClick);
}
function reloadCookingTable(r) {
	document.getElementById("cooking").innerHTML = r;
	$(".cookingClick").click(bookClick);
}
function reloadComicTable(r) {
	document.getElementById("comic").innerHTML = r;
	$(".comicClick").click(bookClick);
}
function reloadRomanceTable(r) {
	document.getElementById("romance").innerHTML = r;
	$(".romanceClick").click(bookClick);
}

function bookClick(){
	var orderingForm = $(this).attr('value');
	$.post("php/orderBook.php",{BookID:orderingForm}, function(r){
		if(r.success==true){
			alert("book was ordered");
			$.post("php/getAdventureBooks.php", reloadAdventureTable);
			$.post("php/getComicBooks.php", reloadComicTable);
			$.post("php/getCookingBooks.php", reloadCookingTable);
			$.post("php/getRomanceBooks.php", reloadRomanceTable);
		}else{
			alert("book is out of stock");
		}
	});
}

$(document).ready (function() {
	$.post("php/getAdventureBooks.php", reloadAdventureTable);
	$.post("php/getComicBooks.php", reloadComicTable);
	$.post("php/getCookingBooks.php", reloadCookingTable);
	$.post("php/getRomanceBooks.php", reloadRomanceTable);
	$(".orders").click(function(e){
		$.post("php/detectSession.php", function (r) {
			if (r=="true") {
				window.location.href='orders.html';
			}else{
				window.location.href='login.html';
			}
		})
	});
});