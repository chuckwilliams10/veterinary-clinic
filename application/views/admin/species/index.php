<?php
if($species->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="spe_ids" /></th>
					<th>Name</th>
					<th>Common Name</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($species->result() as $species)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="spe_ids[]" value="<?php echo $species->spe_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/species/view/' . $species->spe_id); ?>"><?php echo $species->spe_name; ?></a></td>
					<td><?php echo $species->spe_common_name; ?></td>
					<td class="center"><a href="<?php echo site_url('admin/species/edit/' . $species->spe_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $species_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Species</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No species found.
	<?php
}
?>