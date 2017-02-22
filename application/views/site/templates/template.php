<!doctype html>
<html lang="en">
<head>
	<title><?php echo template('title'); ?> | Blessed Veterinary Clinic</title>
	<meta charset="utf-8">	 

	<script type="text/javascript" src="<?php echo res_url("bower/jquery/dist/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url("bower/bxslider-4/dist/jquery.bxslider.js"); ?>"></script>
	<!-- 	
	<script type="text/javascript" src=""></script>
	<script type="text/javascript" src="<?php echo res_url("bower/php"); ?>"></script>
	<script type="text/javascript" src="<?php echo res_url("bower/"); ?>"></script> -->


	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?php echo res_url("bower/materialize/dist/css/materialize.min.css"); ?>"  media="screen,projection"/>
	<link rel="stylesheet" type="text/css" href="<?php echo res_url("bower/bxslider-4/dist/jquery.bxslider.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo res_url('site/css/styles.css'); ?>" />


</head>
<body class="<?php echo uri_css_class(); ?>">
	<nav class="custom-white lighten-1" role="navigation">
        <div class="nav-wrapper container">
        	<a id="logo-container" href="#" class="brand-logo">
        		<img src="<?php echo res_url("site/images/logos.png"); ?>" id="logo">
        	</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo site_url("page/services"); ?>">Services</a></li>
                <li><a href="<?php echo site_url("page/contact_us"); ?>">Contact Us</a></li>
                <?php if ($this->session->userdata("acc_id")): ?>
                <li><a href="<?php echo site_url("account"); ?>">Account</a></li>
                <li><a href="<?php echo site_url("account/logout"); ?>">Logout</a></li>
                <?php else: ?>
                <li><a href="<?php echo site_url("page/login"); ?>">Login</a></li>
                <?php endif ?>
            </ul>
            <ul id="nav-mobile" class="side-nav"> 
                <li><a href="<?php echo site_url("page/services"); ?>">Services</a></li>
                <li><a href="<?php echo site_url("page/contact_us"); ?>">Contact Us</a></li>
                <?php if ($this->session->userdata("acc_id")): ?>
                <a href="<?php echo site_url("account"); ?>">Account</a>
                <a href="<?php echo site_url("account/logout"); ?>">Logout</a>
                <?php else: ?>
                <li><a href="<?php echo site_url("page/login"); ?>">Login</a></li>
                <?php endif ?>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
	<div class="container-fluid">
        <div class="container"><?php echo template('notification'); ?></div>
		<?php echo template('content'); ?>
	</div>	
	<footer class="page-footer background353535">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Blessed Veterinary Clinic</h5>
                    <p class="grey-text text-lighten-4">
						Blessed Veterinary Clinic is a full-service small animal veterinary clinic. The facility includes a fully-stocked pharmacy, surgery suite, in-house x-ray, a closely monitored hospitalization area, and boarding for cats, with an outdoor yard for walking hospitalized dogs. We provide a broad spectrum of diagnostic procedures through in-house testing and the use of external laboratories.
					</p>
                </div>
                <div class="col l3 s12">
                    
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="https://www.facebook.com/AnimalVeterinaryPetClinicOpen24Hours/">Facebook</a></li>
                        <li><a class="white-text" href="<?php echo site_url("page/services"); ?>">Services</a></li>
                        <li><a class="white-text" href="<?php echo site_url("page/contact_us"); ?>">Contact Us</a></li>  
                        <?php if ($this->session->userdata("acc_id")): ?>
                            <li><a class="white-text" href="<?php echo site_url("account"); ?>">Account</a></li>
                            <li><a class="white-text" href="<?php echo site_url("account/logout"); ?>">Logout</a></li>
                        <?php else: ?>
                            <li><a class="white-text" href="<?php echo site_url("page/login"); ?>">Login</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &copy; Blessed Veterinary Clinic <?php echo date("Y") ?>
            </div>
        </div>
    </footer>
</body>
</html>

<script type="text/javascript">
    $(".alert a.close").click(function(){ 
        $(this).closest(".alert").slideUp(200).remove();
    });
</script>