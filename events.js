$(document).ready(function() {

	$("tbody tr").click(function(){
		$("tbody .selected").removeClass("selected");
		$(this).addClass('selected');
		var id = $(this).children().first().text();
		$('.hidden-id').val(id);
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


