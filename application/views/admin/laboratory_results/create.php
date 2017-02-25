<?php //echo "<pre>"; print_r($pet); ?>
<form method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="span3">
			<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?> ">
		</div>
		<div class="span9">
			
			<table class=" table table-bordered">  
				<tr>
					<th>Name</th>
					<th>Date Of Birth</th>
					<th>Species</th>
				</tr>
				<tr>
					<td><?php echo $pet->pet_name; ?></td>
					<td><?php echo format_date($pet->pet_date_of_birth); ?></td>
					<td><?php echo ucfirst($pet->pet_gender); ?> <?php echo $pet->spe_name; ?> - <?php echo $pet->bre_name; ?></td> 
				</tr> 
			</table> 
		</div>
	</div>
	<br>
	<div class="row">
		<div class="span10">
			<label>Examination</label>
			<select name="exm_id" id="exam_select">
			<option value="">Select Examination</option>
				<?php foreach($exm_ids->result() as $exm_id) { ?>
					<option value="<?php echo $exm_id->exm_id; ?>"><?php echo $exm_id->exm_name; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-span10" id="holder">
			
		</div>
	</div>
	<div class="row">
		<div class="span10">
			<p style="font-size: 14px;">Final remarks</p>
			<textarea name="lab_remark" style="margin: 0px 0px 10px; width: 767px; height: 42px;"></textarea> 
		</div>
		<div class="span10">
			<p style="font-size: 14px;">Images</p>
			<input name="lri_image[]" id="filesToUpload" type="file" multiple="multiple" />
			<p style="color:red;">Press CTRL while clicking to select multiple files</p>
			<ul id="fileList"></ul>
		</div>
	</div>
	<table class="table-form table-bordered">  
		<tr>
			<th></th>
			<td class="pull-right">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				<a href="<?php echo site_url('admin/pets/view/'.$pet->pet_id); ?>" class="btn">Back</a>
			</td>
		</tr>
	</table> 
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$("#exam_select").change(function(){
			var item_id = $(this).val();
			if (item_id != "") {
				$.ajax({
				  url: "<?php echo site_url("admin/laboratory_tests/show_forms/"); ?>",
				  method: "GET",
				  data: { id : item_id },
				  dataType: "html"
				}).done(function( msg ) {
					
					$( "#holder" ).html("").html( msg );
					
					$( ".datepicker" ).datepicker({
						dateFormat: "yy-mm-dd",
						maxDate: $.now(), 
					}).datepicker("setDate", new Date());

				}).fail(function( jqXHR, textStatus ) {
				  	alert( "Request failed: " + textStatus );
				});
			}
		});

		var input = document.getElementById('filesToUpload');
		var list = document.getElementById('fileList');

		//empty list for now...
		while (list.hasChildNodes()) {
			list.removeChild(ul.firstChild);
		}

		//for every file...
		for (var x = 0; x < input.files.length; x++) {
			//add to list
			var li = document.createElement('li');
			li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
			list.append(li);
		}
	});
</script>