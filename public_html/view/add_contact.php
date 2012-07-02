<form id="add_contact_form" action="index.php" method="get" accept-charset="utf-8" class="well form-inline">
	<input type="hidden" name="action" value="add"/>
	<input type="text" id="add_last_name" name="last_name" class="input-small" placeholder="Last Name" value="<?= isset($vals['last_name']) ? $vals['last_name'] : '' ?>">
	<input type="text" id="add_first_name" name="first_name" class="input-small" placeholder="First Name" value="<?= $vals['first_name'] ?>">
	<select id="add_type" name="type" class="input-small">
		<option value="">Type</option>
		<option value="MOBILE" <?= $vals['type'] == "MOBILE" ? 'selected' : '' ?>>Mobile</option>
		<option value="HOME" <?= $vals['type'] == "HOME" ? 'selected' : '' ?>>Home</option>
		<option value="OFFICE" <?= $vals['type'] == "OFFICE" ? 'selected' : '' ?>>Office</option>
		<option value="OTHER" <?= $vals['type'] == "OTHER" ? 'selected' : '' ?>>Other</option>
	</select>
	<input type="text" id="add_number" name="number" class="input-small" placeholder="Phone Number" value="<?= $vals['number'] ?>">

    <input type="submit" class="btn" name="submit" onclick="AddContact(); return false;" value="Add Contract"></input>
</form>

<?php if(isset($errors)) { include('view/errors.php'); } ?>