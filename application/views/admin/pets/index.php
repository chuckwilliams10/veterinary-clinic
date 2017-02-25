<?php
if($pets->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="pet_ids" /></th>
					<th>Image</th>
					<th>Owner</th>
					<th>Name</th>
					<th>Date Of Birth</th>
					<th>Species</th>
					<th>Status</th>
					<th>Date Added</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($pets->result() as $pet)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="pet_ids[]" value="<?php echo $pet->pet_id; ?>" /></td>
					<td class="center">
						<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?> " width="100">
					</td>
					<td><a href="<?php echo site_url('admin/pets/view/' . $pet->pet_id); ?>"><?php echo $pet->acc_first_name." ".$pet->acc_last_name; ?></a></td>
					<td><?php echo $pet->pet_name; ?></td>
					<td><?php echo format_date($pet->pet_date_of_birth); ?></td>
					<td>
						<?php echo $pet->spe_name; ?>
					 </td>
					<td>
						<?php 
							$labelclass = "success";
							switch ($pet->pet_status) {
								case 'dead':
									$labelclass = "inverse";
									break;
								case 'released':
									$labelclass = "important";
									break;
								case 'inactive':
									$labelclass = "info";
									break;
								default:
									$labelclass = "success";
									break;
							}
						?>
						<span class="label label-<?php echo $labelclass; ?>"><?php echo ucwords($pet->pet_status); ?></span>		
					</td>
					<td><?php echo format_date($pet->pet_date_added); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/pets/edit/' . $pet->pet_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $pets_pagination; ?>
		<!-- <div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Pets</option>
			</select>
		</div> -->
	</form>
	<?php
}
else
{
	?>
	No pets found.
	<?php
}
?>