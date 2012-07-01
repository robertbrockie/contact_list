<h1>Contact List</h1>

<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Type</th>
			<th>Number</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($contacts as $contact) : ?>
		<tr>
			<td><?= $contact->last_name ?></td>
			<td><?= $contact->first_name ?></td>
			<td><?= $contact->type ?></td>
			<td><?= $contact->number ?></td>
			<td>[x]</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>