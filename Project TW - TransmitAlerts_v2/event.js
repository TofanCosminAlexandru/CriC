$(document).ready(function() {
  
  $("#disaster").change(function() {
    
    var element = $(this) ;
    
    if(element.val() === "Cutremur" ) {
		$("#wrapper1-body").find(".table").remove();
		$("#wrapper1-body").append("<div class=\"table\"><table class=\"cutremur\"><thead><tr><th scope=\"row\" colspan=\"12\">Cutremur</th></tr><tr><th scope=\"col\">Data</th><th scope=\"col\">Magnitudine</th><th scope=\"col\">Suprafata afectata(m<sup>2</sup>)</th><th scope=\"col\">Adancime</th><th scope=\"col\">Continent</th><th scope=\"col\">Tara</th><th scope=\"col\">Locatie</th><th scope=\"col\">Grad de risc</th><th scope=\"col\">Data declarare siguranta</th></tr></thead><tbody><tr><td>Aprilie 25 2017 06:46 AM</td><td>5.1</td><td>3408</td><td>3.4</td><td>Asia</td><td>Rusia</td><td>Sakhalin, Severo-Kuril&#39;sk</td><td><img id=\"risc\" src=\"images/grad_mare_de_risc.png\" alt=\"Risc\" width=\"40%\"></td><td contenteditable='true'>&nbsp;</td></tr>	<tr><td>Aprilie 24 2017 03:12 PM</td><td>2.0</td><td>500</td><td>1.2</td><td>Australia</td><td>Noua Zeelanda</td><td>Te Kaha</td><td> <img id=\"risc\" src=\"images/grad_mic_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td><td contenteditable='true'>Aprilie 24 2017 03:56 PM</td></tr><tr><td>Aprilie 23 2017 02:04 PM</td><td>2.5</td><td>890</td><td>1.7</td><td>America de Nord</td><td>SUA</td><td>Alaska, Manley Hot Springs</td><td> <img id=\"risc\" src=\"images/grad_mic_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td><td contenteditable='true'>Aprilie 23 2017 03:02 PM</td></tr><tr><td>Aprilie 22 2017 12:39 PM</td><td>4.5</td><td>2080</td><td>2.7</td>	<td>Europa</td><td>Italia</td><td>Sicilia, Castel di Tusa</td><td> <img id=\"risc\" src=\"images/grad_mediu_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td><td contenteditable='true'>Aprilie 22 2017 10:56 PM</td></tr><tr><td>Aprilie 18 2017 04:15 PM</td><td>6.8</td><td>5609</td><td>4.5</td><td>Asia</td><td>Turcia</td><td>Sakarya, Karasu</td><td> <img id=\"risc\" src=\"images/grad_urias_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td><td contenteditable='true'>Aprilie 21 2017 07:02 PM</td></tr></tbody></table></div>");
	}
    else if(element.val() === "Incendiu" ) {
		$("#wrapper1-body").find(".table").remove();
		$("#wrapper1-body").append("<div class=\"table\"> <table class=\"incendiu\"> <thead> <tr> <th scope=\"row\" colspan=\"10\">Incendiu</th> </tr> <tr> <th scope=\"col\">Data</th> <th scope=\"col\">Suprafata afectata(m<sup>2</sup>)</th> <th scope=\"col\">Continent</th> <th scope=\"col\">Tara</th> <th scope=\"col\">Locatie</th> <th scope=\"col\">Grad de risc</th> <th scope=\"col\">Data declarare siguranta</th> </tr> </thead> <tbody> <tr> <td>Aprilie 25 2017 02:05 AM</td> <td>3020</td> <td>America Centrala</td> <td>Mexic</td> <td>Guerrero, Pericotepec</td> <td> <img id=\"risc\" src=\"images/grad_mare_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>&nbsp;</td> </tr> <tr> <td>Aprilie 24 2017 02:24 AM</td> <td>1509</td> <td>Europa</td> <td>Bulgaria</td> <td>Yambol, Bolyarovo</td> <td> <img id=\"risc\" src=\"images/grad_mediu_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Aprilie 24 2017 07:00 PM</td> </tr> <tr> <td>Aprilie 23 2017 05:06 PM</td> <td>5090</td> <td>America de Sud</td> <td>Ecuador</td> <td>Manabi, Manta</td> <td> <img id=\"risc\" src=\"images/grad_urias_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Aprilie 24 2017 07:09 AM</td> </tr> <tr> <td>Aprilie 22 2017 01:40 PM</td> <td>370</td> <td>Europa</td> <td>Grecia</td> <td>Grecia Centrala, Afration</td> <td> <img id=\"risc\" src=\"images/grad_mic_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Aprilie 22 2017 05:56 PM</td> </tr> <tr> <td>Aprilie 19 2017 06:34 PM</td> <td>600</td> <td>Asia</td> <td>Turcia</td> <td>Sakarya, Karasu</td> <td> <img id=\"risc\" src=\"images/grad_mic_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Aprilie 19 2017 07:29 PM</td> </tr> </tbody> </table> </div>");
	}
	else if(element.val() === "Inundatie" ) {
		$("#wrapper1-body").find(".table").remove();
		$("#wrapper1-body").append("<div class=\"table\"> <table class=\"inundatie\"> <thead> <tr> <th scope=\"row\" colspan=\"12\">Inundatie</th> </tr> <tr> <th scope=\"col\">Data</th> <th scope=\"col\">Suprafata afectata(m<sup>2</sup>)</th> <th scope=\"col\">Continent</th> <th scope=\"col\">Tara</th> <th scope=\"col\">Locatie</th> <th scope=\"col\">Grad de risc</th> <th scope=\"col\">Data declarare siguranta</th> </tr> </thead> <tbody> <tr> <td>Aprilie 18 2017 06:44 AM</td> <td>4800</td> <td>America de Nord</td> <td>SUA</td> <td>California, Cobb</td> <td> <img id=\"risc\" src=\"images/grad_mare_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'></td> </tr> <tr> <td>Aprilie 19 2017 09:45 AM</td> <td>3278</td> <td>Europa</td> <td>Grecia</td> <td>North Aegean, Mithymna</td> <td> <img id=\"risc\" src=\"images/grad_mediu_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>&nbsp;</td> </tr> <tr> <td>Aprilie 25 2017 09:45 AM</td> <td>1020</td> <td>America de Nord</td> <td>SUA</td> <td>Oklahoma, Meno</td> <td> <img id=\"risc\" src=\"images/grad_mic_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>&nbsp;</td> </tr> </tbody> </table> </div> ");
	}
	else if(element.val() === "Tshunami" ) {
		$("#wrapper1-body").find(".table").remove();
		$("#wrapper1-body").append("<div class=\"table\"> <table class=\"tshunami\"> <thead> <tr> <th scope=\"row\" colspan=\"10\">Tshunami</th> </tr> <tr> <th scope=\"col\">Data</th> <th scope=\"col\">Arie</th> <th scope=\"col\">Magnitudine</th> <th scope=\"col\">Suprafata afectata(m<sup>2</sup>)</th> <th scope=\"col\">Locatie</th> <th scope=\"col\">Grad de risc</th> <th scope=\"col\">Data declarare siguranta</th> </tr> </thead> <tbody> <tr> <td>Martie 16 2017 12:54 AM</td> <td>Oceanul Atlantic de Nord</td> <td>7.0</td> <td>6079</td> <td>Regiunea Dominican Republic</td> <td> <img id=\"risc\" src=\"images/grad_urias_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Martie 20 2017 08:08 AM</td> </tr> <tr> <td>Martie 05 2017 10:55 PM</td> <td>Marea Solomon</td> <td>5.2</td> <td>4070</td> <td>West New Britain, Papua New Guinea</td> <td> <img id=\"risc\" src=\"images/grad_mare_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Martie 09 2017 02:08 AM</td> </tr> </tbody> </table> </div> ");
	}
	else if(element.val() === "Eruptie vulcanica" ) {
		$("#wrapper1-body").find(".table").remove();
		$("#wrapper1-body").append("<div class=\"table\"> <table class=\"vulcan\"> <thead> <tr> <th scope=\"row\" colspan=\"12\">Eruptie vulcanica</th> </tr> <tr> <th scope=\"col\">Data</th> <th scope=\"col\">Nume vulcan</th> <th scope=\"col\">Tip vulcan</th> <th scope=\"col\">Index explozivitate vulcanica</th> <th scope=\"col\">Continent</th> <th scope=\"col\">Tara</th> <th scope=\"col\">Locatie</th> <th scope=\"col\">Grad de risc</th> <th scope=\"col\">Data declarare siguranta</th> </tr> </thead> <tbody> <tr> <td>Aprilie 10 2017 03:21 AM</td> <td>Poas</td> <td>Stratovulcan</td> <td>7</td> <td>America Centrala</td> <td>Costa Rica</td> <td>Alajuela Province</td> <td> <img id=\"risc\" src=\"images/grad_mediu_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Aprilie 11 2017 05:09 AM</td> </tr> <tr> <td>Ianuarie 28 2017 04:56 AM</td> <td>Katla</td> <td>Subglaciar</td> <td>7</td> <td>Europa</td> <td>Islanda</td> <td>Islanda de Sud</td> <td> <img id=\"risc\" src=\"images/grad_mediu_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Ianuarie 30 2017 12:13 PM</td> </tr> </tbody> </table> </div> ");
	}
	else if(element.val() === "Avalansa" ) {
		$("#wrapper1-body").find(".table").remove();
		$("#wrapper1-body").append("<div class=\"table\"> <table class=\"avalansa\"> <thead> <tr> <th scope=\"row\" colspan=\"10\">Avalansa</th> </tr> <tr> <th scope=\"col\">Data</th> <th scope=\"col\">Continent</th> <th scope=\"col\">Tara</th> <th scope=\"col\">Locatie</th> <th scope=\"col\">Munti</th> <th scope=\"col\">Grad de risc</th> <th scope=\"col\">Data declarare siguranta</th> </tr> </thead> <tbody> <tr> <td>Ianuarie 15 2017 12:56 PM</td> <td>Europa</td> <td>Elvetia</td> <td>Stanserhorn</td> <td>Muntii Alpi</td> <td> <img id=\"risc\" src=\"images/grad_mare_de_risc.png\" alt=\"Risc\" width=\"40%\"> </td> <td contenteditable='true'>Ianuarie 15 2017 18:02 PM</td> </tr> </tbody> </table> </div> ");
	}

	$("tbody tr").click(function(){
		$("tbody .selected").removeClass("selected");
		$(this).addClass('selected');
		$('#myModal').modal('show'); 
	});
	
	$("#alert-btn").click(function(){
		$('#myModal').modal('hide'); 
		$('#myModal2').modal('show');
		setTimeout(function(){
			$('#myModal2').modal('hide');},
		2000);
	});
  });
});

