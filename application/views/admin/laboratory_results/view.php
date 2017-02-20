<table class="table-form table-bordered">
	<tr>
		<th>Pet</th>
		<td><?php echo number_format($laboratory_results->acc_id); ?></td>
	</tr>
	<tr>
		<th>Examination</th>
		<td><?php echo $laboratory_results->exm_code; ?></td>
	</tr>
	<tr>
		<th>Laboratory Test</th>
		<td><?php echo number_format($laboratory_results->exm_id); ?></td>
	</tr>
	<tr>
		<th>Result</th>
		<td><?php echo number_format($laboratory_results->lab_result); ?></td>
	</tr>
	<tr>
		<th>Date</th>
		<td><?php echo format_datetime($laboratory_results->lab_date); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $laboratory_results->lab_status; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/laboratory_results/edit/' . $laboratory_results->lab_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/laboratory_results'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>