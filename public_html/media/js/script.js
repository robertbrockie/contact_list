/**
	AddContact

	If the values are ok, add a contact to the database via an AJAX call.	
**/
function AddContact()
{
	//remove error classes from possible previous errors
	$('#add_first_name').removeClass('error_input');
	$('#add_last_name').removeClass('error_input');
	$('#add_type').removeClass('error_input');
	$('#add_number').removeClass('error_input');

	//clear previous errors
	$('#errors').html('');
	//error flag, if we have errors don't try and add the new contact
	var errors = false;
	
	//store any error messages we get.
	var error_messages = new Array();

	//get and validate the first name
	var first_name = $('#add_first_name').val();
	if(first_name == "")
	{
		$('#add_first_name').addClass('error_input');
		errors = true;
		error_messages.push("First name is required.");
	}

	//get and validate the last_name
	var last_name = $('#add_last_name').val();
	if(last_name == "")
	{
		$('#add_last_name').addClass('error_input');
		errors = true;
		error_messages.push("Last name is required.");
	}

	//get and validate the type
	var type = $('#add_type').val();
	if(type == "")
	{
		$('#add_type').addClass('error_input');
		errors = true;
		error_messages.push("Type is required.");
	}

	//get and validate the number
	var number = $('#add_number').val();
	if(number == "")
	{
		$('#add_number').addClass('error_input');
		errors = true;
		error_messages.push("Number is required.");
	}

	//no errors, let's add the contact
	if(!errors)
	{
		//build the datastring
		var datastring = 'action=add&first_name='+ first_name + '&last_name=' + last_name + '&type=' + type + '&number=' + number; 

		//add the contact and render the html
		$.ajax({  
			type: "POST",  
			url: "index.php",  
			data: datastring,  
			success: function(data)
			{
				$("#add_contact").html(data);
				//refresh the contact list
				$.ajax({  
					type: "POST",  
					url: "index.php",  
					data: 'action=list',  
					success: function(data) { $("#list_contact").html(data);}  
				});
			}  
		});
	}
	else
	{
		//display the errors
		ShowErrorMessages(error_messages);
	}

	return false;
}

/**
	ShowErrorMessages

	Display error messages in the same style if Javascript was disabled.
**/
function ShowErrorMessages(error_messages)
{
	//start building the html
	error_html = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button>';
	for (var i = 0; i < error_messages.length; i++) { error_html += '<p>' + error_messages[i] + '</p>'; }
    error_html += '</div>';

	//rendering time
	$('#errors').html(error_html);
}

/**
	Delete Contact

	Delete a contact with the specific id.
**/
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

/**
	Edit Contact

	Will update the the table list with editable fields.
**/
function EditContact(id)
{
	//get the values
	var first_name = $('#first_name_'+id).html();
	var last_name = $('#last_name_'+id).html();
	var type = $('#type_'+id).html();
	var number = $('#number_'+id).html();

	//we need to change the row, let's build it
	var edit_row_html = "<td><input type='text' id='edit_last_name_"+id+"' value='"+last_name+"'/></td>"
						+ "<td><input type='text' id='edit_first_name_"+id+"' value='"+first_name+"'/></td>"
						+ "<td><select id='edit_type_"+id+"' class='input-small'>"
						+ "	<option value=''>Type</option>"
						+ " <option value='MOBILE'>MOBILE</option>"
						+ " <option value='HOME'>HOME</option>"
						+ " <option value='OFFICE'>OFFICE</option>"
						+ " <option value='OTHER'>OTHER</option>"
						+ "</select></td>"
						+ "<td><input type='text' id='edit_number_"+id+"' value='"+number+"'/></td>"
						+ "<td><a href='#'' class='btn btn-primary' onclick='UpdateContact("+id+"); return false;''>edit</a></td>"
						+ "<td><a href='index.php' class='btn'>close</a></td>";
	//change time.
	$('#row_'+id).html(edit_row_html);

	//populate the select box
	$("#edit_type_"+id).val(type).attr('selected',true);
}

/**
	Update Contact

	Validate some new data for an existing contact and update via AJAX.
**/
function UpdateContact(id)
{
	//remove error classes from possible previous errors
	$('#edit_first_name_'+id).removeClass('error_input');
	$('#edit_last_name_'+id).removeClass('error_input');
	$('#edit_type_'+id).removeClass('error_input');
	$('#edit_number_'+id).removeClass('error_input');

	//error flag, if we have errors don't try and add the new contact
	var errors = false;

	//get the updated values

	//get and validate the first_name
	var first_name = $('#edit_first_name_'+id).val();
	if(first_name == "")
	{
		$('#edit_first_name_'+id).addClass('error_input');
		errors = true;
	}

	//get and validate the last name
	var last_name = $('#edit_last_name_'+id).val();
	if(last_name == "")
	{
		$('#edit_last_name_'+id).addClass('error_input');
		errors = true;
	}

	//get and validate the type
	var type = $('#edit_type_'+id).val();
	if(type == "")
	{
		$('#edit_type_'+id).addClass('error_input');
		errors = true;
	}

	//get and validate the number
	var number = $('#edit_number_'+id).val();
	if(number == "")
	{
		$('#edit_number_'+id).addClass('error_input');
		errors = true;
	}

	//no errors, let's update the contact
	if(!errors)
	{
		//build the datastring
		var datastring = 'action=update&id='+id+'&first_name='+first_name+'&last_name='+last_name+'&type='+type+'&number='+number;

		//update the contact and render the html
		$.ajax({  
			type: "POST",  
			url: "index.php",  
			data: datastring,  
			success: function(data) { $('#row_'+id).html(data); }  
		});
	}
}