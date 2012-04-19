<?php $this->load->view('partials/head'); ?>

	<div class="container">
		<?php $this->load->view('pages/'.$content); ?>
	</div>

<?php $this->load->view('partials/scripts'); ?>
<?php $this->load->view('partials/close_html'); ?>