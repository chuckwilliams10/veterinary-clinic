<!doctype html>
<html lang="en">
<head>
	<title><?php echo template('title'); ?> | Administration Panel</title>
	<meta charset="utf-8">
	<?php echo template('mythos'); ?>
	<?php echo template('bootstrap'); ?>

	<script type="text/javascript" src="<?php echo res_url('mythos/js/jquery.tablesorter.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url('mythos/tiny_mce/tiny_mce.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url('admin/js/document.ready.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url('admin/js/document.ready.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url("bower/highcharts/highcharts.src.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url('admin/js/email.validation.exp.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url('admin/js/philcontact.js'); ?>"></script>


	<link rel="stylesheet" type="text/css" href="<?php echo res_url('admin/css/styles.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo res_url('admin/css/philcontact.css'); ?>" />

	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<?php echo template('head'); ?>
	<!-- 	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script> -->
</head>
<body class="<?php echo uri_css_class(); ?>">
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<img src="<?php echo res_url('admin/images/logo.png'); ?>" style="float: left;" />
			<?php
			if($this->access_control->check_logged_in())
			{
			?>
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('acc_name'); ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo site_url('admin/profile'); ?>">Dashboard</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('admin/index/logout'); ?>">Logout</a></li>
						</ul>
					</li>
				</ul>
			<?php
			}
			else
			{
			?>

			<?php
			}
			?>
		</div>
	</div>
</div>
<div class="wrapper" style="height: 50px"></div>
<div class="container">
	<div class="row">
		<div class="span2">
			<div class="sidebar-nav">
				<ul class="nav nav-list">
					<?php if($this->access_control->check_logged_in()) { ?>
						<!-- <li class="nav-header"><a href="<?php echo site_url('admin/pages'); ?>">Pages</a></li> -->

						<!-- <li class="nav-header"><a href="<?php echo site_url('admin/photos'); ?>">Photos</a></li> -->
						<?php
						if($this->access_control->check_account_type('admin', 'dev'))
						{
						?>
						<li class="nav-header"><a href="<?php echo site_url('admin/profile'); ?>">Dashboard</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/accounts'); ?>">Accounts</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/accounts/customers'); ?>">Customers</a></li>
						<?php
						}
						?>


						<li class="nav-header"><a href="<?php echo site_url('admin/species'); ?>">Species</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/breeds'); ?>">Breeds</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/pets'); ?>">Pets</a></li>
						<!-- <li class="nav-header"><a href="<?php echo site_url('admin/laboratory_results'); ?>">Laboratory Results</a></li> -->
						<li class="nav-header"><a href="<?php echo site_url('admin/examinations'); ?>">Services</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/laboratory_tests'); ?>">Laboratory Tests</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/medical_records'); ?>">Medical Records</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/release_vouchers'); ?>">Release Vouchers</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/groomings'); ?>">Pet Grooming</a></li>
						<li class="nav-header"><a href="<?php echo site_url('admin/banners'); ?>">Banners</a></li>

						<!-- Sample menu with dropdown sub items
						<li class="nav-header">
							<a href="javascript:;" data-toggle="collapse" data-target="#menu_sample1">Sample Dropdown</a>
							<ul class="nav nav-list collapse in" id="menu_sample1">
								<li><a href="#">Sub Item 1</a></li>
								<li><a href="#">Sub Item 2</a></li>
							</ul>
						</li>
					-->
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="span10">
			<?php echo template('notification'); ?>
			<div class="content-header">
				<h1 class="page-title"><?php echo template('title'); ?></h1>
				<?php echo template('page-nav'); ?>
				<div class="clearfix"></div>
			</div>
			<div class="content-body">
				<?php echo template('content'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<!-- <div class="version span10 offset2">Developed by <a href="http://www.zeaple.com" target="_blank">Zeaple, Inc.</a></div> -->
	</div>
</div>
<div class="modal hide fade" id="confirm-modal">
	<div class="modal-header center">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3>Confirm Action</h3>
	</div>
	<div class="modal-body center">
		<p>Are you sure you want to continue?</p>
	</div>
	<div class="modal-footer center">
		<a href="#" class="btn btn-primary btn-large">Yes</a>
		<a href="#" class="btn btn-large" data-dismiss="modal">No</a>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
        $("img").on("error", function(){
            $(this).attr('src', '<?php echo res_url("site/images/bvclogo.png"); ?>');
            $(this).closest('a').click(function(event){
            	event.preventDefault();
            });
        });
    });
</script>
