<form method="post" enctype="multipart/form-data">
	<table class="table-form table-bordered">
		<tr>
			<th>Image</th>
			<td><input type="file" name="bnr_image" accept="image/*"  /></td>
		</tr> 
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/banners'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>