function DeleteContact(id)
{
	var answer = confirm("Are you sure you want to delete this contact?");

	if (answer)
	{
		//perform post deletion call
		$.post(
    		"index.php",
			{ "action": "delete", "id": id },
   			function(data){ $('#row_'+id).hide(); }
   		);
	}
}

function AddContact()
{
	//build the datastring
	var first_name = $('#add_first_name').val();
	var last_name = $('#add_last_name').val();
	var type = $('#add_type').val();
	var number = $('#add_number').val();

	var datastring = 'action=add&first_name='+ first_name + '&last_name=' + last_name + '&type=' + type + '&number=' + number; 
	
	//add the contact and render the html
	$.ajax({  
		type: "POST",  
		url: "index.php",  
		data: datastring,  
		success: function(data) { $("#add_contact").html(data);}  
	});

	//refresh the contact list
	$.ajax({  
		type: "POST",  
		url: "index.php",  
		data: 'action=list',  
		success: function(data) { $("#list_contact").html(data);}  
	});

	return false;
}