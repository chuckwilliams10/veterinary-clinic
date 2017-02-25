<table class="table-form table-bordered">
	<tr>
		<th>Code</th>
		<td><?php echo $examination->exm_code; ?></td>
	</tr>
	<tr>
		<th>Name</th>
		<td><?php echo $examination->exm_name; ?></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><?php echo nl2br($examination->exm_description); ?></td>
	</tr>
	<tr>
		<th>Rate</th>
		<td><?php echo number_format($examination->exm_rate, 2); ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td><?php echo $examination->exm_status; ?></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<a href="<?php echo site_url('admin/examinations/edit/' . $examination->exm_id); ?>" class="btn btn-primary">Edit</a>
			<a href="<?php echo site_url('admin/examinations'); ?>" class="btn">Back</a>
		</td>
	</tr>
</table>
<hr>
<div class="row">
	<div class="span3">
		<h3>Tests</h3>
	</div>
	<div class="span7 right">
		<a href="<?php echo site_url("admin/examinations/generate_check_list/".$examination->exm_id); ?>" role="btn" class="btn" target="_blank"> Generate Checklist</a>
	</div>
</div>
<br>
<table class="table-list table-striped table-bordered">
	<thead>
		<tr>  
			<th>Sequence</th> 
			<th>Code</th>
			<th>Name</th>
			<th>Unit</th>
			<th>Normal value</th>
			<th>Normal value range</th> 
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($laboratory_tests->result() as $laboratory_test)
	{
		?>
		<tr>  
			<td class="center"><?php echo number_format($laboratory_test->lat_sequence); ?></td> 
			<td class="center"><?php echo $laboratory_test->lat_code; ?></td>
			<td class="center"><?php echo $laboratory_test->lat_name; ?></td>
			<td class="center"><?php echo $laboratory_test->lat_unit; ?></td>
			<td class="center"><?php echo $laboratory_test->lat_normal_value; ?></td>
			<td class="center"><?php echo $laboratory_test->lat_normal_value_start."-".$laboratory_test->lat_normal_value_end; ?></td> 
			<td class="center"><?php echo $laboratory_test->lat_status; ?></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>
<hr>
<div class="row">
	<div class="span10 right">
		<a href="<?php echo site_url("admin/examinations/generate_check_list/".$examination->exm_id); ?>" role="btn" class="btn" target="_blank"> Generate Checklist</a>
	</div>
</div>
<hr>