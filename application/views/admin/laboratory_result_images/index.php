<?php
if($laboratory_result_images->num_rows())
{
	?>

	<h3>Laboratory Result #<?php echo str_pad(number_format($laboratory_id),8,"0",STR_PAD_LEFT); ?></h3>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="lri_ids" /></th> 
					<th>Image</th>
					<th>Description</th>
					<th>Date Created</th> 
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($laboratory_result_images->result() as $laboratory_result_images)
			{
				?>
				<tr>
					<td class="center" style="width:5%;">
						<input type="checkbox" name="lri_ids[]" value="<?php echo $laboratory_result_images->lri_id; ?>" />
					</td>
					<td style="width:30%">
						<a href="<?php echo site_url('admin/laboratory_result_images/view/' . $laboratory_result_images->lri_id); ?>">
							<img src="<?php echo base_url("uploads/laboratory_results/".$laboratory_result_images->lri_image) ?>" width="200">
						</a>
					</td>
					<td style="width:50%">
						<?php echo $laboratory_result_images->lri_description; ?>
					</td>					
					<td style="width:15%"><?php echo format_datetime($laboratory_result_images->lri_date_created); ?></td>
					
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $laboratory_result_images_pagination; ?>
		<div class="row">
			<div class="choose-select pull-left">
				With selected:
				<select name="form_mode" class="select-submit">
					<option value="">choose...</option>
					<option value="delete">Delete Laboratory Result Images</option>
				</select>
			</div>
			<a style="position:relative; top: 15px;" href="<?php echo site_url('admin/pets/view/'.$laboratory_result_images->pet_id); ?>" class="btn pull-right">Back</a>
		</div>
	</form>
	<?php
}
else
{
	?>
	No laboratory result images found.
	<?php
}
?>