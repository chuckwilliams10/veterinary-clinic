<table class="table-form table-bordered">
	<tr>
		<th>Code</th>
		<td><?php echo $release_voucher->rev_code; ?></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo $release_voucher->; ?></td>
	</tr>
	<tr>
		<th>Admin Acc Id</th>
		<td><?php echo number_format($release_voucher->rev_admin_acc_id); ?></td>
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
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/release_vouchers/edit/' . $release_voucher->rev_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/release_vouchers'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>