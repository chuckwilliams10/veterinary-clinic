<?php
if($accounts->num_rows())
{
	?>
	<form method="post">
		<?php
		// Add the CSS class table-list to make it sortable with search and pagination.
		// To prevent a column from sorting, add the class skip-sort in the column.
		?>
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="acc_ids" /></th>
					<th>Email</th>
					<th style="width: 250px;">Name</th>
					<th style="width: 100px;">Account Type</th>
					<th style="width: 80px;">Status</th>
				</tr>
			</thead>
			<tbody>			
		<?php
		foreach($accounts->result() as $account)
		{
			?>
			<tr>
				<td class="center">
					<?php if ($account->acc_type == "customer"): ?>
						<input type="checkbox" name="acc_ids[]" value="<?php echo $account->acc_id; ?>" />
					<?php endif ?>
				</td>		
				<td><a href="<?php echo site_url('admin/accounts/view/' . $account->acc_id); ?>"><?php echo $account->acc_username; ?></a></td>
				<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>		
				<td><?php echo $account->acc_type; ?></td>		
				<td>
					<span class="label <?php echo $account->acc_status == "locked" ? "label-important": "label-info"; ?>">
						<?php echo $account->acc_status; ?>
					</span>
				</td>
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
		<?php echo $accounts_pagination; ?>
		<div class="choose-select">
			With selected: 
			<select name="acc_status" class="select-submit">
				<option value="">Update Status</option>
				<option value="active">Active</option>
				<option value="locked">Locked</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No accounts found.
	<?php
}

?>