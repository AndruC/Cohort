<?php $this->load->view('partials/head'); ?>

<body>
	<!-- Obligatory prompt for Chrome Frame for crazy IE6 browsers -->
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	
	<div class="container">
		<?php $this->load->view('pages/'.$content); ?>
	</div>
	
	<?php $this->load->view('partials/scripts'); ?>

</body>
</html>
