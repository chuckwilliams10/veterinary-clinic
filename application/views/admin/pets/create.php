<form method="post" enctype="multipart/form-data">
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
			<th>Image</th>
			<td><input type="file" name="pet_image"></td>
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
			<td>
				<select name="pet_gender">
					<option>Select Gender</option>
					<option value="female">Female</option>
					<option value="male">Male</option>
				</select>
			</td>
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
				<select name="pet_status" id="pet_status">
					<option value="active">active</option>
					<option value="inactive">inactive</option>
					<!-- <option value="dead">dead</option> -->
				</select>
			</td>
		</tr> 
		<tr>
			<th>Date Added</th>
			<td><input type="text" name="pet_date_added" class="date" value="<?php echo date("Y-m-d"); ?>" /></td>
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

<script type="text/javascript">
	$("#pet_status").change(function(){
		if ($(this).val() == "dead") {
			$('.death-data').show();
		}else{
			$('.death-data').hide();
		}
	});
</script>