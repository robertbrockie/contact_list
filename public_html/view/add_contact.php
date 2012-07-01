<?php include('view/header.php'); ?>
<form action="index.php?action=add" method="post" accept-charset="utf-8" class="well form-inline">
	<input type="text" name="last_name" class="input-small" placeholder="Last Name" value="<?= $data['last_name'] ?>">
	<input type="text" name="first_name" class="input-small" placeholder="First Name" value="<?= $data['first_name'] ?>">
	<select name="type" class="input-small">
		<option>Type</option>
		<option value="MOBILE" <?= $data['type'] == "MOBILE" ? 'selected' : '' ?>>Mobile</option>
		<option value="HOME" <?= $data['type'] == "MOBILE" ? 'selected' : '' ?>>Home</option>
		<option value="OFFICE" <?= $data['type'] == "MOBILE" ? 'selected' : '' ?>>Office</option>
		<option value="OTHER" <?= $data['type'] == "MOBILE" ? 'selected' : '' ?>>Other</option>
	</select>
	<input type="text" name="number" class="input-small" placeholder="Phone Number" value="<?= $data['number'] ?>">

    <button type="submit" class="btn">Add Contact</button>

    <?php if(isset($errors)) { include('view/errors.php'); } ?>
</form>
<?php include('view/footer.php');
