<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Species</th>
			<td>			
				<select name="spe_id">
				<?php
				foreach($spe_ids->result() as $spe_id) 
				{
					?>
					<option value="<?php echo $spe_id->spe_id; ?>"><?php echo $spe_id->spe_name; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="bre_name" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Other Names</th>
			<td><input type="text" name="bre_other_names" size="80" maxlength="300" value="" /></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/breeds'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>