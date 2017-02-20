<?php
if($medical_records->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="mer_ids" /></th>
					<th>Pet</th>
					<th>Height</th>
					<th>Height Unit</th>
					<th>Weight</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($medical_records->result() as $medical_record)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="mer_ids[]" value="<?php echo $medical_record->mer_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/medical_records/view/' . $medical_record->mer_id); ?>"><?php echo number_format($medical_record->acc_id); ?></a></td>
					<td><?php echo number_format($medical_record->mer_height, 2); ?></td>
					<td><?php echo $medical_record->mer_height_unit; ?></td>
					<td><?php echo number_format($medical_record->mer_weight, 2); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/medical_records/edit/' . $medical_record->mer_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $medical_records_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Medical Records</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No medical records found.
	<?php
}
?>