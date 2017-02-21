<form method="post" enctype="multipart/form-data">
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
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/banners'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		 
});
</script>
