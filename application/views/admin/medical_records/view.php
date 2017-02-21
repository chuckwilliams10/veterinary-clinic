<table class="table-form table-bordered">
	<tr>
		<th>Pet</th>
		<td><?php echo number_format($medical_record->acc_id); ?></td>
	</tr>
	<tr>
		<th>Height</th>
		<td><?php echo number_format($medical_record->mer_height, 2); ?></td>
	</tr>
	<tr>
		<th>Height Unit</th>
		<td><?php echo $medical_record->mer_height_unit; ?></td>
	</tr>
	<tr>
		<th>Weight</th>
		<td><?php echo number_format($medical_record->mer_weight, 2); ?></td>
	</tr>
	<tr>
		<th>Weight Unit</th>
		<td><?php echo $medical_record->mer_weight_unit; ?></td>
	</tr>
	<tr>
		<th>Temperature</th>
		<td><?php echo number_format($medical_record->mer_temperature, 2); ?></td>
	</tr>
	<tr>
		<th>Temperature Unit</th>
		<td><?php echo $medical_record->mer_temperature_unit; ?></td>
	</tr>
	<tr>
		<th>Heartrate</th>
		<td><?php echo number_format($medical_record->mer_heartrate); ?></td>
	</tr>
	<tr>
		<th>Nose</th>
		<td><?php echo nl2br($medical_record->mer_nose); ?></td>
	</tr>
	<tr>
		<th>Skin</th>
		<td><?php echo nl2br($medical_record->mer_skin); ?></td>
	</tr>
	<tr>
		<th>Anus</th>
		<td><?php echo nl2br($medical_record->mer_anus); ?></td>
	</tr>
	<tr>
		<th>Throat</th>
		<td><?php echo nl2br($medical_record->mer_throat); ?></td>
	</tr>
	<tr>
		<th>Fecal</th>
		<td><?php echo nl2br($medical_record->mer_fecal); ?></td>
	</tr>
	<tr>
		<th>Mouth</th>
		<td><?php echo nl2br($medical_record->mer_mouth); ?></td>
	</tr>
	<tr>
		<th>Lower Abdomen</th>
		<td><?php echo nl2br($medical_record->mer_lower_abdomen); ?></td>
	</tr>
	<tr>
		<th>Upper Abdomen</th>
		<td><?php echo nl2br($medical_record->mer_upper_abdomen); ?></td>
	</tr>
	<tr>
		<th>Limbs</th>
		<td><?php echo nl2br($medical_record->mer_limbs); ?></td>
	</tr>
	<tr>
		<th>Other Remarks</th>
		<td><?php echo nl2br($medical_record->mer_other_remarks); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo nl2br($medical_record->mer_status); ?></td>
	</tr>
	<tr>
		<th>Date</th>
		<td><?php echo format_datetime($medical_record->mer_date); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/medical_records/edit/' . $medical_record->mer_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/medical_records'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>