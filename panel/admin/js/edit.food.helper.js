function createTable()
{ 
	$("#drinks_table").tablesorter(
	{ 
        headers: 
        { 
            6: 
            {  
                sorter: false 
            }
        } 
    });
    
}

function filterByType()
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

function deleteFood()
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
		curRow.remove();
		$("#delete_popup").bPopup().close();
	});
	
	$(".cancel_delete").on("click", function(e)
	{
		$("#delete_popup").bPopup().close();
	});

}

function editFood()
{
	var curRow;
	var curTitle;
	var curType;
	var curBurgerItem;
	var curPrice;
	var curDescription;

	$(".edit_icon").on("click", function(e)
	{
		/* 	Column Values */
		curRow = $(this).parent().closest("tr");
		curId = curRow.find("td.id").text();
		curTitle = curRow.find("td.title").text();
		curType = curRow.find("td.type").text();
		curBurgerItem = curRow.find("td.burger").text();
		curPrice = curRow.find("td.price").text();
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
          
        $("#typeField").validate(
        {
            expression: "if (VAL != '0') return true; else return false;",
        });
        $("#typeField").val(curType);
        
        if (curBurgerItem === "true")
        {
	        $("#burgerField").prop("checked", true);
        }
        
        $("#priceField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        $("#priceField").val(curPrice);
        
        
        $("#descriptionField").validate(
		{
            expression: "if (VAL) return true; else return false;",
        });
        $("#descriptionField").val(curDescription);
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
	filterByType();
    deleteFood();
    editFood();
}

$(document).ready(
	myReadyFunction
);
