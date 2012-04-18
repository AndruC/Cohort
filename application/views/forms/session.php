<div class="row">

	<div class="span6 offset3">

		<h2>Create a new session</h2>
		
		<?php
			if ($errors = validation_errors())
			{
				echo '<div class="errors">';
				echo $errors;
				echo '</div>';
			} 
		?>
		
		<?php echo form_open('session/new'); ?>
		
		<?php echo form_input('title', 'Title (optional)'); ?>
		
		<?php echo form_textarea('recap', 'Recap (optional)'); ?>
		
		<?php echo form_dropdown('campaign', array('default' => 'Your Campaign')); // #TBD ?>
		
		<?php echo form_label('Contributors', 'players'); ?>
		
		<!-- Insert for loop to list out checkboxes of all available players -->
		<!-- <?php echo form_checkbox('players', 'You', FALSE); ?> -->
		
		<?php echo form_button('submit', 'Create Session', ); ?>
		
		<?php echo form_close(); ?>

	</div>

</div>