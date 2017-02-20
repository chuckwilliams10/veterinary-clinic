<table class="table-form table-bordered">
	<tr>
		<th>Image</th>
		<td><?php echo $banner->bnr_image; ?></td>
	</tr>
	<tr>
		<th>Image Thumb</th>
		<td><?php echo $banner->bnr_image_thumb; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/banners/edit/' . $banner->bnr_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/banners'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>