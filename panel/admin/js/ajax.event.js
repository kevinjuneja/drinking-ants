function LoadMyJs(scriptName) {
	var docHeadObj = document.getElementsByTagName("head")[0];
	var dynamicScript = document.createElement("script");
	dynamicScript.type = "text/javascript";
	dynamicScript.src = scriptName;
	docHeadObj.appendChild(dynamicScript);
}


function editEventAjax() {

	$('.confirm_edit').click(function() {
		var id = $('#idField').text();
		var title = $('#titleField').val();
		var dateBegin = $('#dateBeginField').val();
		var dateEnd = $('#dateEndField').val();
		var time = $('#timeField').val();
		var desc = $('#descriptionField').val();

		var tr = "tr#"+id;

		if (title.length < 1001 && title.length > 0 
			&& desc.length < 1001 && desc.length > 0 && time.length < 21 
			&& time.length > 0) {

			$.ajax( {
				type: 'POST',
				url: '../../cus/admin/eventeditor.php',
				data: 'id='+id+'&title='+title+'&datebegin='+dateBegin+'&dateend='+dateEnd+'&time='+time+'&desc='+desc ,
				success: function(data) {
					$(tr).empty();
					$(tr).append("<td class=\"id\">" + id + "</td>");
					$(tr).append("<td class=\"title\">" + title + "</td>");
					$(tr).append("<td class=\"date_begin\">" + dateBegin + "</td>");
					$(tr).append("<td class=\"date_end\">" + dateEnd + "</td>");
					$(tr).append("<td class=\"time_info\">" + time + "</td>");
					$(tr).append("<td class=\"description\">" +
					"<span>View Description</span>" +
					"<p class=\"description_detail\">" + desc + "</p></td>");
					$(tr).append("<td class=\"options\">" +
				 	"<img src=\"media/images/editIcon.png\" alt=\"Edit\" class=\"edit_icon\">" +
					"<img src=\"media/images/deleteIcon.png\" alt=\"Delete\" class=\"delete_icon\">" +
					"</td>");
					
					LoadMyJs('js/edit.events.helper.js');

					$('.edit_form').bPopup().close();
				}

			});
		}

	});
}

function readyFunc() {
	editEventAjax();
}

$(document).ready(readyFunc);