<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Release Voucher</th>
			<td>			
				<select name="rev_id">
				<?php
				foreach($rev_ids->result() as $rev_id) 
				{
					?>
					<option value="<?php echo $rev_id->rev_id; ?>"><?php echo $rev_id->rev_code; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Test Result</th>
			<td>			
				<select name="ltr_id">
				<?php
				foreach($ltr_ids->result() as $ltr_id) 
				{
					?>
					<option value="<?php echo $ltr_id->ltr_id; ?>"><?php echo $ltr_id->lab_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/release_voucher_lineitems'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>