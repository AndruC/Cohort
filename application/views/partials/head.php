<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<!-- Use the .htaccess and remove these lines to avoid edge case issues.
	   More info: h5bp.com/i/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $page_title ?></title>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<?php $this->load->view('partials/stylesheets'); ?>
	
	<script src="<?php echo base_url('assets'); ?>/js/vendor/modernizr-cohort.min.js"></script>
</head>

<body>
	
<!-- Obligatory prompt for Chrome Frame for crazy IE6 browsers -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->