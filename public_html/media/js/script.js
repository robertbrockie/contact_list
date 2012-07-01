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