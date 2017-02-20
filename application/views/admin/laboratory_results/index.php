<?php
if($laboratory_results->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="lab_ids" /></th>
					<th>Pet</th>
					<th>Examination</th>
					<th>Result</th>
					<th>Normal Value</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($laboratory_results->result() as $laboratory_results)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="lab_ids[]" value="<?php echo $laboratory_results->lab_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/laboratory_results/view/' . $laboratory_results->lab_id); ?>"><?php echo $laboratory_results->pet_name; ?></a></td>
					<td><?php echo $laboratory_results->exm_code; ?></td>
					<td><?php echo number_format($laboratory_results->lab_result); ?></td>
					<td><?php echo number_format($laboratory_results->lab_normal_value, 2); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/laboratory_results/edit/' . $laboratory_results->lab_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $laboratory_results_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Laboratory Results</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No laboratory results found.
	<?php
}
?>