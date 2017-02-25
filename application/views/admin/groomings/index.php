<?php
if($groomings->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="gro_ids" /></th>
					<th>Pet</th>
					<th>Customer</th> 
					<th>Cost</th>
					<th>Datetime</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($groomings->result() as $grooming)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="gro_ids[]" value="<?php echo $grooming->gro_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/groomings/view/' . $grooming->gro_id); ?>"><?php echo $grooming->pet_name; ?></a></td>
		 			<td><?php echo $grooming->acc_first_name." ".$grooming->acc_last_name; ?></td>
					<td><?php echo "Php ".number_format($grooming->gro_cost, 2); ?></td>
					<td><?php echo format_datetime($grooming->gro_datetime); ?></td>
					<td>
						<?php 
							$labelclass = "success";
							switch ($grooming->gro_status) { 
								case 'rejected':
									$labelclass = "important";
									break;
								case 'done':
									$labelclass = "info";
									break;
								default:
									$labelclass = "success";
									break;
							}
						?>
						<span class="label label-<?php echo $labelclass; ?>"><?php echo ucwords($grooming->gro_status); ?></span>	
					</td>
					<td class="center"><a href="<?php echo site_url('admin/groomings/edit/' . $grooming->gro_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $groomings_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Groomings</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No groomings found.
	<?php
}
?>