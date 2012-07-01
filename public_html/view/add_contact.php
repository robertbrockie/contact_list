<form id="add_contact_form" action="index.php" method="get" accept-charset="utf-8" class="well form-inline">
	<input type="hidden" name="action" value="add"/>
	<input type="text" name="last_name" class="input-small" placeholder="Last Name" value="<?= $vals['last_name'] ?>">
	<input type="text" name="first_name" class="input-small" placeholder="First Name" value="<?= $vals['first_name'] ?>">
	<select name="type" class="input-small">
		<option>Type</option>
		<option value="MOBILE" <?= $vals['type'] == "MOBILE" ? 'selected' : '' ?>>Mobile</option>
		<option value="HOME" <?= $vals['type'] == "MOBILE" ? 'selected' : '' ?>>Home</option>
		<option value="OFFICE" <?= $vals['type'] == "MOBILE" ? 'selected' : '' ?>>Office</option>
		<option value="OTHER" <?= $vals['type'] == "MOBILE" ? 'selected' : '' ?>>Other</option>
	</select>
	<input type="text" name="number" class="input-small" placeholder="Phone Number" value="<?= $vals['number'] ?>">

    <button type="submit" class="btn" name="submit">Add Contact</button>

    <?php if(isset($errors)) { include('view/errors.php'); } ?>
</form>