<table class="table-form table-bordered">
	<tr>
		<th>Code</th>
		<td><?php echo $release_voucher->rev_code; ?></td>
	</tr>
	<tr>
		<th>Account</th>
		<td><?php echo $release_voucher->acc_username; ?></td>
	</tr>
	<tr>
		<th>Admin Account</th>
		<td><?php echo $release_voucher->rev_acc_first_name." ".$release_voucher->rev_acc_last_name; ?></td>
	</tr>
	<tr>
		<th>Pet</th>
		<td><?php echo $release_voucher->pet_name; ?></td>
	</tr>
	<tr>
		<th>Or Number</th>
		<td><?php echo number_format($release_voucher->rev_or_number); ?></td>
	</tr>
	<tr>
		<th>Datetime</th>
		<td><?php echo format_datetime($release_voucher->rev_datetime); ?></td>
	</tr>
	<tr>
		<th>Remarks</th>
		<td><?php echo nl2br($release_voucher->rev_remarks); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $release_voucher->rev_status; ?></td>
	</tr>
	<tr>
		<th>Total</th>
		<td><?php echo number_format($release_voucher->rev_total, 2); ?></td>
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
			<?php if ($release_voucher->rev_emailed == 0): ?>
                <a href="<?php echo site_url('admin/release_vouchers/email_to_account/'.$release_voucher->rev_id) ?>" class="btn btn-info">Email to Customer</a>
            <?php endif ?>
			<a href="<?php echo site_url('admin/release_vouchers'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table> 