<?php
if($laboratory_tests->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="lat_ids" /></th>
					<th>Examination</th>
					<th>Code</th>
					<th>Name</th>
					<th>Sequence</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($laboratory_tests->result() as $laboratory_test)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="lat_ids[]" value="<?php echo $laboratory_test->lat_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/laboratory_tests/view/' . $laboratory_test->lat_id); ?>"><?php echo $laboratory_test->exm_name; ?></a></td>
					<td><?php echo $laboratory_test->lat_code; ?></td>
					<td><?php echo $laboratory_test->lat_name; ?></td>
					<td><?php echo number_format($laboratory_test->lat_sequence); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/laboratory_tests/edit/' . $laboratory_test->lat_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $laboratory_tests_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Laboratory Tests</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No laboratory tests found.
	<?php
}
?>