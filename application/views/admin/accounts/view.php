<form method="post">
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
			<th>First Name</th>
			<td><input type="text" required name="acc_first_name" value="<?php echo $account->acc_first_name; ?>"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required name="acc_last_name" value="<?php echo $account->acc_last_name; ?>"></td>
		</tr>

		<tr>
			<th>Status</th>
			<td>
				<span class="label <?php echo $account->acc_status == "locked" ? "label-important": "label-info"; ?>" style="
				    position: relative;
				    top: -3px;
				    padding: 7px;
				    height: 16px;
				    line-height: 19px;
				">
					<?php echo $account->acc_status; ?>
				</span>
				<select name="acc_status" required>
					<option>Select status</option>
					<option <?php echo $account->acc_status == "active" ? "selected": ""; ?> value="active">Active</option>
					<option <?php echo $account->acc_status == "locked" ? "selected": ""; ?> value="locked">Locked</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Account Type</th>
			<td>
				<?php if ($account->acc_type != "dev"): ?>

				<select name="acc_type" required>
					<option> select type</option>
					<option <?php echo $account->acc_type == "admin" ? "selected": ""; ?> value="admin">Admin</option>
					<option <?php echo $account->acc_type == "customer" ? "selected": ""; ?> value="customer">Customer</option>
				</select>
				<?php endif ?>
			</td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>
				<select name="acc_gender" required>
					<option>select gender</option>
					<option <?php echo ($account->acc_gender == "male") ? "selected" : "" ; ?> value="male">Male</option>
					<option <?php echo ($account->acc_gender == "female") ? "selected" : "" ; ?> value="female">Female</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Contact</th>
			<td>
				<input type="text" name="acc_contact" class="philcontact" maxlength="13" value="<?php echo $account->acc_contact; ?>" required>
			</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>
				<textarea name="acc_address" required><?php echo $account->acc_address; ?></textarea>
			</td>
		</tr>
		<tr>
			<th>Password</th>
			<td>
				<a href="<?php echo site_url('admin/accounts/reset_password/' . $account->acc_id); ?>">Reset Password</a>
			</td>
		</tr>
		<tr>
			<th></th>
			<td class="left">
				<input type="submit" value="update" name="submit" class="btn btn-primary">
			</td>
		</tr>
	</table>
</form>
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
				<td style="vertical-align: middle;"><?php echo $pet->spe_name; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->bre_name; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_gender; ?></td>
				<td style="vertical-align: middle;"><?php echo $pet->pet_status; ?></td>
				<td style="vertical-align: middle;"><?php echo format_date($pet->pet_date_of_birth, "F d, Y"); ?></td>
				<td style="vertical-align: middle;"><?php echo format_date($pet->pet_date_added, "F d, Y"); ?></td>
				<td style="vertical-align: middle;"><a href="<?php echo site_url("admin/pets/view/".$pet->pet_id); ?>" class="btn btn-secondary">View</a></td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>
</table>

<script type="text/javascript">
	$('textarea').keypress(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });
    $(".philcontact").philcontact();
</script>
