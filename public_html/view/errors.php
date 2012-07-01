<?php if(count($errors) > 0) { ?>
	<div class="alert alert-error">
		<button class="close" data-dismiss="alert">×</button>
		<?php foreach (array_values($errors) as $message) { ?>
			<p><?= $message ?></p>
		<?php } ?>
    </div>
<?php } ?>