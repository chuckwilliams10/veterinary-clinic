<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_id">
				<?php
				foreach($lab_ids->result() as $lab_id) 
				{
					?>
					<option value="<?php echo $lab_id->lab_id; ?>"><?php echo $lab_id->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="text" name="lri_image" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Image Thumb</th>
			<td><input type="text" name="lri_image_thumb" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Image Original</th>
			<td><input type="text" name="lri_image_original" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="lri_description" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Date Created</th>
			<td><input type="text" name="lri_date_created" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/laboratory_result_images'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('lab_id', "<?php echo addslashes($laboratory_result_images->pet_id); ?>");		
	$('form').floodling('lri_image', "<?php echo addslashes($laboratory_result_images->lri_image); ?>");		
	$('form').floodling('lri_image_thumb', "<?php echo addslashes($laboratory_result_images->lri_image_thumb); ?>");		
	$('form').floodling('lri_image_original', "<?php echo addslashes($laboratory_result_images->lri_image_original); ?>");		
	$('form').floodling('lri_description', "<?php echo addslashes($laboratory_result_images->lri_description); ?>");		
	$('form').floodling('lri_date_created', "<?php echo addslashes($laboratory_result_images->lri_date_created); ?>");
});
</script>
