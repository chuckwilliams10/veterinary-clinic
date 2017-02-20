<form method="post">
	<table class="table-form table-bordered">
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
			<th>Examination</th>
			<td>			
				<select name="exm_id">
				<?php
				foreach($exm_ids->result() as $exm_id) 
				{
					?>
					<option value="<?php echo $exm_id->exm_id; ?>"><?php echo $exm_id->exm_code; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Laboratory Test</th>
			<td>			
				<select name="lat_id">
				<?php
				foreach($lat_ids->result() as $lat_id) 
				{
					?>
					<option value="<?php echo $lat_id->lat_id; ?>"><?php echo $lat_id->exm_id; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Result</th>
			<td><input type="text" name="lab_result" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><input type="text" name="lab_date" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="lab_status">
					<option value="done">done</option>
					<option value="ongoing">ongoing</option>
					<option value="undone">undone</option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/laboratory_results'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('pet_id', "<?php echo addslashes($laboratory_results->acc_id); ?>");		
	$('form').floodling('exm_id', "<?php echo addslashes($laboratory_results->exm_code); ?>");		
	$('form').floodling('lat_id', "<?php echo addslashes($laboratory_results->exm_id); ?>");		
	$('form').floodling('lab_result', "<?php echo addslashes($laboratory_results->lab_result); ?>");		
	$('form').floodling('lab_date', "<?php echo addslashes($laboratory_results->lab_date); ?>");		
	$('form').floodling('lab_status', "<?php echo addslashes($laboratory_results->lab_status); ?>");
});
</script>
