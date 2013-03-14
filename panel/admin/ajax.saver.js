$('.confirm_edit').click(function() {

	var id = $('#idField').text();
	var brewer = $('#brewerField').val();
	var name = $('#nameField').val();
	var type = $('#typeField').val();
	var perc = $('#percentageField').val();

	$.ajax( {
		type: 'POST',
		url: '../../../cus/admin/drinkeditor.php',
		data: 'id='+id+'&brewer='+brewer+'&name='+name+'&type='+type+'&perc='+perc,
	});

	return false;
});