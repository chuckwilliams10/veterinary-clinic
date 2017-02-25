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
					<option value="<?php echo $pet_id->pet_id; ?>"><?php echo $pet_id->pet_name; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Description</th>
			<td><textarea name="gro_description" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Cost</th>
			<td><input type="text" name="gro_cost" value="" /></td>
		</tr>
		<tr>
			<th>Datetime</th>
			<td><input type="text" name="gro_datetime" class="datetime" value="" /></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="gro_status">
					<option value="active">active</option>
					<option value="done">done</option>
					<option value="rejected">rejected</option>
					<option value=""></option>
				</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/groomings'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	$('form').floodling('pet_id', "<?php echo addslashes($grooming->acc_id); ?>");		
	$('form').floodling('gro_description', "<?php echo addslashes($grooming->gro_description); ?>");		
	$('form').floodling('gro_cost', "<?php echo addslashes(number_format($grooming->gro_cost,2)); ?>");		
	$('form').floodling('gro_datetime', "<?php echo addslashes($grooming->gro_datetime); ?>");		
	$('form').floodling('gro_status', "<?php echo addslashes($grooming->gro_status); ?>");
});
</script>
