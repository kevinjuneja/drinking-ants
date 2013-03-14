
function LoadMyJs(scriptName) {
	var docHeadObj = document.getElementsByTagName("head")[0];
	var dynamicScript = document.createElement("script");
	dynamicScript.type = "text/javascript";
	dynamicScript.src = scriptName;
	docHeadObj.appendChild(dynamicScript);
}


function editDrinkAjax()
{

$('.confirm_edit').click(function() {

	var id = $('#idField').text();
	var brewer = $('#brewerField').val();
	var name = $('#nameField').val();
	var type = $('#typeField').val();
	var perc = $('#percentageField').val();

	var tr = "tr#"+id;
	var row;

	$.ajax( {
		type: 'POST',
		url: '../../cus/admin/drinkeditor.php',
		data: 'id='+id+'&brewer='+brewer+'&name='+name+'&type='+type+'&perc='+perc ,
		success: function(data) {
			//console.log(var row = $(tr));
			$(tr).find("td.name").html(name);
			$(tr).find("td.type").html(type);
			$(tr).find("td.brewer").html(brewer);
			$(tr).find("td.percentage").html(perc);

			$(tr).empty();
			$(tr).append("<td class=\"id\">" + id + "</td>");
			$(tr).append("<td class=\"brewer\">" + brewer + "</td>");
			$(tr).append("<td class=\"name\">" + name + "</td>");
			$(tr).append("<td class=\"type\">" + type + "</td>");
			$(tr).append("<td class=\"percentage\">" + perc + "</td>");
			$(tr).append("<td class=\"options\"><img src=\"media/images/editIcon.png\" alt=\"Edit\" class=\"edit_icon\" />");
			//$(tr).append("<img src=\"media/images/editIcon.png\" alt=\"Edit\" class=\"edit_icon\" />");

			if (type != "Tap") {
				$(tr).append("<img src=\"media/images/deleteIcon.png\" alt=\"Delete\" class=\"delete_icon\" />");
			}

			$(tr).append("</td>");

			LoadMyJs('js/edit.drinks.helper.js');

			$(".edit_form").bPopup().close();
		}
	});

	//$(".edit_form").bPopup().close();
	return false;
});
}

function readyFunc() {
	editDrinkAjax();
}

$(document).ready(
	readyFunc
	);