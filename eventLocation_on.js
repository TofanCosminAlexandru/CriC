$(document).ready(function() {

	$("tbody tr").click(function(){
		$("tbody .selected").removeClass("selected");
		$(this).addClass('selected');
		var type = $(this).parent().parent().attr("class");
		console.log(type);
		var location;

		if(type == "cutremur"){
			var magnitude = $(this).children().eq(2).text();
			var adancime = $(this).children().eq(4).text();
			var continent = $(this).children().eq(5).text();
			var country = $(this).children().eq(6).text();
			location = $(this).children().eq(7).text();
			//console.log(location);
		} else if(type == "incendiu" || type == "inundatie"){
			var suprafata = $(this).children().eq(2).text();
			var continent = $(this).children().eq(3).text();
			var country = $(this).children().eq(4).text();
			location = $(this).children().eq(5).text();
			//console.log(location);
		} else if(type == "tshunami"){
			var arie = $(this).children().eq(2).text();
			var magnitude = $(this).children().eq(3).text();
			var suprafata = $(this).children().eq(4).text();
			location = $(this).children().eq(5).text();
			//console.log(location);
		} else if(type == "vulcan"){
			var name = $(this).children().eq(2).text();
			var vtype = $(this).children().eq(3).text();
			var index = $(this).children().eq(4).text();
			var continent = $(this).children().eq(5).text();
			var country = $(this).children().eq(6).text();
			location = $(this).children().eq(7).text();
			//console.log(location);
		} else if(type == "avalansa"){
			var continent = $(this).children().eq(2).text();
			var country = $(this).children().eq(3).text();
			location = $(this).children().eq(3).text();
			var munte = $(this).children().eq(6).text();
			//console.log(location);
		}
		var string = "<iframe src=\"../CriC/MAP/TableMap/index2.html?loc="+location+"\" width=\"100%\" height=\"455\"></iframe>";
		console.log(string);
		document.getElementById("test").innerHTML = string;
		$('#myModal3').modal('show'); 
	});
	
});


