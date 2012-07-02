<?php if(count($errors) == 0) { ?>
<td id="last_name_<?= $contact->id ?>"><?= $contact->last_name ?></td>
<td id="first_name_<?= $contact->id ?>"><?= $contact->first_name ?></td>
<td id="type_<?= $contact->id ?>"><?= $contact->type ?></td>
<td id="number_<?= $contact->id ?>"><?= $contact->number ?></td>
<td><a href="/index.php?action=edit&id=<?= $contact->id ?>" onclick="EditContact(<?= $contact->id ?>); return false;">[edit]</a></td>
<td><a href="/index.php?action=delete&id=<?= $contact->id ?>" onclick="DeleteContact(<?= $contact->id ?>); return false;">[remove]</a></td>
<?php } else { ?>
<td><input type="text" id="edit_last_name_<?= $contact->id ?>" value="<?= $contact->last_name ?>"/></td>
<td><input type="text" id="edit_first_name_<?= $contact->id ?>" value="<?= $contact->last_name ?>"/></td>
<td><select id="edit_type_<?= $contact->id ?>" class="input-small">
	<option value="">Type</option>
	<option value="MOBILE">MOBILE</option>
	<option value="HOME">HOME</option>
	<option value="OFFICE">OFFICE</option>
	<option value="OTHER">OTHER</option>
</select></td>
<td><input type="text" id="edit_number_<?= $contact->id ?>" value="<?= $contact->number ?>"/></td>
<td><a href="#" class="btn" onclick="UpdateContact(<?= $contact->id ?>); return false;">edit</a></td>
<td><a href="index.php" class="btn">close</a></td>
<?php } ?>