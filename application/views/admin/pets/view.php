<table class="table-form table-bordered">
	<tr>
		<th>Account</th>
		<td><?php echo $pet->acc_username; ?></td>
	</tr>
	<tr>
		<th>Image</th>
		<td>
			<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?> ">
		</td>
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
		<td><?php echo $pet->spe_name."(".$pet->spe_common_name.")"; ?></td>
	</tr>
	<tr>
		<th>Breed</th>
		<td><?php echo $pet->bre_name."(".$pet->bre_other_names.")"; ?></td>
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
	<?php if ( $pet->pet_status == "dead"): ?>
		<tr>
			<th>Death Datetime</th>
			<td><?php echo format_datetime($pet->pet_death_datetime); ?></td>
		</tr>
		<tr>
			<th>Cause Of Death</th>
			<td><?php echo nl2br($pet->pet_cause_of_death); ?></td>
		</tr>
	<?php endif ?>
	<tr>
		<th>Date Added</th>
		<td><?php echo format_date($pet->pet_date_added); ?></td>
	</tr>
	
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/pets/edit/' . $pet->pet_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/pets'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>

<div class="row">
	<div class="span10">
		<div class="pull-left"><h3>Medical Record</h3></div> 
		<?php foreach ($medical_records->result() as $medical_record): ?>
			<table class="table-form table-bordered"> 
				<tr>
					<th>Date</th>
					<td><?php echo format_datetime($medical_record->mer_date); ?></td>
				</tr> 
				<tr>
					<th>Height</th>
					<td><?php echo number_format($medical_record->mer_height, 2)." ".$medical_record->mer_height_unit; ?></td>
				</tr> 
				<tr>
					<th>Weight</th>
					<td><?php echo number_format($medical_record->mer_weight, 2)." ".$medical_record->mer_weight_unit; ?></td>
				</tr> 
				<tr>
					<th>Temperature</th>
					<td><?php echo number_format($medical_record->mer_temperature, 2)." ".$medical_record->mer_temperature_unit; ?></td>
				</tr> 
				<tr>
					<th>Heartrate</th>
					<td><?php echo number_format($medical_record->mer_heartrate); ?></td>
				</tr>
				<tr>
					<th>Nose</th>
					<td><?php echo nl2br($medical_record->mer_nose); ?></td>
				</tr>
				<tr>
					<th>Skin</th>
					<td><?php echo nl2br($medical_record->mer_skin); ?></td>
				</tr>
				<tr>
					<th>Anus</th>
					<td><?php echo nl2br($medical_record->mer_anus); ?></td>
				</tr>
				<tr>
					<th>Throat</th>
					<td><?php echo nl2br($medical_record->mer_throat); ?></td>
				</tr>
				<tr>
					<th>Fecal</th>
					<td><?php echo nl2br($medical_record->mer_fecal); ?></td>
				</tr>
				<tr>
					<th>Mouth</th>
					<td><?php echo nl2br($medical_record->mer_mouth); ?></td>
				</tr>
				<tr>
					<th>Lower Abdomen</th>
					<td><?php echo nl2br($medical_record->mer_lower_abdomen); ?></td>
				</tr>
				<tr>
					<th>Upper Abdomen</th>
					<td><?php echo nl2br($medical_record->mer_upper_abdomen); ?></td>
				</tr>
				<tr>
					<th>Limbs</th>
					<td><?php echo nl2br($medical_record->mer_limbs); ?></td>
				</tr>
				<tr>
					<th>Other Remarks</th>
					<td><?php echo nl2br($medical_record->mer_other_remarks); ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<td><?php echo nl2br($medical_record->mer_status); ?></td>
				</tr>
			</table>
		<?php endforeach ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="span10">
		<div class="pull-left"><h3>Services Results</h3></div>
		<div class="create-result">
			<div class="page-nav">
				<?php if ($pet->pet_status == "active"): ?>
				<ul class="nav nav-pills pull-right">
					<li><a href="<?php echo site_url("admin/laboratory_results/create/".$pet->pet_id); ?>">Add Laboratory Service</a></li>
				</ul>
				<?php endif ?>	
			</div>
		</div>
	</div>
	<div class="span10">
		<?php echo $lab_index; ?>
	</div>
	<hr class="span10">
	<div class="create-result">
		<div class="page-nav">
			<ul class="nav nav-pills pull-right">
				<?php if ($pet->pet_status != "active"): ?>
					<li><span class="label label-danger"><?php echo ucwords($pet->pet_status); ?></span></li>
				<?php else: ?>
					<?php if ($laboratory_results->num_rows() > 0): ?>
						<li><a href="<?php echo site_url("admin/release_vouchers/pdf/".$pet->pet_id); ?>">Generate Voucher</a></li>
						<li><a href="<?php echo site_url("admin/release_vouchers/create/".$pet->pet_id); ?>">Release Pet</a></li>
					<?php endif ?>
				<?php endif ?>
			</ul>
		</div>
	</div>
</div>
<br>
