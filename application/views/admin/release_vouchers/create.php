<form method="post">
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
	</table>
	<hr>
	<table class="table-form table-bordered">
		<tr>
			<th>Code</th>
			<td>
				<input type="text" name="rev_code" readonly size="12" maxlength="12" value="<?php echo strtoupper(random_string('alnum', 12)); ?>" />
				<?php if ($pet): ?> 
					<input type="hidden" name="pet_id" value="<?php echo $pet->pet_id; ?>">
				<?php else: ?>
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
				<?php endif ?>	
			</td>
		</tr>  
		<tr>
			<th>Or Number</th>
			<td><input type="text" name="rev_or_number" readonly size="11" maxlength="11" value="<?php echo strtoupper(random_string('numeric', 11)); ?>" /></td>
		</tr> 
		<tr>
			<th>Remarks</th>
			<td><textarea name="rev_remarks" rows="5" cols="80">N/A</textarea></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="rev_status">
					<option value="pending">pending</option>
					<option selected value="paid">paid</option>
					<option value="free">free</option>
				</select>
			</td>
		</tr>
	</table>
	<hr>
	<h3>Line Items</h3>
	<?php $total = 0; ?>
	<?php foreach ($line_items as $key => $value): ?>

		<h4><?php echo $value->exm_name; ?></h4>
		<p><?php echo $value->lab_remark; ?></p>
		
		<table class="table table-bordered"> 
			<thead>
				<tr>
					<th class="left">Test Name</th>
					<th class="left">Normal Value</th> 
					<th class="left">Test Result</th>
					<th class="left">Test Remark</th>
				</tr>
			</thead>
			<tbody> 
				<?php foreach ($value->line_item as $ikey => $ivalue): ?>
				<tr>
					<td class="left"><?php echo $ivalue->lat_name ?></td>
					<td class="left"><?php echo $ivalue->lat_normal_value." ".$ivalue->lat_unit; ?></td> 
					<td class="left"><?php echo $ivalue->ltr_result." ".$ivalue->lat_unit;  ?></td>
					<td class="left"><?php echo $ivalue->ltr_remark; ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td class="right" colspan="4">
						<div class="control-group">
					  		<label class="control-label" for="inputWarning" style="display: inline-block;"><strong>Total: </strong></label>
					  		<div class="controls" style="display: inline-block; margin-top: 10px;"> 
								<input class="span1" type="text" readonly value="<?php echo number_format($value->exm_rate,2); ?>" name="rvl_value[<?php echo $value->exm_id; ?>]" style="top: 1px; position: relative;">
						    	<span class="help-inline"></span>
						  	</div>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
		<hr>
		<?php $total = $total + $value->exm_rate; ?>
	<?php endforeach; ?>
	
	<table class="table-form table-bordered">
		
		<tr> 
			<td class="right">
				<div class="control-group">
			  		<label class="control-label" for="inputWarning" style="display: inline-block;"><strong>Final Total: </strong></label>
			  		<div class="controls" style="display: inline-block; margin-top: 10px;">  
						<input class="span1" type="text" readonly value="<?php echo number_format($total,2); ?>" name="rev_total" style="top: 1px; position: relative;">
				    	<span class="help-inline"></span>
				  	</div>
				</div>
			</td>
		</tr>

		<tr> 
			<td class="right">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/release_vouchers'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>