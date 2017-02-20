<?php
if($laboratory_results->num_rows())
{
	?>
	<form method="post" action="<?php echo site_url("admin/laboratory_results/index"); ?>">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr> 
					<th>Examination</th> 
					<th>Date</th>
					<th style="width: 160px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($laboratory_results->result() as $laboratory_results)
			{
				?>
				<tr> 
					<td class="center"><?php echo $laboratory_results->exm_name; ?></td> 
					<td class="center"><?php echo format_datetime($laboratory_results->lab_date,"F d, Y H:i A"); ?></td>
					<td class="center">
						<a href="<?php echo site_url('admin/laboratory_results/edit/' . $laboratory_results->lab_id); ?>" class="btn btn-primary">Edit</a>
						<a href="<?php echo site_url('admin/laboratory_results/view/' . $laboratory_results->lab_id); ?>" class="btn btn-warning">View</a>
					</td>
				</tr> 
				<?php
			}
			?>
			</tbody>
		</table> 
	</form>
	<?php
}
else
{
	?>
	<strong style="color:red; padding: 10px 0px; margin-top: 20px; font-size: 14px;">No laboratory results found.</strong>
	<?php
}
?>