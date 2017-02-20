<?php
if($examinations->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="exm_ids" /></th>
					<th>Code</th>
					<th>Name</th>
					<th>Description</th>
					<th>Rate</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($examinations->result() as $examination)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="exm_ids[]" value="<?php echo $examination->exm_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/examinations/view/' . $examination->exm_id); ?>"><?php echo $examination->exm_code; ?></a></td>
					<td><?php echo $examination->exm_name; ?></td>
					<td><?php echo nl2br($examination->exm_description); ?></td>
					<td><?php echo number_format($examination->exm_rate, 2); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/examinations/edit/' . $examination->exm_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $examinations_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Examinations</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No examinations found.
	<?php
}
?>