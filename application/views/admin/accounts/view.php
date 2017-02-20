<table class="table-form table-bordered">
	<tr>
		<th>Email</th>
		<td><?php echo $account->acc_username; ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>
	</tr>
	<tr>
		<th>Account Type</th>
		<td><?php echo $account->acc_type; ?></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td><?php echo $account->acc_gender; ?></td>
	</tr>
	<tr>
		<th>Contact</th>
		<td><?php echo $account->acc_contact; ?></td>
	</tr>
	<tr>
		<th>Contact</th>
		<td><?php echo $account->acc_address; ?></td>
	</tr>
	<tr>
		<th>Password</th>
		<td>
			<a href="<?php echo site_url('admin/accounts/reset_password/' . $account->acc_id); ?>">Reset Password</a>
		</td>
	</tr>
</table>
<h3>Pets</h3>
<table class="table table-bordered">
	<thead>
		<th></th>
		<th>Name</th>
		<th>Species</th>
		<th>Breed</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Date of Birth</th>
		<th>Date Added</th>
	</thead>
	<?php if ($pets->num_rows() > 0): ?>
		<?php foreach ($pets->result() as $pet): ?>
			<tr>
				<td style="vertical-align: middle;">
					<a href="<?php echo site_url("admin/pets/view/".$pet->pet_id); ?>">
						<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?>" width="50">
					</a>
				</td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_name; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_species; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_breed; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_gender; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_status; ?></td>
				<td style="vertical-align: middle;"><?php echo format_date($pet->pet_date_of_birth, "F d, Y"); ?></td>
				<td style="vertical-align: middle;"><?php echo format_date($pet->pet_date_added, "F d, Y"); ?></td>
				<td style="vertical-align: middle;"><a href="<?php echo site_url("admin/pets/view/".$pet->pet_id); ?>" class="btn btn-secondary">View</a></td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>
</table>