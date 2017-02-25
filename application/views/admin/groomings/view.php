<table class="table-form table-bordered">
	<tr>
		<th>Pet</th>
		<td>
			<a href="<?php echo site_url("admin/pets/view/".$grooming->pet_id) ?>"><?php echo $grooming->pet_name; ?></a>
		</td>
	</tr>
	<tr>
		<th>Description</th>
		<td><?php echo nl2br($grooming->gro_description); ?></td>
	</tr>
	<tr>
		<th>Cost</th>
		<td><?php echo number_format($grooming->gro_cost, 2); ?></td>
	</tr>
	<tr>
		<th>Datetime</th>
		<td><?php echo format_datetime($grooming->gro_datetime); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $grooming->gro_status; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/groomings/edit/' . $grooming->gro_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/groomings'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>