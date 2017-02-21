<div class="row">
	<div class="span2">
		<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?> " style="width: 150px;">
	</div>
	<div class="span7">
		
		<table class=" table table-bordered">  
			<tr>

				<th>Examination</th>
				<th>Name</th>
				<th>Date Of Birth</th>
				<th>Species</th>
			</tr>
			<tr>
				<td><?php echo $laboratory_results->exm_name; ?></td>
				<td><?php echo $pet->pet_name; ?></td>
				<td><?php echo format_date($pet->pet_date_of_birth); ?></td>
				<td><?php echo ucfirst($pet->pet_gender); ?> <?php echo $pet->pet_species; ?> - <?php echo $pet->pet_breed; ?></td> 
			</tr> 
		</table> 
		<table class="table-form table-bordered"> 
			<tr>
				<th style="text-align: left; width: 40px;">Date</th>
				<td><?php echo format_datetime($laboratory_results->lab_date); ?></td>
			</tr> 	
		</table>
	</div>
</div>

<hr>
<form method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="span10">
			<table class="lab-form-table">
			    <thead> 
			        <tr>
			        	<th>Test</th>
				        <th>Normal</th>
				        <th>Range Values</th>
				        <th style="width: 100px;">Result</th>
				        <th>Remarks</th> 
			        </tr>
			    </thead>
			    <tbody>
					<?php foreach ($laboratory_test_results->result() as $labresult): ?>
						<tr>
							<td class="text-center">
								<?php echo $labresult->lat_name; ?>
								<input type="hidden" name="ltr_id[<?php echo $labresult->ltr_id; ?>]" value="<?php echo $labresult->ltr_id; ?>">	
							</td>
							<td class="text-center"><?php echo $labresult->lat_normal_value; ?></td>
							<td class="text-center"><?php echo $labresult->lat_normal_value_start."-".$labresult->lat_normal_value_end." ".$labresult->lat_unit; ?></td>
							<td class="text-center">
								<input type="text" name="ltr_result[<?php echo $labresult->ltr_id; ?>]" required="required" style="width: 50px" value="<?php echo $labresult->ltr_result; ?>">
							</td>
							<td class="text-center" style="text-align: center !important;">
								<input type="text" name="ltr_remark[<?php echo $labresult->ltr_id; ?>]" required="required" style="width: 350px" value="<?php echo $labresult->ltr_remark; ?>">	
							</td>
						</tr>
					<?php endforeach ?>
			    </tbody>
		   </table>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="span10">
			<label style="font-size: 14px; font-weight: bold;">Final remarks</label>
			<textarea name="lab_remark" style="margin: 0px 0px 10px; width: 767px; height: 42px;"><?php echo $laboratory_results->lab_remark; ?></textarea> 
		</div>
		<div class="span10">
			<label style="font-size: 14px; font-weight: bold;">Images</label>
			<input name="lri_image[]" id="filesToUpload" type="file" multiple="multiple" />
			<a href="#photos" role="button" class="btn btn-info" data-toggle="modal">View images</a>
			<p style="color:red;">Press CTRL while clicking to select multiple files</p>
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

<div class="modal hide" id="photos">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	<h3>Photos</h3>
  	</div>
 	<div class="modal-body">
    	<div class="row">
    		<ul class="thumbnails">
    			<?php foreach ($lab_result_images->result() as $image): ?>
			  	<li class="span7">
			    	<div class="thumbnail">
			      		<img src="<?php echo base_url("uploads/laboratory_results/".$image->lri_image); ?>" alt="" style="width: 100%;">
		      			<div class="right" style="margin-top:10px;">
		      				<a href="<?php echo site_url("admin/laboratory_results/delete_image/".$image->lri_id); ?>" role="button" class="btn btn-danger delete-image">Delete</a>
		      			</div>
		    		</div>
			  	</li> 
    			<?php endforeach ?>
			</ul>
    	</div>
  	</div>
  	<div class="modal-footer">
		<a class="btn" data-dismiss="modal" aria-hidden="true">Close</a> 
  	</div>
</div>

<script type="text/javascript">

$(".delete-image").click(function(){
	var r = confirm("Are you sure you want to delete this image?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
});


</script>
