<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Examination</th>
			<td>			
				<select name="exm_id">
				<?php
				foreach($exm_ids->result() as $exm_id) 
				{
					?>
					<option value="<?php echo $exm_id->exm_id; ?>"><?php echo $exm_id->exm_code; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Code</th>
			<td><input type="text" name="lat_code" size="12" maxlength="12" value="" /></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="lat_name" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Sequence</th>
			<td><input type="text" name="lat_sequence" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Unit</th>
			<td><input type="text" name="lat_unit" size="10" maxlength="10" value="" /></td>
		</tr>
		<tr>
			<th>Normal Value</th>
			<td><input type="text" name="lat_normal_value" size="10" maxlength="10" value="" /></td>
		</tr>
		<tr>
			<th>Normal Value Start</th>
			<td><input type="text" name="lat_normal_value_start" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Normal Value End</th>
			<td><input type="text" name="lat_normal_value_end" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="lat_status">
					<option value="active">active</option>
					<option value="inactive">inactive</option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/laboratory_tests'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>