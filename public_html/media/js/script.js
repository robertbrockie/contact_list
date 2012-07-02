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

function EditContact(id)
{
	//we need to change the row, let's build it

	var first_name = $('#first_name_'+id).html();
	var last_name = $('#last_name_'+id).html();
	var type = $('#type_'+id).html();
	var number = $('#number_'+id).html();

	var edit_row_html = "<td id='last_name_'"+id+"''><input </td><td id='first_name_'></td><td id='type_'></td><td id='number_'></td><td><a href='#'' class='btn' onclick='UpdateContact(); return false;''>edit</a></td><td></td>";

	$('#row_'+id).html(edit_row_html);

}