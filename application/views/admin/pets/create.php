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
					<option value="<?php echo $acc_id->acc_id; ?>"><?php echo $acc_id->acc_username; ?></option>
					<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="pet_image"></td>
		</tr>
		<tr>
			<th>Name</th>
			<td>
				<input type="hidden" name="pet_status" value="active">
				<input type="text" name="pet_name" size="80" maxlength="100" value="" />
			</td>
		</tr>
		<tr>
			<th>Date Of Birth</th>
			<td><input type="text" name="pet_date_of_birth" data-min_year="<?php echo date("Y")-20 ?>" data-max_year="<?php echo date("Y") ?>" class="dob" value="" /></td>
		</tr>
		<tr>
			<th>Species</th>
			<td>
				<select name="spe_id" id="species">
					<option>Select Species</option>
					<?php foreach ($species->result() as $specie): ?>
					<option value="<?php echo $specie->spe_id; ?>"><?php echo $specie->spe_name." (".$specie->spe_common_name.")"; ?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Breed</th>
			<td>
				<select name="bre_id" id="breed"></select>
			</td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>
				<select name="pet_gender">
					<option>Select Gender</option>
					<option value="female">Female</option>
					<option value="male">Male</option>
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
		<!-- <tr>
			<th>Status</th>
			<td>
				<select name="pet_status" id="pet_status">
					<option value="active">active</option>
					<option value="inactive">inactive</option>
					<option value="dead">dead</option>
				</select>
			</td>
		</tr>  -->
		<tr>
			<th></th>
			<td><input type="hidden" name="pet_date_added" class="" value="<?php echo date("Y-m-d"); ?>" /></td>
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
	$("#pet_status").change(function(){
		if ($(this).val() == "dead") {
			$('.death-data').show();
		}else{
			$('.death-data').hide();
		}
	});

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

	$('#species').change(function(){

		var species_id = $(this).val();  

		$.ajax({
			method: "GET",
			url: "<?php echo site_url('admin/pets/select_breed'); ?>",
			data: { species_id: species_id }
		})
		.done(function( breeds ) {
			var species_breeds = $.parseJSON(breeds);
			$("#breed").html('')
			$("#breed").append("<option>select breed</option>");
			for(x in species_breeds){
				$("#breed").append('<option value="'+species_breeds[x].id+'">'+species_breeds[x].name+'</option>');
			}
		});
	});
</script>