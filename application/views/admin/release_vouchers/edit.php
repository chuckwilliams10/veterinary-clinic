<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Code</th>
			<td><input type="text" name="rev_code" size="12" maxlength="12" value="" /></td>
		</tr>
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
			<th>Admin Acc Id</th>
			<td><input type="text" name="rev_admin_acc_id" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Pet</th>
			<td>			
				<select name="pet_id">
				<?php
				foreach($pet_ids->result() as $pet_id) 
				{
					?>
					<option value="<?php echo $pet_id->pet_id; ?>"><?php echo $pet_id->acc_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Or Number</th>
			<td><input type="text" name="rev_or_number" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Datetime</th>
			<td><input type="text" name="rev_datetime" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th>Remarks</th>
			<td><textarea name="rev_remarks" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="rev_status">
					<option value="pending">pending</option>
					<option value="paid">paid</option>
					<option value="free">free</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Total</th>
			<td><input type="text" name="rev_total" value="" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/release_vouchers'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('rev_code', "<?php echo addslashes($release_voucher->rev_code); ?>");		
	$('form').floodling('acc_id', "<?php echo addslashes($release_voucher->acc_username); ?>");		
	$('form').floodling('rev_admin_acc_id', "<?php echo addslashes($release_voucher->rev_admin_acc_id); ?>");		
	$('form').floodling('pet_id', "<?php echo addslashes($release_voucher->acc_id); ?>");		
	$('form').floodling('rev_or_number', "<?php echo addslashes($release_voucher->rev_or_number); ?>");		
	$('form').floodling('rev_datetime', "<?php echo addslashes($release_voucher->rev_datetime); ?>");		
	$('form').floodling('rev_remarks', "<?php echo addslashes($release_voucher->rev_remarks); ?>");		
	$('form').floodling('rev_status', "<?php echo addslashes($release_voucher->rev_status); ?>");		
	$('form').floodling('rev_total', "<?php echo addslashes($release_voucher->rev_total); ?>");
});
</script>
