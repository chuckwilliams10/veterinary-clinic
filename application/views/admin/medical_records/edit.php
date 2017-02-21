<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Pet</th>
			<td>			
				<?php echo $medical_record->pet_name; ?>
				<input type="hidden" name="pet_id" value="<?php echo $medical_record->pet_id; ?>"> 
			</td>
		</tr>
		<tr>
			<th>Height</th>
			<td><input type="text" name="mer_height" value="" /></td>
		</tr>
		<tr>
			<th>Height Unit</th>
			<td>
				<select name="mer_height_unit">
					<option value="inch(es)">inch(es)</option>
					<option value="foot/feet">foot/feet</option>
					<option value="centimeters">centimeters</option>
					<option value="meters">meters</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Weight</th>
			<td><input type="text" name="mer_weight" value="" /></td>
		</tr>
		<tr>
			<th>Weight Unit</th>
			<td>
				<select name="mer_weight_unit">
					<option value="grams">grams</option>
					<option value="kilograms">kilograms</option>
					<option value="pound(s)">pound(s)</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Temperature</th>
			<td><input type="text" name="mer_temperature" value="" /></td>
		</tr>
		<tr>
			<th>Temperature Unit</th>
			<td>
				<select name="mer_temperature_unit">
					<option value="celcius(℃)">celcius(℃)</option>
					<option value="fahrenheit(℉)">fahrenheit(℉)</option>
					<option value=""></option>
					<option value=""></option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Heartrate</th>
			<td><input type="text" name="mer_heartrate" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Nose</th>
			<td><textarea name="mer_nose" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Skin</th>
			<td><textarea name="mer_skin" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Anus</th>
			<td><textarea name="mer_anus" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Throat</th>
			<td><textarea name="mer_throat" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Fecal</th>
			<td><textarea name="mer_fecal" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Mouth</th>
			<td><textarea name="mer_mouth" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Lower Abdomen</th>
			<td><textarea name="mer_lower_abdomen" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Upper Abdomen</th>
			<td><textarea name="mer_upper_abdomen" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Limbs</th>
			<td><textarea name="mer_limbs" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Other Remarks</th>
			<td><textarea name="mer_other_remarks" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Status</th>
			<td><textarea name="mer_status" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Date</th>
			<td> 
				<?php echo format_date($medical_record->mer_date,"F d, Y h:i A"); ?>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/medical_records'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function() {		
	// $('form').floodling('pet_id', "<?php echo addslashes($medical_record->acc_id); ?>");		
	$('form').floodling('mer_height', "<?php echo addslashes(number_format($medical_record->mer_height,2)); ?>");		
	$('form').floodling('mer_height_unit', "<?php echo addslashes($medical_record->mer_height_unit); ?>");		
	$('form').floodling('mer_weight', "<?php echo addslashes(number_format($medical_record->mer_weight,2)); ?>");		
	$('form').floodling('mer_weight_unit', "<?php echo addslashes($medical_record->mer_weight_unit); ?>");		
	$('form').floodling('mer_temperature', "<?php echo addslashes(number_format($medical_record->mer_temperature,2)); ?>");		
	$('form').floodling('mer_temperature_unit', "<?php echo addslashes($medical_record->mer_temperature_unit); ?>");		
	$('form').floodling('mer_heartrate', "<?php echo addslashes($medical_record->mer_heartrate); ?>");		
	$('form').floodling('mer_nose', "<?php echo addslashes($medical_record->mer_nose); ?>");		
	$('form').floodling('mer_skin', "<?php echo addslashes($medical_record->mer_skin); ?>");		
	$('form').floodling('mer_anus', "<?php echo addslashes($medical_record->mer_anus); ?>");		
	$('form').floodling('mer_throat', "<?php echo addslashes($medical_record->mer_throat); ?>");		
	$('form').floodling('mer_fecal', "<?php echo addslashes($medical_record->mer_fecal); ?>");		
	$('form').floodling('mer_mouth', "<?php echo addslashes($medical_record->mer_mouth); ?>");		
	$('form').floodling('mer_lower_abdomen', "<?php echo addslashes($medical_record->mer_lower_abdomen); ?>");		
	$('form').floodling('mer_upper_abdomen', "<?php echo addslashes($medical_record->mer_upper_abdomen); ?>");		
	$('form').floodling('mer_limbs', "<?php echo addslashes($medical_record->mer_limbs); ?>");		
	$('form').floodling('mer_other_remarks', "<?php echo addslashes($medical_record->mer_other_remarks); ?>");		
	$('form').floodling('mer_status', "<?php echo addslashes($medical_record->mer_status); ?>");		 
});
</script>
