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
		curRow.remove();
		$("#delete_popup").bPopup().close();
	});
	
	$(".cancel_delete").on("click", function(e)
	{
		$("#delete_popup").bPopup().close();
	});
}

function editDrink()
{
	var curRow;
	var curName;
	var curType;
	var curBrewer;
	var curPerc;
	var curPrice;
	var curPos;

	$(".edit_icon").on("click", function(e)
	{
		/* 	Column Values */
		curRow = $(this).parent().closest("tr");
		curName = curRow.find("td.name").text();
		curType = curRow.find("td.type").text();
		curBrewer = curRow.find("td.brewer").text();
		curPerc = curRow.find("td.percentage").text();
		curPrice = curRow.find("td.price").text();
		curPos = curRow.position();

		$(".edit_form").bPopup(
		{
			modalClose: false,
			follow: [false, false],
		});
		
		/*--Position of edit menu--*/
		var topPos = curPos.top + 58
		$(".edit_form").css({top: topPos});
		
		
		/* 	Edit Fields */
		$("#brewerField").validate(
		{
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
        $("#brewerField").val(curBrewer);
        
        
        $("#nameField").validate(
		{
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
        $("#nameField").val(curName);
        
        $("#editSelection").validate(
        {
            expression: "if (VAL != '0') return true; else return false;",
            message: "Please make a selection"
        });
        $("#editSelection").val(curType);
        
        $("#percentageField").validate(
		{
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
        $("#percentageField").val(curPerc);
        
        $("#priceField").validate(
		{
            expression: "if (VAL) return true; else return false;",
            message: "Please enter the Required field"
        });
        $("#priceField").val(curPrice);
        
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
    editDrink();
     
}

$(document).ready(
	myReadyFunction
);
