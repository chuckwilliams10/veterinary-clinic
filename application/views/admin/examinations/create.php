<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Code</th>
			<td><input type="text" name="exm_code" size="80" maxlength="200" value="" /></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="exm_name" size="80" maxlength="200" value="" /></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="exm_description" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Rate</th>
			<td><input type="text" name="exm_rate" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="exm_status">
					<option value="active">active</option>
					<option value="inactive">inactive</option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/examinations'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>