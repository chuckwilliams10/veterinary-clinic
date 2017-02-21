<table class="table-form table-bordered">
	<tr>
		<th>Image</th>
		<td>
			<img src="<?php echo base_url("uploads/banners/".$banner->bnr_image) ?>"><br>
			<input type="file" name="bnr_image" />
		</td>
	</tr> 
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/banners/edit/' . $banner->bnr_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/banners'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>