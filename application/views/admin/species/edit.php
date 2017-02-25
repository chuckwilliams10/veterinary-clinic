<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Name</th>
			<td><input type="text" name="spe_name" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Common Name</th>
			<td><input type="text" name="spe_common_name" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/species'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('spe_name', "<?php echo addslashes($species->spe_name); ?>");		
	$('form').floodling('spe_common_name', "<?php echo addslashes($species->spe_common_name); ?>");
});
</script>
