<?php
if($release_vouchers->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="rev_ids" /></th>
					<th>Code</th>
					<th></th>
					<th>Admin Acc Id</th>
					<th>Or Number</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($release_vouchers->result() as $release_voucher)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="rev_ids[]" value="<?php echo $release_voucher->rev_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/release_vouchers/view/' . $release_voucher->rev_id); ?>"><?php echo $release_voucher->rev_code; ?></a></td>
					<td><?php echo $release_voucher->; ?></td>
					<td><?php echo number_format($release_voucher->rev_admin_acc_id); ?></td>
					<td><?php echo number_format($release_voucher->rev_or_number); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/release_vouchers/edit/' . $release_voucher->rev_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $release_vouchers_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Release Vouchers</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No release vouchers found.
	<?php
}
?>