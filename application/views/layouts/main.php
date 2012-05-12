<?php $this->load->view('partials/head'); ?>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<?php echo anchor('/', 'Cohort', 'class="brand"') ?>
				<ul class="nav">
					<li><?php echo anchor('/session', 'Sessions') ?></li>
					<li><?php echo anchor('/campaign', 'Campaigns') ?></li>
					<li><?php echo anchor('/players', 'Players') ?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<?php if (is_array($content)) : ?>
		
			<?php foreach ($content as $widget) : ?>
				<?php echo $widget; ?>
			<?php endforeach; ?>
			
		<?php else : echo $content; ?>
		
		<?php endif; ?>
	</div>

<?php $this->load->view('partials/scripts'); ?>
<?php $this->load->view('partials/close_html'); ?>