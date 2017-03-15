<table class="table-form table-bordered">
	<tr>
		<th>Laboratory Result ID</th>
		<td>
			<?php //echo number_format($laboratory_result_images->pet_id); ?>
			<?php echo str_pad(number_format($laboratory_result_images->lab_id),8,"0",STR_PAD_LEFT); ?>
		</td>
	</tr>
	<tr>
		<th>Image</th>
		<td> 
			<img src="<?php echo base_url("uploads/laboratory_results/".$laboratory_result_images->lri_image) ?>" style="width:100%">
		</td>
	</tr> 
	<tr>
		<th>Description</th>
		<td><?php echo nl2br($laboratory_result_images->lri_description); ?></td>
	</tr>
	<tr>
		<th>Date Created</th>
		<td><?php echo format_datetime($laboratory_result_images->lri_date_created); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<!--<a href="<?php echo site_url('admin/laboratory_result_images/edit/' . $laboratory_result_images->lri_id); ?>" class="btn btn-primary">Edit</a>-->
			<a href="<?php echo site_url('admin/laboratory_result_images/index/'.$laboratory_result_images->lab_id); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>