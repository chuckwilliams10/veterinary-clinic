<form method="post">
	<table class="table-form table-bordered">
		<tr>
			<th>Examination</th>
			<td>			
				<select name="exm_id">
				<?php foreach ($exm_ids->result() as $exm_id){ ?>
					<option value="<?php echo $exm_id->exm_id; ?>"><?php echo $exm_id->exm_code; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Code</th>
			<td><input type="text" name="lat_code" size="12" maxlength="12" value="" /></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="lat_name" size="80" maxlength="100" value="" /></td>
		</tr>
		<tr>
			<th>Sequence</th>
			<td><input type="text" name="lat_sequence" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr>
			<th>Unit</th>
			<td><input type="text" name="lat_unit" size="10" maxlength="10" value="" /></td>
		</tr>
		<tr>
			<th>Type</th>
			<td>
				<select name="lat_type" id="lat_type">
					<option value="">select type</option>
					<option value="numeric">Numeric</option>
					<option value="array">List</option>
				</select>
			</td>
		</tr> 
		<tr class="numeric selections">
			<th>Normal Value</th>
			<td><input type="text" name="lat_normal_value" size="10" maxlength="10" value="" /></td>
		</tr>
		<tr class="numeric selections">
			<th>Normal Value Start</th>
			<td><input type="text" name="lat_normal_value_start" size="11" maxlength="11" value="" /></td>
		</tr>
		<tr class="numeric selections">
			<th>Normal Value End</th>
			<td><input type="text" name="lat_normal_value_end" size="11" maxlength="11" value="" /></td>
		</tr>
		
		<tr class="array selections">
			<th style="valign:top;">
				List Values
			</th>
			<td style="valign:top;">
				<div class="group_div">
					<input type="text" name="laboratory_tests_values[]"> 
					<button class="add_this btn btn-info btn-mini"><i class="icon-plus-sign"></i></button>
				</div>
			</td>
		</tr> 
		<tr>
			<th>Status</th>
			<td>
				<select name="lat_status">
					<option value="active">active</option>
					<option value="inactive">inactive</option>
				</select>
			</td>
		</tr> 
		<tr>
			<th></th>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-primargsettings set org.gnome.desktop.wm.preferences mouse-button-modifier "<Super>" y" />
				<a href="<?php echo site_url('admin/laboratory_tests'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>

<script>
	$(document).ready(function(){

		$(".array, .numeric").hide();


		$("#lat_type").change(function(){
			var selectedClass = "."+$(this).val();
			
			$('.selections').hide();
			$(selectedClass).show();
		});

		$(document).on("click",'.add_this',function(event){
			
			var elemGroup = $(this).closest('.group_div').clone();
			
			$(this)
				.removeClass('add_this')
				.removeClass('btn-info')
				.addClass('remove_this')
				.addClass('btn-danger');

			$(this).find("i").addClass("icon-minus-sign").removeClass("icon-plus-sign");
 
			$(elemGroup).insertAfter( $(this).closest('.group_div') );			

			event.preventDefault();
		});

		$(document).on("click",'.remove_this',function(event){
			$(this).closest(".group_div").remove();
			event.preventDefault();
		});
		
	});
</script>