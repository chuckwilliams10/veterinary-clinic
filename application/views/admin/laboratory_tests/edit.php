<form method="post">
	<table class="table-form table-bordered">
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
					<option <?php echo ($laboratory_test->lat_type == "numeric") ? "selected" : "";?> value="numeric">Numeric</option>
					<option <?php echo ($laboratory_test->lat_type == "array") ? "selected" : "";?> value="array">List</option>
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
				<?php 
					$exect = $laboratory_test->lat_array_values;
					if($exect != ""){
						$exect = explode(",",$laboratory_test->lat_array_values);
					
						foreach($exect as $key=>$value) {
				?>
				<div class="group_div">
					<input type="text" name="laboratory_tests_values[]" value="<?php echo $value;?>"> 
					<button class="remove_this btn btn-danger btn-mini"><i class="icon-minus-sign"></i></button>
				</div>
				<?php 	}
				
				 	}
				?>
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
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/laboratory_tests'); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table>
</form>
<script>
	$(document).ready(function(){

		$(".array, .numeric").hide();
		var selectedClass = "."+$("#lat_type").val();
			
		$('.selections').hide();
		$(selectedClass).show();		 

		$("#lat_type").change(function(){
			let selectedClass = "."+$(this).val();
			
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
<script type="text/javascript">
$(function() {		
	$('form').floodling('exm_id', "<?php echo addslashes($laboratory_test->exm_code); ?>");		
	$('form').floodling('lat_code', "<?php echo addslashes($laboratory_test->lat_code); ?>");		
	$('form').floodling('lat_name', "<?php echo addslashes($laboratory_test->lat_name); ?>");		
	$('form').floodling('lat_sequence', "<?php echo addslashes($laboratory_test->lat_sequence); ?>");		
	$('form').floodling('lat_unit', "<?php echo addslashes($laboratory_test->lat_unit); ?>");		
	$('form').floodling('lat_normal_value', "<?php echo addslashes($laboratory_test->lat_normal_value); ?>");		
	$('form').floodling('lat_normal_value_start', "<?php echo addslashes($laboratory_test->lat_normal_value_start); ?>");		
	$('form').floodling('lat_normal_value_end', "<?php echo addslashes($laboratory_test->lat_normal_value_end); ?>");		
	$('form').floodling('lat_status', "<?php echo addslashes($laboratory_test->lat_status); ?>");
});
</script>
