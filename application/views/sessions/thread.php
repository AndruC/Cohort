<div class="row">
	<div class="span6 offset3">
		<h1><?php echo $title ?><small><?php // echo ' - '.$campaign ?></small></h1>
		<hr />
		<div class="details alert alert-info">
			<span class="post_date"><?php echo mdate('%M %d, %y', $timestamp) ?></span>
			<p class="recap_body"><?php echo $details; ?></p>
		</div>
		<?php if ($posts) : ?>
		
			<?php foreach ($posts as $p) : ?>
				<div class="single_post well">
					<img src="#" />
					<p><?php echo $p['character'] ?></p>
					<span class="post_date"><?php echo mdate('%D, %M %j%S - %h:%i%a', $p['timestamp']) ?></span>
					<p class="post_body"><?php echo $p['body'] ?></p>
				</div>
			<?php endforeach; ?>

		<?php else : ?>

			<div class="single_post well">
				<p>Alas, not a soul has left their mark here</p></div>

		<?php endif; ?>		
		
		<?php // $this->load->view('forms/post'); ?>

	</div>
</div>