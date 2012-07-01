<?php include('view/header'); ?>

<div>
	<form action="index.php?action=edit" method="post" accept-charset="utf-8">
		<input type="hidden" name="id" value="<?= $contact->id ?>"/>

		<p>
			<label for="first_name">First Name:</label>
			<input type="text" maxlength="256" value="<?= $contact->first_name ?>"/>
		</p>

		<p>
			<label for="last_name">Last Name:</label>
			<input type="text" maxlength="256" value="<?= $contact->last_name ?>"/>
		</p>

		<p>
			<input type="submit" value="Add Contact"/>
		</p>

	</form>
</div>

<?php include('view/footer'); ?>