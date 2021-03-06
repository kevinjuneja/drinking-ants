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
            5: 
            {  
                sorter: false 
            }
        } 
    });
    
}

function filterByDrinks()
{
	$(".filter").click(function()
    {	
    	$("tr").show();
    	
    	var filter = ($(this).text().trim());

    	$("tr td.type").each(function()
    	{
        	if ($(this).text().trim() != filter)
        	{	
            	$(this).parent().hide();
            }
            
            if (filter == "All")
            {
   	       		$("tr").show();
   	       	}
        });
    });  

}

function deleteDrink()
{
	var curRow; 

	$(".delete_icon").on("click", function(e)
	{
		curRow = $(this).parent().closest("tr");
		var drinkName = curRow.find(".name").text();
		var warning = drinkName;
		$(".warning").html(warning);
		e.preventDefault();
		$("#delete_popup").bPopup();
	});
	
	$(".confirm_delete").on("click", function(e)
	{
		var id = curRow.find("td.id").text();
		//curRow.remove();

		$.ajax( {
			type: 'POST',
			url: '../../cus/admin/deletedrink.php',
			data: 'id=' + id,
			success: function(data) {
				curRow.remove();
				$("#delete_popup").bPopup().close();
			}
		});

		
	});
	
	$(".cancel_delete").on("click", function(e)
	{
		$("#delete_popup").bPopup().close();
	});
}


function addDrink() 
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

		$("#brewerField").validate(
		{
            expression: "if (VAL) return true; else return false;",
           // message: "Please enter the Required field"
        });
        $("#brewerField").val("");
        
        
        $("#nameField").validate(
		{
            expression: "if (VAL) return true; else return false;",
           // message: "Please enter the Required field"
        });
        $("#nameField").val("");
        
        

        $("#editSelection").validate(
        {
            expression: "if (VAL != '0') return true; else return false;",
          //  message: "Please make a selection"
        });
      
        
        $("#typeField").empty();
        $("#typeField").append("<option value=\"0\">Make a Selection</option>");
        $("#typeField").append("<option value=\"Bottle\">Bottle</option>");
        $("#typeField").append("<option value=\"Wine\">Wine</option>");
        
        $("typeField").val("0");
        
        $("#percentageField").validate(
		{
            expression: "if (VAL) return true; else return false;",
         //   message: "Please enter the Required field"
        });
        
        $("#percentageField").val("");

      	$(".confirm_add").remove();
      	$(".confirm_edit").remove();
      	$(".edit_form").append("<div class=\"confirm_add confirm_button\">Add</div>");
      	
      	LoadMyJs('js/ajax.saver.js');
	});

	$(".cancel_edit").on("click", function(e)
	{
		$(".edit_form").bPopup().close();
	});
}

function editDrink()
{
	var curRow;
	var curName;
	var curType;
	var curBrewer;
	var curPerc;
	var curPos;
	var curId;

	$(".edit_icon").on("click", function(e)
	{
		/* 	Column Values */
		curRow = $(this).parent().closest("tr");
		curId = curRow.find("td.id").text();
		curName = curRow.find("td.name").text();
		curType = curRow.find("td.type").text();
		curBrewer = curRow.find("td.brewer").text();
		curPerc = curRow.find("td.percentage").text();
		curPerc = curPerc.substring(0, curPerc.length - 1);
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
		
		$("#brewerField").validate(
		{
            expression: "if (VAL) return true; else return false;",
           // message: "Please enter the Required field"
        });
        $("#brewerField").val(curBrewer);
        
        
        $("#nameField").validate(
		{
            expression: "if (VAL) return true; else return false;",
          //  message: "Please enter the Required field"
        });
        $("#nameField").val(curName);
        
        $("#editSelection").validate(
        {
            expression: "if (VAL != '0') return true; else return false;",
          //  message: "Please make a selection"
        });
        $("#typeField").val(curType);

        if (curType == "Tap") {
        	$("#typeField").empty();
        	$("#typeField").append("<option value=\"Tap\">Tap</option>");
        }
        else {
        	$("#typeField").empty();
        	$("#typeField").append("<option value=\"0\">Make a Selection</option>");
        	$("#typeField").append("<option value=\"Bottle\">Bottle</option>");
        	$("#typeField").append("<option value=\"Wine\">Wine</option>");
        }
        
        $("#percentageField").validate(
		{
            expression: "if (VAL) return true; else return false;",
            //message: "Please enter the Required field"
        });
        $("#percentageField").val(curPerc);
      	
      	$(".confirm_edit").remove();
      	$(".confirm_add").remove();
      	$(".edit_form").append("<div class=\"confirm_edit confirm_button\">Save</div>");
      	
      	LoadMyJs('js/ajax.saver.js');
        
	});
	
	$(".cancel_edit").on("click", function(e)
	{
		$(".edit_form").bPopup().close();
	});
	
}

function myReadyFunction()
{
	createTable();
    filterByDrinks();
    deleteDrink();
    addDrink();
    editDrink();
     
}

$(document).ready(
	myReadyFunction
);
