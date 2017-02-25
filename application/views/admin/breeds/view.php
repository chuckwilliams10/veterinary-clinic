<table class="table-form table-bordered">
	<tr>
		<th>Species</th>
		<td><?php echo $breed->spe_name; ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo $breed->bre_name; ?></td>
	</tr>
	<tr>
		<th>Other Names</th>
		<td><?php echo $breed->bre_other_names; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/breeds/edit/' . $breed->bre_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/breeds'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>