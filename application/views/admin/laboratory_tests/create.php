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
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_code">
				<?php
				foreach($lab_codes->result() as $lab_code) 
				{
					?>
					<option value="<?php echo $lab_code->lab_id; ?>"><?php echo $lab_code->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_name">
				<?php
				foreach($lab_names->result() as $lab_name) 
				{
					?>
					<option value="<?php echo $lab_name->lab_id; ?>"><?php echo $lab_name->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_sequence">
				<?php
				foreach($lab_sequences->result() as $lab_sequence) 
				{
					?>
					<option value="<?php echo $lab_sequence->lab_id; ?>"><?php echo $lab_sequence->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_unit">
				<?php
				foreach($lab_units->result() as $lab_unit) 
				{
					?>
					<option value="<?php echo $lab_unit->lab_id; ?>"><?php echo $lab_unit->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_normal_value">
				<?php
				foreach($lab_normal_values->result() as $lab_normal_value) 
				{
					?>
					<option value="<?php echo $lab_normal_value->lab_id; ?>"><?php echo $lab_normal_value->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_normal_value_start">
				<?php
				foreach($lab_normal_value_starts->result() as $lab_normal_value_start) 
				{
					?>
					<option value="<?php echo $lab_normal_value_start->lab_id; ?>"><?php echo $lab_normal_value_start->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_normal_value_end">
				<?php
				foreach($lab_normal_value_ends->result() as $lab_normal_value_end) 
				{
					?>
					<option value="<?php echo $lab_normal_value_end->lab_id; ?>"><?php echo $lab_normal_value_end->pet_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Results</th>
			<td>			
				<select name="lab_status">
				<?php
				foreach($lab_statuss->result() as $lab_status) 
				{
					?>
					<option value="<?php echo $lab_status->lab_id; ?>"><?php echo $lab_status->pet_id; ?></option>
					<?php
				}
				?>
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