<form method="post" enctype="multipart/form-data">
	<table class="table-form table-bordered">
		<tr>
			<th>Account</th>
			<td>			
				<select name="acc_id">
				<?php
				foreach($acc_ids->result() as $acc_id) 
				{
					?>
					<option <?php echo ($acc_id->acc_id == $pet->acc_id) ? "selected": ""; ?> value="<?php echo $acc_id->acc_id; ?>"><?php echo $acc_id->acc_username; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Image</th>
			<td>
				<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?> "> <br>
				<input type="file" name="pet_image">
			</td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="pet_name" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Date Of Birth</th>
			<td><input type="text" name="pet_date_of_birth" class="date" value="" /></td>
		</tr>
		<tr>
			<th>Species</th>
			<td>
				<select name="pet_species">
					<option <?php echo ($pet->pet_species == "Feline") ? "selected": ""; ?> value="Feline">Feline</option>
					<option <?php echo ($pet->pet_species == "Canine") ? "selected": ""; ?> value="Canine">Canine</option>
					<option <?php echo ($pet->pet_species == "Others") ? "selected": ""; ?> value="Others">Others</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Breed</th>
			<td><input type="text" name="pet_breed" size="80" maxlength="120" value="" /></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>
				<select name="pet_gender">
					<option>Select Gender</option>
					<option <?php echo ($pet->pet_gender == "female") ? "selected": ""; ?> value="female">Female</option>
					<option <?php echo ($pet->pet_gender == "male") ? "selected": ""; ?> value="male">Male</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Color</th>
			<td><input type="text" name="pet_color" size="80" maxlength="120" value="" /></td>
		</tr>
		<tr>
			<th>Remarks</th>
			<td><textarea name="pet_remarks" rows="5" cols="80"></textarea></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<select name="pet_status" id="pet_status">
					<option <?php echo ($pet->pet_status == "active") ? "selected": ""; ?>  value="active">active</option>
					<option <?php echo ($pet->pet_status == "inactive") ? "selected": ""; ?>  value="inactive">inactive</option>
					<option <?php echo ($pet->pet_status == "dead") ? "selected": ""; ?>  value="dead">deceased</option>
				</select>
			</td>
		</tr>
		<tr class="death-data hidden-force" style="display: none;">
			<th>Date Died</th>
			<td>
				<?php 
					$time = strtotime($pet->pet_death_datetime); 
				?>
				<input type="text" name="pet_death_datetime" class="newdate" value="<?php echo ($pet->pet_death_datetime == "0000-00-00 00:00:00") ? "" : format_date($pet->pet_death_datetime,"Y-m-d"); ?>" /></td>
		</tr>
		<tr class="death-data hidden-force" style="display: none;">
			<th>Cause Of Death</th>
			<td><textarea name="pet_cause_of_death" rows="5" cols="80"><?php echo addslashes($pet->pet_cause_of_death); ?></textarea></td>
		</tr>

		<tr>
			<th>Date Added</th>
			<td>
				<?php echo format_date($pet->pet_date_added,"F d, Y h:i A"); ?>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/pets'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>


<script type="text/javascript">
	$(document).ready(function(){

		var petStatus = $("#pet_status").val() ;
		// alert(petStatus);

		if (petStatus == "dead") {
			$('.death-data').removeClass("hidden-force").show();
		}else{
			$('.death-data').addClass("hidden-force");
			$('.death-data').hide();
		}
	});

	$("#pet_status").change(function(){

		var selectedval = $(this).val();

		if (selectedval == "dead") {
			$('.death-data').removeClass("hidden-force").show();
		}else{
			$('.death-data').addClass("hidden-force").hide();
		}
	});

	$('.newdate').datepicker({
		dateFormat: "yy-mm-dd"
	});

</script>
<script type="text/javascript">
$(function() {		 
	$('form').floodling('pet_name', "<?php echo addslashes($pet->pet_name); ?>");		
	$('form').floodling('pet_date_of_birth', "<?php echo addslashes($pet->pet_date_of_birth); ?>");		 
	$('form').floodling('pet_breed', "<?php echo addslashes($pet->pet_breed); ?>");		 
	$('form').floodling('pet_color', "<?php echo addslashes($pet->pet_color); ?>");		
	$('form').floodling('pet_remarks', "<?php echo addslashes($pet->pet_remarks); ?>");		 
});
</script>