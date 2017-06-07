$(document).ready(function() {

	$("tbody tr").click(function(){
		$("tbody .selected").removeClass("selected");
		$(this).addClass('selected');
		var id = $(this).children().eq(0).text();
		//var type = $(this).parent().parent("thead tr th:first").html();
		var type = $(this).parent().parent().attr("class");
		$('.hidden-id').val(id);
		$('.hidden-type').val(type);

		if(type == "Cutremur"){
			var magnitude = $(this).children().eq(2).text();
			var adancime = $(this).children().eq(4).text();
			var continent = $(this).children().eq(5).text();
			var country = $(this).children().eq(6).text();
			var location = $(this).children().eq(7).text();
			$("#alert-body").append("<div class=\"event-magnitude\"><input type=\"hidden\" name=\"event-magnitude\" class=\"hidden-magnitude\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-adancime\"><input type=\"hidden\" name=\"event-adancime\" class=\"hidden-adancime\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-continent\"><input type=\"hidden\" name=\"event-continent\" class=\"hidden-continent\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-country\"><input type=\"hidden\" name=\"event-country\" class=\"hidden-country\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-location\"><input type=\"hidden\" name=\"event-location\" class=\"hidden-location\" value=\"\"></div>");
			$('.hidden-magnitude').val(magnitude);
			$('.hidden-adancime').val(adancime);
			$('.hidden-continent').val(continent);
			$('.hidden-country').val(country);
			$('.hidden-location').val(location);
		}

		if(type == "Incendiu" || type == "Inundatie"){
			var suprafata = $(this).children().eq(2).text();
			var continent = $(this).children().eq(3).text();
			var country = $(this).children().eq(4).text();
			var location = $(this).children().eq(5).text();
			$("#alert-body").append("<div class=\"event-suprafata\"><input type=\"hidden\" name=\"event-suprafata\" class=\"hidden-suprafata\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-continent\"><input type=\"hidden\" name=\"event-continent\" class=\"hidden-continent\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-country\"><input type=\"hidden\" name=\"event-country\" class=\"hidden-country\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-location\"><input type=\"hidden\" name=\"event-location\" class=\"hidden-location\" value=\"\"></div>");
			$('.hidden-suprafata').val(suprafata);
			$('.hidden-continent').val(continent);
			$('.hidden-country').val(country);
			$('.hidden-location').val(location);
		}

		if(type == "Tshunami"){
			var arie = $(this).children().eq(2).text();
			var magnitude = $(this).children().eq(3).text();
			var suprafata = $(this).children().eq(4).text();
			var location = $(this).children().eq(5).text();
			$("#alert-body").append("<div class=\"event-arie\"><input type=\"hidden\" name=\"event-arie\" class=\"hidden-arie\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-magnitude\"><input type=\"hidden\" name=\"event-magnitude\" class=\"hidden-magnitude\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-suprafata\"><input type=\"hidden\" name=\"event-suprafata\" class=\"hidden-suprafata\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-location\"><input type=\"hidden\" name=\"event-location\" class=\"hidden-location\" value=\"\"></div>");
			$('.hidden-arie').val(arie);
			$('.hidden-magnitude').val(magnitude);
			$('.hidden-suprafata').val(suprafata);
			$('.hidden-location').val(location);
		}
		if(type == "Vulcan"){
			var name = $(this).children().eq(2).text();
			var vtype = $(this).children().eq(3).text();
			var index = $(this).children().eq(4).text();
			var continent = $(this).children().eq(5).text();
			var country = $(this).children().eq(6).text();
			var location = $(this).children().eq(7).text();
			$("#alert-body").append("<div class=\"event-name\"><input type=\"hidden\" name=\"event-name\" class=\"hidden-name\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-vtype\"><input type=\"hidden\" name=\"event-vtype\" class=\"hidden-vtype\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-index\"><input type=\"hidden\" name=\"event-index\" class=\"hidden-index\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-continent\"><input type=\"hidden\" name=\"event-continent\" class=\"hidden-continent\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-country\"><input type=\"hidden\" name=\"event-country\" class=\"hidden-country\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-location\"><input type=\"hidden\" name=\"event-location\" class=\"hidden-location\" value=\"\"></div>");
			$('.hidden-name').val(name);
			$('.hidden-vtype').val(vtype);
			$('.hidden-index').val(index);
			$('.hidden-continent').val(continent);
			$('.hidden-country').val(country);
			$('.hidden-location').val(location);
		}
		if(type == "Avalansa"){
			var continent = $(this).children().eq(2).text();
			var country = $(this).children().eq(3).text();
			var location = $(this).children().eq(4).text();
			var munte = $(this).children().eq(5).text();
			$("#alert-body").append("<div class=\"event-continent\"><input type=\"hidden\" name=\"event-continent\" class=\"hidden-continent\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-country\"><input type=\"hidden\" name=\"event-country\" class=\"hidden-country\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-location\"><input type=\"hidden\" name=\"event-location\" class=\"hidden-location\" value=\"\"></div>");
			$("#alert-body").append("<div class=\"event-munte\"><input type=\"hidden\" name=\"event-munte\" class=\"hidden-munte\" value=\"\"></div>");
			$('.hidden-continent').val(continent);
			$('.hidden-country').val(country);
			$('.hidden-location').val(location);
			$('.hidden-munte').val(munte);
		}
		
		$('#myModal').modal('show'); 
	});
	
	$("#alert-btn").click(function(){
		$('#myModal').modal('hide'); 
		var alertType = $('#alert-form').serialize();
		console.log(alertType);
		$.ajax({
			url: 'alert.php',
			type: "POST",
			data: alertType,
			success: function(alertType){
				$('#myModal2').modal('show');
				setTimeout(function(){
					$('#myModal2').modal('hide');},
				2000);
			}
			});
	});
});


