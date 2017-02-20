<table class="table-form table-bordered">
	<tr>
		<th>Examination</th>
		<td><?php echo $laboratory_test->exm_code; ?></td>
	</tr>
	<tr>
		<th>Code</th>
		<td><?php echo $laboratory_test->lat_code; ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo $laboratory_test->lat_name; ?></td>
	</tr>
	<tr>
		<th>Sequence</th>
		<td><?php echo number_format($laboratory_test->lat_sequence); ?></td>
	</tr>
	<tr>
		<th>Unit</th>
		<td><?php echo $laboratory_test->lat_unit; ?></td>
	</tr>
	<tr>
		<th>Normal Value</th>
		<td><?php echo $laboratory_test->lat_normal_value; ?></td>
	</tr>
	<tr>
		<th>Normal Value Start</th>
		<td><?php echo number_format($laboratory_test->lat_normal_value_start); ?></td>
	</tr>
	<tr>
		<th>Normal Value End</th>
		<td><?php echo number_format($laboratory_test->lat_normal_value_end); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $laboratory_test->lat_status; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/laboratory_tests/edit/' . $laboratory_test->lat_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/laboratory_tests'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>