$(document).ready(function() {
  
  $("#disaster").change(function() {
    
    var element = $(this) ;
    
    if(element.val() == "Cutremur" ) {
		$("#add-event-body .earthquake-form").remove();
		$("#add-event-body").append("<div class=\"earthquake-form\"><p><label for=\"magnitude\">Magnitudine: </label><input type=\"number\" name=\"type_magnitude\" id=\"magnitude\" min=\"1\" max=\"10\" step=\"0.1\" required></p><p><label for=\"damaged-area\">Suprafata afectata(m<sup>2</sup>): </label><input type=\"number\" id=\"damaged-area\" name=\"type_damaged-area\" required></p><p><label for=\"depth\">Adancime: </label><input type=\"number\" name=\"type_depth\" id=\"depth\" min=\"1\" max=\"10\" step=\"0.1\" required></p><p><label for=\"continent\">Continent: </label><input type=\"text\" id=\"continent\" name=\"type_continent\" required></p><p><label for=\"country\">Tara: </label><input type=\"text\" id=\"country\" name=\"type_country\" required></p></div>");
		$("#add-event-body .fire-form").remove();
		$("#add-event-body .flood-form").remove();
		$("#add-event-body .tshunami-form").remove();
		$("#add-event-body .volcano-form").remove();
		$("#add-event-body .avalanche-form").remove();
    }
    else if(element.val() == "Incendiu" ) {
		$("#add-event-body .fire-form").remove();
		$("#add-event-body").append("<div class=\"fire-form\"><p><label for=\"damaged-area\">Suprafata afectata(m<sup>2</sup>): </label><input type=\"number\" id=\"damaged-area\" name=\"type_damaged-area\" required></p><p><label for=\"continent\">Continent: </label><input type=\"text\" id=\"continent\" name=\"type_continent\" required></p><p><label for=\"country\">Tara: </label><input type=\"text\" id=\"country\" name=\"type_country\" required></p></div>");
		$("#add-event-body .earthquake-form").remove();
		$("#add-event-body .flood-form").remove();
		$("#add-event-body .tshunami-form").remove();
		$("#add-event-body .volcano-form").remove();
		$("#add-event-body .avalanche-form").remove();
	}
	else if(element.val() == "Inundatie" ) {
		$("#add-event-body .flood-form").remove();
		$("#add-event-body").append("<div class=\"flood-form\"><p><label for=\"damaged-area\">Suprafata afectata(m<sup>2</sup>): </label><input type=\"number\" id=\"damaged-area\" name=\"type_damaged-area\" required></p><p><label for=\"continent\">Continent: </label><input type=\"text\" id=\"continent\" name=\"type_continent\" required></p><p><label for=\"country\">Tara: </label><input type=\"text\" id=\"country\" name=\"type_country\" required></p></div>");
		$("#add-event-body .fire-form").remove();
		$("#add-event-body .earthquake-form").remove();
		$("#add-event-body .tshunami-form").remove();
		$("#add-event-body .volcano-form").remove();
		$("#add-event-body .avalanche-form").remove();
	}
	else if(element.val() == "Tshunami" ) {
		$("#add-event-body .tshunami-form").remove();
		$("#add-event-body").append("<div class=\"tshunami-form\"><p><label for=\"area\">Aria de lovire: </label><input type=\"text\" id=\"area\" name=\"type_area\" required></p><p><label for=\"magnitude\">Magnitudine: </label><input type=\"number\" name=\"type_magnitude\" id=\"magnitude\" min=\"1\" max=\"10\" step=\"0.1\" required></p><p><label for=\"damaged-area\">Suprafata afectata(m<sup>2</sup>): </label><input type=\"number\" id=\"damaged-area\" name=\"type_damaged-area\" required></p></div>");
		$("#add-event-body .fire-form").remove();
		$("#add-event-body .flood-form").remove();
		$("#add-event-body .earthquake-form").remove();
		$("#add-event-body .volcano-form").remove();
		$("#add-event-body .avalanche-form").remove();
	}
	else if(element.val() == "Eruptie vulcanica" ) {
		$("#add-event-body .volcano-form").remove();
		$("#add-event-body").append("<div class=\"volcano-form\"><p><label for=\"volcano-name\">Nume vulcan: </label><input type=\"text\" id=\"volcano-name\" name=\"type_volcano-name\" required></p><p><label for=\"volcano-type\">Tip vulcan: </label><select id=\"volcano-type\" name=\"type_volcano-type\" required><option disabled selected value></option><option>Stratovulcan</option><option>Caldera</option><option>Subglaciar</option><option>Complex</option></select></p><p><label for=\"VEI\">Index explozivitate vulcanica: </label><input type=\"number\" min=\"6\" max=\"9\" step=\"1\" id=\"VEI\" name=\"type_VEI\" required></p><p><label for=\"continent\">Continent: </label><input type=\"text\" id=\"continent\" name=\"type_continent\" required></p><p><label for=\"country\">Tara: </label><input type=\"text\" id=\"country\" name=\"type_country\" required></p></div>");
		$("#add-event-body .fire-form").remove();
		$("#add-event-body .flood-form").remove();
		$("#add-event-body .tshunami-form").remove();
		$("#add-event-body .earthquake-form").remove();
		$("#add-event-body .avalanche-form").remove();
	}
	else if(element.val() == "Avalansa" ) {
		$("#add-event-body .avalanche-form").remove();
		$("#add-event-body").append("<div class=\"avalanche-form\"><p><label for=\"continent\">Continent: </label><input type=\"text\" id=\"continent\" name=\"type_continent\" required></p><p><label for=\"country\">Tara: </label><input type=\"text\" id=\"country\" name=\"type_country\" required></p><p><label for=\"mountains\">Munti: </label><input type=\"text\" id=\"mountains\" name=\"type_mountains\" required></p></div>");
		$("#add-event-body .fire-form").remove();
		$("#add-event-body .flood-form").remove();
		$("#add-event-body .tshunami-form").remove();
		$("#add-event-body .volcano-form").remove();
		$("#add-event-body .earthquake-form").remove();
	}
  });
});