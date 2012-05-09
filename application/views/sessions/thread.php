<div class="row">
	<div class="span4 offset4">
		<h1><?php echo $session['title'] ?></h1>
		<h2><?php echo $session['campaign'] ?></h2>

		<div class="details">
			<p>A recap</p>
			<span class="post_date">Date goes here '12</span>
			<p class="recap_body"><?php echo $session['details']; ?></p>
		</div>
		
		<?php foreach ($session['posts'] as $post_data) : ?>

			<div class="single_post">
				<img src="#" />
				<p>Character name</p>
				<span class="post_date">Date goes here '12</span>
				<p class="post_body">Day breaks early; the cloudy mists that blanket the sky in a bright gray must be thin this morning.  You have never seen the source of the brightness beyond the clouds, but it bothers you not.  It as if the clouded sky itself radiates light down from above.  A cool wind blows.  A day like any other.</p>
			</div>

		<?php endforeach; ?>
		
		<?php // $this->load->view('forms/post'); ?>

	</div>
</div>