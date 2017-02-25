<table class="table-form table-bordered">
	<tr>
		<th>Name</th>
		<td><?php echo $species->spe_name; ?></td>
	</tr>
	<tr>
		<th>Common Name</th>
		<td><?php echo $species->spe_common_name; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/species/edit/' . $species->spe_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/species'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>