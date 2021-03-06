<div id="edit_contact">
	<h2>Edit Contact</h2>
	<form action="index.php" method="get" accept-charset="utf-8" class="well form-inline">
		<input type="hidden" name="action" value="update"/>
		<input type="hidden" name="id" value="<?= $contact->id ?>"/>
		<input type="text" name="last_name" class="input-small" placeholder="Last Name" value="<?= $contact->last_name ?>">
		<input type="text" name="first_name" class="input-small" placeholder="First Name" value="<?= $contact->first_name ?>">
		<select name="type" class="input-small">
			<option value="">Type</option>
			<option value="MOBILE" <?= $contact->type == "MOBILE" ? 'selected' : '' ?>>Mobile</option>
			<option value="HOME" <?= $contact->type == "HOME" ? 'selected' : '' ?>>Home</option>
			<option value="OFFICE" <?= $contact->type == "OFFICE" ? 'selected' : '' ?>>Office</option>
			<option value="OTHER" <?= $contact->type == "OTHER" ? 'selected' : '' ?>>Other</option>
		</select>
		<input type="text" name="number" class="input-small" placeholder="Phone Number" value="<?= $contact->number ?>">

	    <button type="submit" class="btn btn-primary" name="submit">Update Contact</button>
	    <a href="index.php" class="btn btn-info" name="Back">Back</a>
	</form>
    <?php if(isset($errors)) { include('view/errors.php'); } ?>
</div>
