<table class="table-form table-bordered">
	<tr>
		<th>Code</th>
		<td><?php echo $examination->exm_code; ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo $examination->exm_name; ?></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><?php echo nl2br($examination->exm_description); ?></td>
	</tr>
	<tr>
		<th>Rate</th>
		<td><?php echo number_format($examination->exm_rate, 2); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $examination->exm_status; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/examinations/edit/' . $examination->exm_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/examinations'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>