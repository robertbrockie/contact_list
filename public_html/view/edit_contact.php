<?php include('view/header'); ?>

<div id="edit_contact">
	<form action="index.php" method="get" accept-charset="utf-8" class="well form-inline">
		<input type="hidden" name="action" value="edit"/>
		<input type="text" name="last_name" class="input-small" placeholder="Last Name" value="<?= $contact'last_name'] ?>">
		<input type="text" name="first_name" class="input-small" placeholder="First Name" value="<?= $contact'first_name'] ?>">
		<select name="type" class="input-small">
			<option>Type</option>
			<option value="MOBILE" <?= $contact'type'] == "MOBILE" ? 'selected' : '' ?>>Mobile</option>
			<option value="HOME" <?= $contact'type'] == "MOBILE" ? 'selected' : '' ?>>Home</option>
			<option value="OFFICE" <?= $contact'type'] == "MOBILE" ? 'selected' : '' ?>>Office</option>
			<option value="OTHER" <?= $contact'type'] == "MOBILE" ? 'selected' : '' ?>>Other</option>
		</select>
		<input type="text" name="number" class="input-small" placeholder="Phone Number" value="<?= $contact'number'] ?>">

	    <button type="submit" class="btn" name="submit">Add Contact</button>
	</form>
    <?php if(isset($errors)) { include('view/errors.php'); } ?>
</div>

<?php include('view/footer'); ?>