<table class="table-form table-bordered">
	<tr>
		<th>Release Voucher</th>
		<td><?php echo $release_voucher_lineitem->rev_code; ?></td>
	</tr>
	<tr>
		<th>Laboratory Test Result</th>
		<td><?php echo number_format($release_voucher_lineitem->lab_id); ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/release_voucher_lineitems/edit/' . $release_voucher_lineitem->rvl_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/release_voucher_lineitems'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>