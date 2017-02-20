<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Pet</th>
			<td>			
				<select name="pet_id">
				<?php
				foreach($pet_ids->result() as $pet_id) 
				{
					?>
					<option value="<?php echo $pet_id->pet_id; ?>"><?php echo $pet_id->pet_name; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
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
			<th>Result</th>
			<td><input type="text" name="lab_result" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Normal Value</th>
			<td><input type="text" name="lab_normal_value" value="" /></td>
		</tr>
		<tr>
			<th>Normal Value Start</th>
			<td><input type="text" name="lab_normal_value_start" value="" /></td>
		</tr>
		<tr>
			<th>Sequence</th>
			<td><input type="text" name="lab_sequence" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Remarks</th>
			<td><textarea name="lab_remarks" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><input type="text" name="lab_date" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="lab_status">
					<option value="done">done</option>
					<option value="ongoing">ongoing</option>
					<option value="undone">undone</option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/laboratory_results'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>