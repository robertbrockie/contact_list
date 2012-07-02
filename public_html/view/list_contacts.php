<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th><a href="index.php?action=list&field=last_name&order=asc"><i class="icon-arrow-up"></i></a>
				<a href="index.php?action=list&field=last_name&order=desc"><i class="icon-arrow-down"></i></a>
				Last Name
			</th>
			<th><a href="index.php?action=list&field=first_name&order=asc"><i class="icon-arrow-up"></i></a>
				<a href="index.php?action=list&field=first_name&order=desc"><i class="icon-arrow-down"></i></a>
				First Name</th>
			<th><a href="index.php?action=list&field=type&order=asc"><i class="icon-arrow-up"></i></a>
				<a href="index.php?action=list&field=type&order=desc"><i class="icon-arrow-down"></i></a>
				Type
			</th>
			<th><a href="index.php?action=list&field=number&order=asc"><i class="icon-arrow-up"></i></a>
				<a href="index.php?action=list&field=number&order=desc"><i class="icon-arrow-down"></i></a>
				Number
			</th>
			<th></th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($contacts as $contact) : ?>
		<tr id="row_<?= $contact->id ?>">
			<td id="last_name_<?= $contact->id ?>"><?= $contact->last_name ?></td>
			<td id="first_name_<?= $contact->id ?>"><?= $contact->first_name ?></td>
			<td id="type_<?= $contact->id ?>"><?= $contact->type ?></td>
			<td id="number_<?= $contact->id ?>"><?= $contact->number ?></td>
			<td><a href="/index.php?action=edit&id=<?= $contact->id ?>" onclick="EditContact(<?= $contact->id ?>); return false;">[edit]</a></td>
			<td><a href="/index.php?action=delete&id=<?= $contact->id ?>" onclick="DeleteContact(<?= $contact->id ?>); return false;">[remove]</a></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>