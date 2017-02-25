<?php
if($breeds->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="bre_ids" /></th>
					<th>Species</th>
					<th>Name</th>
					<th>Other Names</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($breeds->result() as $breed)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="bre_ids[]" value="<?php echo $breed->bre_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/breeds/view/' . $breed->bre_id); ?>"><?php echo $breed->spe_name; ?></a></td>
					<td><?php echo $breed->bre_name; ?></td>
					<td><?php echo $breed->bre_other_names; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/breeds/edit/' . $breed->bre_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $breeds_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Breeds</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No breeds found.
	<?php
}
?>