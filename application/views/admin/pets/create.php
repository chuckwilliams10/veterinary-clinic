<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Account</th>
			<td>			
				<select name="acc_id">
				<?php
				foreach($acc_ids->result() as $acc_id) 
				{
					?>
					<option value="<?php echo $acc_id->acc_id; ?>"><?php echo $acc_id->acc_username; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="pet_name" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Date Of Birth</th>
			<td><input type="text" name="pet_date_of_birth" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Species</th>
			<td>
				<select name="pet_species">
					<option value="Feline">Feline</option>
					<option value="Canine">Canine</option>
					<option value="Others">Others</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Breed</th>
			<td><input type="text" name="pet_breed" size="80" maxlength="120" value="" /></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="text" name="pet_gender" size="80" maxlength="120" value="" /></td>
		</tr>
		<tr>
			<th>Color</th>
			<td><input type="text" name="pet_color" size="80" maxlength="120" value="" /></td>
		</tr>
		<tr>
			<th>Remarks</th>
			<td><textarea name="pet_remarks" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="pet_status">
					<option value="active">active</option>
					<option value="inactive">inactive</option>
					<option value="dead">dead</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Date Added</th>
			<td><input type="text" name="pet_date_added" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Death Datetime</th>
			<td><input type="text" name="pet_death_datetime" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th>Cause Of Death</th>
			<td><textarea name="pet_cause_of_death" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/pets'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>