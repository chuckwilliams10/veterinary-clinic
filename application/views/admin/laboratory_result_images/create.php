<form method="post" enctype="multipart/form-data">
	<table class="table-form table-bordered"> 
		<tr>
			<th>Image</th>
			<td><input type="file" name="lri_image" size="80" maxlength="100" required accept="image/*" value="" /></td>
		</tr>  
		<tr>
			<th>Description</th>
			<td><textarea name="lri_description" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="hidden" name="lri_date_created" value="<?php echo date("Y-m-d H:i:s");?>" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/laboratory_result_images/index/'.$laboratory_id); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>