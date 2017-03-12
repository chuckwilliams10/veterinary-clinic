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
				<input type="file" name="pet_image" accept="image/*" >
			</td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="pet_name" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Date Of Birth</th>
			<td><input type="text" name="pet_date_of_birth" class="dob" data-min_year="<?php echo date("Y")-20 ?>" data-max_year="<?php echo date("Y") ?>" value="" /></td>
		</tr>
		<tr>
			<th>Species</th>
			<td>
				<select name="spe_id" id="species" data-selected="<?php echo $pet->spe_id; ?>">
					<option>Select Species</option>
					<?php foreach ($species->result() as $specie): ?>
					<option <?php echo ($specie->spe_id == $pet->spe_id) ? "selected":""; ?> value="<?php echo $specie->spe_id; ?>"><?php echo $specie->spe_name." (".$specie->spe_common_name.")"; ?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Breed</th>
			<td>
				<select name="bre_id" id="breed" data-selected="<?php echo $pet->bre_id; ?>"></select>
			</td>
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
				<input type="text" name="pet_death_datetime" class="newdate" value="<?php echo ($pet->pet_death_datetime == "0000-00-00 00:00:00") ? "" : format_date($pet->pet_death_datetime,"Y-m-d"); ?>" />
			</td>
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

	var ajaxCallBreed = function(species_id){
		$.ajax({
			method: "GET",
			url: "<?php echo site_url('admin/pets/select_breed'); ?>",
			data: { species_id: species_id }
		})
		.done(function( breeds ) {
			var species_breeds = $.parseJSON(breeds);
			var selectedVal = $("#breed").data('selected');
			$("#breed").html('')
			$("#breed").append("<option>select breed</option>");
			for(x in species_breeds){
				selected = "";
				if (selectedVal == species_breeds[x].id) {
					selected = "selected";
				}
				$("#breed").append('<option '+selected+' value="'+species_breeds[x].id+'">'+species_breeds[x].name+'</option>');
			}
		});
	}

	$('#species').change(function(){ 
		var species_id = $(this).val();  
		ajaxCallBreed(species_id)
	});

	var selected_id = $('#species').data("selected");
	ajaxCallBreed(selected_id);

	var datepicker = $( ".dob" );
	var max_year = datepicker.data("max_year");
	var min_year = datepicker.data("min_year"); 

	var year_range = min_year+":"+max_year;
 
	var dobpicker = datepicker.datepicker({
		dateFormat: "yy-mm-dd",
		changeYear: true,
		changeMonth: true
	});

	dobpicker.datepicker("option","yearRange",year_range); 

</script>
<script type="text/javascript">
$(function() {		 
	$('form').floodling('pet_name', "<?php echo addslashes($pet->pet_name); ?>");		
	$('form').floodling('pet_date_of_birth', "<?php echo addslashes($pet->pet_date_of_birth); ?>");		  
	$('form').floodling('pet_color', "<?php echo addslashes($pet->pet_color); ?>");		
	$('form').floodling('pet_remarks', "<?php echo addslashes($pet->pet_remarks); ?>");		 
});
</script>