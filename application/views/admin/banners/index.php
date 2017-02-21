<?php
if($banners->num_rows())
{
	?>
	<form method="post">
		<table class="table-list table-striped table-bordered">
			<thead>
				<tr>
					<th class="checkbox skip-sort"><input type="checkbox" class="select-all" value="bnr_ids" /></th>
					<th>Image</th> 
					<th style="width: 60px;"></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($banners->result() as $banner)
			{
				?>
				<tr>
					<td class="center"><input type="checkbox" name="bnr_ids[]" value="<?php echo $banner->bnr_id; ?>" /></td>
					<td>
						<a href="<?php echo site_url('admin/banners/view/' . $banner->bnr_id); ?>">
							<img src="<?php echo base_url("uploads/banners/".$banner->bnr_image) ?>">
						</a>
					</td> 
					<td class="center"><a href="<?php echo site_url('admin/banners/edit/' . $banner->bnr_id); ?>" class="btn">Edit</a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php echo $banners_pagination; ?>
		<div class="choose-select">
			With selected:
			<select name="form_mode" class="select-submit">
				<option value="">choose...</option>
				<option value="delete">Delete Banners</option>
			</select>
		</div>
	</form>
	<?php
}
else
{
	?>
	No banners found.
	<?php
}
?>