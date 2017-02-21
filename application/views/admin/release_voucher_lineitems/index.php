<?php
if($release_voucher_lineitems->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="rvl_ids" /></th>
					<th>Release Voucher</th>
					<th>Laboratory Test Result</th>
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($release_voucher_lineitems->result() as $release_voucher_lineitem)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="rvl_ids[]" value="<?php echo $release_voucher_lineitem->rvl_id; ?>" /></td>
					<td><a href="<?php echo site_url('admin/release_voucher_lineitems/view/' . $release_voucher_lineitem->rvl_id); ?>"><?php echo $release_voucher_lineitem->rev_code; ?></a></td>
					<td><?php echo number_format($release_voucher_lineitem->lab_id); ?></td>
					<td class="center"><a href="<?php echo site_url('admin/release_voucher_lineitems/edit/' . $release_voucher_lineitem->rvl_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $release_voucher_lineitems_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Release Voucher Lineitems</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No release voucher lineitems found.
	<?php
}
?>