<table class="table-form table-bordered">
	<tr>
		<th>Account</th>
		<td><?php echo $pet->acc_username; ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo $pet->pet_name; ?></td>
	</tr>
	<tr>
		<th>Date Of Birth</th>
		<td><?php echo format_date($pet->pet_date_of_birth); ?></td>
	</tr>
	<tr>
		<th>Species</th>
		<td><?php echo $pet->pet_species; ?></td>
	</tr>
	<tr>
		<th>Breed</th>
		<td><?php echo $pet->pet_breed; ?></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td><?php echo $pet->pet_gender; ?></td>
	</tr>
	<tr>
		<th>Color</th>
		<td><?php echo $pet->pet_color; ?></td>
	</tr>
	<tr>
		<th>Remarks</th>
		<td><?php echo nl2br($pet->pet_remarks); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $pet->pet_status; ?></td>
	</tr>
	<tr>
		<th>Date Added</th>
		<td><?php echo format_date($pet->pet_date_added); ?></td>
	</tr>
	<tr>
		<th>Death Datetime</th>
		<td><?php echo format_datetime($pet->pet_death_datetime); ?></td>
	</tr>
	<tr>
		<th>Cause Of Death</th>
		<td><?php echo nl2br($pet->pet_cause_of_death); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/pets/edit/' . $pet->pet_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/pets'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>