<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Image</th>
			<td><input type="text" name="bnr_image" size="80" maxlength="200" value="" /></td>
		</tr>
		<tr>
			<th>Image Thumb</th>
			<td><input type="text" name="bnr_image_thumb" size="80" maxlength="200" value="" /></td>
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
	$('form').floodling('bnr_image', "<?php echo addslashes($banner->bnr_image); ?>");		
	$('form').floodling('bnr_image_thumb', "<?php echo addslashes($banner->bnr_image_thumb); ?>");
});
</script>
