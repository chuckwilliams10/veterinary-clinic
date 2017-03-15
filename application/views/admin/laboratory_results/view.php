<div class="row">
	<div class="span2">
		<img src="<?php echo base_url("uploads/pets/".$pet->pet_image_thumb); ?> " style="width: 150px;">
	</div>
	<div class="span5">
		
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
<table class="table-form table-bordered">
	<tr>
		<th>Pet</th>
		<td><?php echo number_format($laboratory_results->acc_id); ?></td>
	</tr>
	<tr>
		<th>Examination</th>
		<td><?php echo $laboratory_results->exm_name; ?></td>
	</tr> 
	<tr>
		<th>Date</th>
		<td><?php echo format_datetime($laboratory_results->lab_date); ?></td>
	</tr> 	
</table>

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
						<td class="text-center"><?php echo $labresult->lat_name; ?></td>
						<td class="text-center"><?php echo $labresult->lat_normal_value; ?></td>
						<td class="text-center"><?php echo $labresult->lat_normal_value_start."-".$labresult->lat_normal_value_end." ".$labresult->lat_unit; ?></td>
						<td class="text-center"><?php echo $labresult->ltr_result; ?></td>
						<td class="text-center" style="text-align: center !important;"><?php echo $labresult->ltr_remark; ?></td>
					</tr>
				<?php endforeach ?>
		    </tbody>
	   </table>
	</div>
</div> 
<?php if ($lab_result_images->num_rows() > 0): ?>
<div class="row">
	<div class="span10">
		<br/>
		<h3>Images</h3>
		<?php foreach ($lab_result_images->result() as $image) { ?>
		<div class="well">
			<a href="<?php echo base_url("uploads/laboratory_results/".$image->lri_image); ?>" target="_blank">
				<img src="<?php echo base_url("uploads/laboratory_results/".$image->lri_image); ?>" style="width:100%;">
			</a>
			<p><?php echo $image->lri_description; ?></p>
			<strong>
				<?php echo format_datetime($image->lri_date_created); ?>
			</strong>
		</div> 
		<?php } ?>
	</div>
</div>
<?php endif ?>
<table class="table-form table-bordered">
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/laboratory_result_images/index/'. $laboratory_results->lab_id)?>" class="btn btn-info">Manage Images</a>
			<a href="<?php echo site_url('admin/laboratory_results/edit/' . $laboratory_results->lab_id."/".$pet->pet_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/pets/view/'.$pet->pet_id); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>