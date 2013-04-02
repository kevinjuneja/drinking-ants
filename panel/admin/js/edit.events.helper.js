function LoadMyJs(scriptName) {
	var docHeadObj = document.getElementsByTagName("head")[0];
	var dynamicScript = document.createElement("script");
	dynamicScript.type = "text/javascript";
	dynamicScript.src = scriptName;
	docHeadObj.appendChild(dynamicScript);
}

function createTable()
{ 
	$("#drinks_table").tablesorter(
	{ 
        headers: 
        { 
            7: 
            {  
                sorter: false 
            }
        } 
    });
    
}

function deleteEvent()
{
	var curRow; 

	$(".delete_icon").on("click", function(e)
	{
		curRow = $(this).parent().closest("tr");
		var drinkName = curRow.find(".name").text();
		$(".warning").html(drinkName);
		e.preventDefault();
		$("#delete_popup").bPopup();
	});
	
	$(".confirm_delete").on("click", function(e)
	{
		
		var id = curRow.find("td.id").text();
		
		alert("id= " + id);
		$.ajax( {
			type: 'POST',
			url: '../../cus/admin/deleteEvent.php',
			data: 'id=' + id,
			success: function(data) {
				curRow.remove();
				$('#delete_popup').bPopup().close();
			}
		});

	//	$("#delete_popup").bPopup().close();
	});
	
	$(".cancel_delete").on("click", function(e)
	{

		$("#delete_popup").bPopup().close();
	});

}


function addEvent() 
{

	$(".addnew").on("click", function(e)
	{
		$(".edit_form").bPopup(
			{
				modalClose: false,
				follow: [false, false],
				positionStyle: 'absolute'
			});

		$("#idField").html("");

		$("#titleField").validate(
		{
            expression: "if (VAL) return true; else return false;",
           // message: "Please enter the Required field"
        });
        $("#titleField").val("");
        
        
        $( "#dateBeginField" ).datepicker();
        
        $("#dateBeginField").validate(
		{
          //  expression: "if (!isValidDate(parseInt(VAL.split('/')[2]), parseInt(VAL.split('/')[0]), parseInt(VAL.split('/')[1]))) return false; else return true;",
        });
        
        $("#dateBeginField").val("00/00/0000");
        
        $( "#dateEndField" ).datepicker();
        
        $("#dateEndField").validate(
		{
           // expression: "if (!isValidDate(parseInt(VAL.split('/')[2]), parseInt(VAL.split('/')[0]), parseInt(VAL.split('/')[1]))) return false; else return true;",
        });
        
        $("#dateEndField").val("00/00/0000");

        $("#timeField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        
        $("#timeField").val("");
        
        
        $("#descriptionField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        
        $("#descriptionField").val("");

        $(".confirm_edit").remove();
      	$(".confirm_add").remove();
      	$(".edit_form").append("<div class=\"confirm_add confirm_button\">Add</div>");
      	
      	LoadMyJs('js/ajax.event.js');
	});

	$(".cancel_edit").on("click", function(e)
	{
		$(".edit_form").bPopup().close();
	});
}


function editEvent()
{
	var curRow;
	var curTitle;
	var curLink;
	var curDateBegin;
	var curDateEnd;
	var curTimeInfo;
	var curDescription;

	$(".edit_icon").on("click", function(e)
	{
		/* 	Column Values */
		curRow = $(this).parent().closest("tr");
		curId = curRow.find("td.id").text();
		curTitle = curRow.find("td.title").text();
		//curLink = curRow.find("td.link").text();
		curDateBegin = curRow.find("td.date_begin").text();
		curDateEnd = curRow.find("td.date_end").text();
		curTimeInfo = curRow.find("td.time_info").text();
		curDescription = curRow.find("td.description p").text();
		curPos = curRow.offset();

		$(".edit_form").bPopup(
		{
			modalClose: false,
			follow: [false, false],
			positionStyle: 'absolute'
		});
		
		/*--Position of edit menu--*/
		var topPos = curPos.top;
		var leftPos = curPos.left;
		$(".edit_form").css({top: topPos, left: leftPos});
		
		
		/* 	Edit Fields */
		$("#idField").html(curId);
		
		$("#titleField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        $("#titleField").val(curTitle);
        
        
       /* $("#linkField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        $("#linkField").val(curLink); */
        
        $( "#dateBeginField" ).datepicker();
        
        $("#dateBeginField").validate(
		{
            expression: "if (!isValidDate(parseInt(VAL.split('/')[2]), parseInt(VAL.split('/')[0]), parseInt(VAL.split('/')[1]))) return false; else return true;",
        });
        $("#dateBeginField").val(curDateBegin);
        
        $( "#dateEndField" ).datepicker();
        
        $("#dateEndField").validate(
		{
            expression: "if (!isValidDate(parseInt(VAL.split('/')[2]), parseInt(VAL.split('/')[0]), parseInt(VAL.split('/')[1]))) return false; else return true;",
        });
        $("#dateEndField").val(curDateEnd);
        
        
        $("#timeField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        
        $("#timeField").val(curTimeInfo);
        
        
        $("#descriptionField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        $("#descriptionField").val(curDescription);

        $(".confirm_edit").remove();
      	$(".confirm_add").remove();
      	$(".edit_form").append("<div class=\"confirm_edit confirm_button\">Save</div>");
      	
      	LoadMyJs('js/ajax.event.js');
	});
	
	$(".description span").click(function()
	{	
		curRow = $(this).parent().closest("tr");
		curDescription = curRow.find("td.description p").text();
		$("#description_popup").find("p").html(curDescription);
		$("#description_popup").bPopup();
	});
	
	$(".confirm_description").on("click", function(e)
	{
		$("#description_popup").bPopup().close();
	});
	
	$(".cancel_edit").on("click", function(e)
	{
		$(".edit_form").bPopup().close();
	});
	
}

function myReadyFunction()
{
	createTable();
    deleteEvent();
    addEvent();
    editEvent();
}

$(document).ready(
	myReadyFunction
);
